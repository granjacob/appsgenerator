<?php            namespace system\data\mysql\information_schema;            class InnodbFtIndexTable extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'WORD' => 'word','FIRST_DOC_ID' => 'firstDocId','LAST_DOC_ID' => 'lastDocId','DOC_COUNT' => 'docCount','DOC_ID' => 'docId','POSITION' => 'position',            );                }                private $word;private $firstDocId;private $lastDocId;private $docCount;private $docId;private $position;                public function getword()            {                return $this->word;            }public function getfirstDocId()            {                return $this->firstDocId;            }public function getlastDocId()            {                return $this->lastDocId;            }public function getdocCount()            {                return $this->docCount;            }public function getdocId()            {                return $this->docId;            }public function getposition()            {                return $this->position;            }                public function setword( $word )            {                $this->word = $word;            }public function setfirstDocId( $firstDocId )            {                $this->firstDocId = $firstDocId;            }public function setlastDocId( $lastDocId )            {                $this->lastDocId = $lastDocId;            }public function setdocCount( $docCount )            {                $this->docCount = $docCount;            }public function setdocId( $docId )            {                $this->docId = $docId;            }public function setposition( $position )            {                $this->position = $position;            }            }            ?>