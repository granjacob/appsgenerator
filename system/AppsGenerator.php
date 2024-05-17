<?php

namespace system;


use mysqli;
use system\data\DatabaseSchema;
use system\data\Table;
use system\data\TableColumn;
use system\files\PHPFile;
use system\uranus\generator\AssocArrayValue;
use system\uranus\generator\ClassAttribute;
use system\uranus\generator\ClassDef;
use system\uranus\generator\TableReference;

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

            $varClassDef = new ClassDef();

            $varClassDef->setNamespace("system\data\mysql\information_schema");
            $varClassDef->setExtensionClass("MySQLBase");

            $className = IO_toClassName($table->getName());
            $varClassDef->setName($className);



            $getters = "";
            $setters = "";
            $columnsMap = array();


            $tableReferenceAttribute = new ClassAttribute();
            $tableReferenceAttribute->setAccessModifier("private");
            $tableReferenceAttribute->setName( "tableReference" );

            $tableReference = new TableReference();
            $tableReference->setName( $tableReferenceAttribute->getName() );
//            $tableReference->setValues( $columnsMap );

            foreach ($table->getColumns() as $attribute) {

                $varClassAttribute = new ClassAttribute();

                $varClassAttribute->setAccessModifier("private");

                $finalAttributeName = IO_toVariableName( $attribute->getName() );
                $varClassAttribute->setName( $finalAttributeName );

                //$columnsMap[$attribute->getName()] = $finalAttributeName;

                $assocValue = new AssocArrayValue();
                $assocValue->setKey($attribute->getName());
                $assocValue->setValue($finalAttributeName);

                $tableReference->addValuesItem( $assocValue );
                $varClassDef->addAttributesItem( $varClassAttribute );

            }


            $varClassDef->setTableColumnsMap( $tableReference );



            $outputPath = getcwd() . _bslash() . "system" . _bslash() .
                                    "data" . _bslash() .
                                    "mysql" . _bslash() .
                                    "information_schema";

            file_put_contents(
                $outputPath . _bslash() . $className . ".php",
                $varClassDef->write()
            );

        }

        IO_print_r( $databaseSchema );

    }
}

?>