<?php            namespace system\data\mysql\information_schema;            class KeyColumnUsage extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'CONSTRAINT_CATALOG' => 'constraintCatalog','CONSTRAINT_SCHEMA' => 'constraintSchema','CONSTRAINT_NAME' => 'constraintName','TABLE_CATALOG' => 'tableCatalog','TABLE_SCHEMA' => 'tableSchema','TABLE_NAME' => 'tableName','COLUMN_NAME' => 'columnName','ORDINAL_POSITION' => 'ordinalPosition','POSITION_IN_UNIQUE_CONSTRAINT' => 'positionInUniqueConstraint','REFERENCED_TABLE_SCHEMA' => 'referencedTableSchema','REFERENCED_TABLE_NAME' => 'referencedTableName','REFERENCED_COLUMN_NAME' => 'referencedColumnName',            );                }                private $constraintCatalog;private $constraintSchema;private $constraintName;private $tableCatalog;private $tableSchema;private $tableName;private $columnName;private $ordinalPosition;private $positionInUniqueConstraint;private $referencedTableSchema;private $referencedTableName;private $referencedColumnName;                public function getconstraintCatalog()            {                return $this->constraintCatalog;            }public function getconstraintSchema()            {                return $this->constraintSchema;            }public function getconstraintName()            {                return $this->constraintName;            }public function gettableCatalog()            {                return $this->tableCatalog;            }public function gettableSchema()            {                return $this->tableSchema;            }public function gettableName()            {                return $this->tableName;            }public function getcolumnName()            {                return $this->columnName;            }public function getordinalPosition()            {                return $this->ordinalPosition;            }public function getpositionInUniqueConstraint()            {                return $this->positionInUniqueConstraint;            }public function getreferencedTableSchema()            {                return $this->referencedTableSchema;            }public function getreferencedTableName()            {                return $this->referencedTableName;            }public function getreferencedColumnName()            {                return $this->referencedColumnName;            }                public function setconstraintCatalog( $constraintCatalog )            {                $this->constraintCatalog = $constraintCatalog;            }public function setconstraintSchema( $constraintSchema )            {                $this->constraintSchema = $constraintSchema;            }public function setconstraintName( $constraintName )            {                $this->constraintName = $constraintName;            }public function settableCatalog( $tableCatalog )            {                $this->tableCatalog = $tableCatalog;            }public function settableSchema( $tableSchema )            {                $this->tableSchema = $tableSchema;            }public function settableName( $tableName )            {                $this->tableName = $tableName;            }public function setcolumnName( $columnName )            {                $this->columnName = $columnName;            }public function setordinalPosition( $ordinalPosition )            {                $this->ordinalPosition = $ordinalPosition;            }public function setpositionInUniqueConstraint( $positionInUniqueConstraint )            {                $this->positionInUniqueConstraint = $positionInUniqueConstraint;            }public function setreferencedTableSchema( $referencedTableSchema )            {                $this->referencedTableSchema = $referencedTableSchema;            }public function setreferencedTableName( $referencedTableName )            {                $this->referencedTableName = $referencedTableName;            }public function setreferencedColumnName( $referencedColumnName )            {                $this->referencedColumnName = $referencedColumnName;            }            }            ?>