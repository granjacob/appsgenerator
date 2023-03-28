<?php

namespace system\data\repository\interfaces;

interface IRepository {
    public function find();
    public function findAll();
    public function delete();
    public function modify();
    public function save();
    public function createTable();
    public function dropTable();
    public function alterTableAdd();
    public function alterTableDrop();
    public function alterTableModify();
}

?>