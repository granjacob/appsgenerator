<?php

namespace system\data\model;

use system\data\interfaces\IEntity;

abstract class Entity implements IEntity {
    public abstract function getEntityName();
}

?>