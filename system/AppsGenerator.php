<?php

namespace system;


use mysqli;
use system\data\DatabaseSchema;
use system\data\Table;
use system\data\TableColumn;
use system\files\PHPFile;

class AppsGenerator extends Application implements IApplicationConfiguration {
    public function run()
    {
        $this->setApplicationConfiguration();
        $this->generate();
    }

    public function setApplicationConfiguration()
    {
        $datasource = new \system\data\DataSource();
        $datasource->setAlias("mainDatasource" );
        $datasource->setName( "Principal Datasource" );
        $datasource->setHost("localhost" );
        $datasource->setPort("3306");
        $datasource->setUsername("root");
        $datasource->setPassword("123456789" );
        $datasource->setDatabaseName( "appsgenerator" );
        $datasource->setDsn( "" );

        $this->addDatasource( $datasource );
    }

    public function generate()
    {
        $datasource = $this->getDatasource("mainDatasource");
        $datasource->setDatabaseName("information_schema");
        $mysqli = new mysqli(
            $datasource->getHost(),
            $datasource->getUsername(),
            $datasource->getPassword(),
            $datasource->getDatabaseName() );

        $result = $mysqli->query(
            "SHOW TABLES;", MYSQLI_USE_RESULT);

        $tables = array();
        while ($object = $result->fetch_object()) {
            $arr = (array)$object;

            $tableName = reset( $arr );
            array_push( $tables, $tableName );
        }

        $databaseSchema = new DatabaseSchema();

        foreach ($tables as $tableName) {

            $table = new Table();
            $table->setName( $tableName );

            //IO_printLine( "Columns for> " . $tableName );

            $columns = $mysqli->query(
                "DESC $tableName;", MYSQLI_USE_RESULT);

            while ($column = $columns->fetch_object()) {
                //IO_print_r( $column );
                $tableColumn = new TableColumn();
                $tableColumn->setName( $column->Field );
                $table->addColumn( $tableColumn );
            }

            $databaseSchema->addTable( $table );
        }

        $tables = $databaseSchema->getTables();

        $outputTableString = "";
        foreach ($tables as $table) {
            $outputTableString .= PHPFile::phpOpenTag();

            $outputTableString .=
                PHPFile::phpNamespace("system\data\mysql\information_schema");
            $outputTableString .= PHPFile::phpDeclareClass(
                IO_toClassName( $table->getName() ));
            $getters = "";
            $setters = "";
            foreach ($table->getColumns() as $attribute) {
                $interface .= "";
                $outputTableString .= PHPFile :: phpPrivateAttribute(
                    IO_toFunctionName( $attribute->getName() ) );

                $setGetVariable = IO_toVariableName( $attribute->getName() );
                $getters .= PHPFile::phpPublicMethod(
                    IO_toMethodName(
                        "get_" . $attribute->getName() ),
                        array(),
                        array(
                        PHPFile::returnSomething(
                            PHPFile::thisRef( $setGetVariable )
                             ) )
                );

                $setters .= PHPFile::phpPublicMethod(
                    IO_toMethodName(
                        "set_" . $attribute->getName() ),
                    array( $setGetVariable  ),
                    array(
                        PHPFile::assign(
                        PHPFile::thisRef($setGetVariable), $setGetVariable)
                    )
                );
            }
            $outputTableString .= PHPFile::phpDeclareConstructor();
            $outputTableString .= $getters;
            $outputTableString .= $setters;
            $outputTableString .= PHPFile::phpEndClassDeclaration();
            $outputTableString .= PHPFile::phpCloseTag();

            IO_xmpString( $outputTableString );
        }

        IO_print_r( $databaseSchema );

    }
}

?>