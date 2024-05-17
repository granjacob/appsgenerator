<?php

namespace system\data\mysql;

class MySQLBase {

        public function __construct()
        {

        }

        public function getAttributeColumn( $attributeColumn )
        {
            return $this->tableColumnsMap[$attributeColumn];
        }
}