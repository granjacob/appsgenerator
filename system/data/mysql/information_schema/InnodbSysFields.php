<?php            namespace system\data\mysql\information_schema;            class InnodbSysFields extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'INDEX_ID' => 'indexId','NAME' => 'name','POS' => 'pos',            );                }                private $indexId;private $name;private $pos;                public function getindexId()            {                return $this->indexId;            }public function getname()            {                return $this->name;            }public function getpos()            {                return $this->pos;            }                public function setindexId( $indexId )            {                $this->indexId = $indexId;            }public function setname( $name )            {                $this->name = $name;            }public function setpos( $pos )            {                $this->pos = $pos;            }            }            ?>