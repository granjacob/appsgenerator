<?php

namespace system\data\model;

class ColumnDefinition {
    protected $attributeName;
    protected $referedColumn;

    public function __construct( $attributeName, $referedColumn )
    {
        $this->attributeName = $attributeName;
        $this->referedColumn = $referedColumn;
    }
    
    public function getAttributeName() {
        return $this->attributeName;
    }

    public function getReferedColumn() {
        return $this->referedColumn;
    }

    public function setAttributeName($attributeName): void {
        $this->attributeName = $attributeName;
    }

    public function setReferedColumn($referedColumn): void {
        $this->referedColumn = $referedColumn;
    }

 }

 ?>