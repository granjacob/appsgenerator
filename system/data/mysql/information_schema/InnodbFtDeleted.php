<?php            namespace system\data\mysql\information_schema;            class InnodbFtDeleted extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'DOC_ID' => 'docId',            );                }                private $docId;                public function getdocId()            {                return $this->docId;            }                public function setdocId( $docId )            {                $this->docId = $docId;            }            }            ?>