<?php            namespace system\data\mysql\information_schema;            class Keywords extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'WORD' => 'word',            );                }                private $word;                public function getword()            {                return $this->word;            }                public function setword( $word )            {                $this->word = $word;            }            }            ?>