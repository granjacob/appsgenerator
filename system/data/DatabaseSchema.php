<?php

namespace system\data;


use system\SystemItem;

class DatabaseSchema extends SystemItem {

    protected $tables;

    function __construct()
    {
        $this->tables = array();
    }

    public function addTable( Table $table )
    {
        array_push( $this->tables, $table );
    }

    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @param mixed $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }


}

?>