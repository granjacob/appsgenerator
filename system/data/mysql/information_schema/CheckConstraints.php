<?php            namespace system\data\mysql\information_schema;            class CheckConstraints extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'CONSTRAINT_CATALOG' => 'constraintCatalog','CONSTRAINT_SCHEMA' => 'constraintSchema','TABLE_NAME' => 'tableName','CONSTRAINT_NAME' => 'constraintName','CHECK_CLAUSE' => 'checkClause',            );                }                private $constraintCatalog;private $constraintSchema;private $tableName;private $constraintName;private $checkClause;                public function getconstraintCatalog()            {                return $this->constraintCatalog;            }public function getconstraintSchema()            {                return $this->constraintSchema;            }public function gettableName()            {                return $this->tableName;            }public function getconstraintName()            {                return $this->constraintName;            }public function getcheckClause()            {                return $this->checkClause;            }                public function setconstraintCatalog( $constraintCatalog )            {                $this->constraintCatalog = $constraintCatalog;            }public function setconstraintSchema( $constraintSchema )            {                $this->constraintSchema = $constraintSchema;            }public function settableName( $tableName )            {                $this->tableName = $tableName;            }public function setconstraintName( $constraintName )            {                $this->constraintName = $constraintName;            }public function setcheckClause( $checkClause )            {                $this->checkClause = $checkClause;            }            }            ?>