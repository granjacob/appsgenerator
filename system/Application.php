<?php

namespace system;

use \system\data\DataSource;
use system\exception\DatasourceAlreadyExistsException;
use \system\SytemItem;

abstract class Application extends SystemItem implements IApplicationConfiguration {

    private $datasources;

    public function __construct()
    {
        $this->datasources = array();
    }

    abstract public function run();

    abstract public function generate();

    public function addDatasource( DataSource $datasource )
    {
        if (!isset( $this->datasources[$datasource->alias] )) {
            $this->datasources[$datasource->getAlias()] = $datasource;
        }

        else throw new DatasourceAlreadyExistsException();
    }

    public function getDatasource( $datasourceName )
    {
        return $this->datasources[$datasourceName];
    }

}

?>