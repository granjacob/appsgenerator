<?php

namespace system\data\repository\model;

use system\data\repository\interfaces\IRepository;

class Repository implements IRepository {

    protected $entity;

    public function find()
    {

    }

    public function findAll()
    {

    }

    public function delete()
    {

    }

    public function modify()
    {

    }

    public function save()
    {

    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param mixed $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }
    public function createTable()
    {}

    public function alterTableDrop()
    {}

    public function alterTableModify()
    {}

    public function dropTable()
    {}

    public function alterTableAdd()
    {}


}

?>