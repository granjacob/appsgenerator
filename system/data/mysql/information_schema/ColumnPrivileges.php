<?php            namespace system\data\mysql\information_schema;            class ColumnPrivileges extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'GRANTEE' => 'grantee','TABLE_CATALOG' => 'tableCatalog','TABLE_SCHEMA' => 'tableSchema','TABLE_NAME' => 'tableName','COLUMN_NAME' => 'columnName','PRIVILEGE_TYPE' => 'privilegeType','IS_GRANTABLE' => 'isGrantable',            );                }                private $grantee;private $tableCatalog;private $tableSchema;private $tableName;private $columnName;private $privilegeType;private $isGrantable;                public function getgrantee()            {                return $this->grantee;            }public function gettableCatalog()            {                return $this->tableCatalog;            }public function gettableSchema()            {                return $this->tableSchema;            }public function gettableName()            {                return $this->tableName;            }public function getcolumnName()            {                return $this->columnName;            }public function getprivilegeType()            {                return $this->privilegeType;            }public function getisGrantable()            {                return $this->isGrantable;            }                public function setgrantee( $grantee )            {                $this->grantee = $grantee;            }public function settableCatalog( $tableCatalog )            {                $this->tableCatalog = $tableCatalog;            }public function settableSchema( $tableSchema )            {                $this->tableSchema = $tableSchema;            }public function settableName( $tableName )            {                $this->tableName = $tableName;            }public function setcolumnName( $columnName )            {                $this->columnName = $columnName;            }public function setprivilegeType( $privilegeType )            {                $this->privilegeType = $privilegeType;            }public function setisGrantable( $isGrantable )            {                $this->isGrantable = $isGrantable;            }            }            ?>