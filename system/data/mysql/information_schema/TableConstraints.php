<?php            namespace system\data\mysql\information_schema;            class TableConstraints extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'CONSTRAINT_CATALOG' => 'constraintCatalog','CONSTRAINT_SCHEMA' => 'constraintSchema','CONSTRAINT_NAME' => 'constraintName','TABLE_SCHEMA' => 'tableSchema','TABLE_NAME' => 'tableName','CONSTRAINT_TYPE' => 'constraintType',            );                }                private $constraintCatalog;private $constraintSchema;private $constraintName;private $tableSchema;private $tableName;private $constraintType;                public function getconstraintCatalog()            {                return $this->constraintCatalog;            }public function getconstraintSchema()            {                return $this->constraintSchema;            }public function getconstraintName()            {                return $this->constraintName;            }public function gettableSchema()            {                return $this->tableSchema;            }public function gettableName()            {                return $this->tableName;            }public function getconstraintType()            {                return $this->constraintType;            }                public function setconstraintCatalog( $constraintCatalog )            {                $this->constraintCatalog = $constraintCatalog;            }public function setconstraintSchema( $constraintSchema )            {                $this->constraintSchema = $constraintSchema;            }public function setconstraintName( $constraintName )            {                $this->constraintName = $constraintName;            }public function settableSchema( $tableSchema )            {                $this->tableSchema = $tableSchema;            }public function settableName( $tableName )            {                $this->tableName = $tableName;            }public function setconstraintType( $constraintType )            {                $this->constraintType = $constraintType;            }            }            ?>