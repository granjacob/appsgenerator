<?php            namespace system\data\mysql\information_schema;            class InnodbCmpPerIndexReset extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'database_name' => 'databaseName','table_name' => 'tableName','index_name' => 'indexName','compress_ops' => 'compressOps','compress_ops_ok' => 'compressOpsOk','compress_time' => 'compressTime','uncompress_ops' => 'uncompressOps','uncompress_time' => 'uncompressTime',            );                }                private $databaseName;private $tableName;private $indexName;private $compressOps;private $compressOpsOk;private $compressTime;private $uncompressOps;private $uncompressTime;                public function getdatabaseName()            {                return $this->databaseName;            }public function gettableName()            {                return $this->tableName;            }public function getindexName()            {                return $this->indexName;            }public function getcompressOps()            {                return $this->compressOps;            }public function getcompressOpsOk()            {                return $this->compressOpsOk;            }public function getcompressTime()            {                return $this->compressTime;            }public function getuncompressOps()            {                return $this->uncompressOps;            }public function getuncompressTime()            {                return $this->uncompressTime;            }                public function setdatabaseName( $databaseName )            {                $this->databaseName = $databaseName;            }public function settableName( $tableName )            {                $this->tableName = $tableName;            }public function setindexName( $indexName )            {                $this->indexName = $indexName;            }public function setcompressOps( $compressOps )            {                $this->compressOps = $compressOps;            }public function setcompressOpsOk( $compressOpsOk )            {                $this->compressOpsOk = $compressOpsOk;            }public function setcompressTime( $compressTime )            {                $this->compressTime = $compressTime;            }public function setuncompressOps( $uncompressOps )            {                $this->uncompressOps = $uncompressOps;            }public function setuncompressTime( $uncompressTime )            {                $this->uncompressTime = $uncompressTime;            }            }            ?>