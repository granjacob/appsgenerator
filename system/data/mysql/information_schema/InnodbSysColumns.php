<?php            namespace system\data\mysql\information_schema;            class InnodbSysColumns extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'TABLE_ID' => 'tableId','NAME' => 'name','POS' => 'pos','MTYPE' => 'mtype','PRTYPE' => 'prtype','LEN' => 'len',            );                }                private $tableId;private $name;private $pos;private $mtype;private $prtype;private $len;                public function gettableId()            {                return $this->tableId;            }public function getname()            {                return $this->name;            }public function getpos()            {                return $this->pos;            }public function getmtype()            {                return $this->mtype;            }public function getprtype()            {                return $this->prtype;            }public function getlen()            {                return $this->len;            }                public function settableId( $tableId )            {                $this->tableId = $tableId;            }public function setname( $name )            {                $this->name = $name;            }public function setpos( $pos )            {                $this->pos = $pos;            }public function setmtype( $mtype )            {                $this->mtype = $mtype;            }public function setprtype( $prtype )            {                $this->prtype = $prtype;            }public function setlen( $len )            {                $this->len = $len;            }            }            ?>