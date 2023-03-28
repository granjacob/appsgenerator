<?php

namespace system\data;

use PDO;

class DatabaseConnection extends PDO {

    protected $options;
    protected $datasource;


    public function __construct(
        DataSource $datasource
    )
    {
        $this->datasource = $datasource;

        $dsn = $datasource->buildDSN();
        $username = $datasource->getUsername();
        $password = $datasource->getPassword();
        $options = $datasource->getOptions();

        if ($options === null) {
            $this->options = $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        }
        parent :: __construct( $dsn, $username, $password, $options );
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return DataSource
     */
    public function getDatasource()
    {
        return $this->datasource;
    }

    /**
     * @param DataSource $datasource
     */
    public function setDatasource($datasource)
    {
        $this->datasource = $datasource;
    }

}

?>
