<?php            namespace system\data\mysql\information_schema;            class InnodbTablespacesScrubbing extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'SPACE' => 'space','NAME' => 'name','COMPRESSED' => 'compressed','LAST_SCRUB_COMPLETED' => 'lastScrubCompleted','CURRENT_SCRUB_STARTED' => 'currentScrubStarted','CURRENT_SCRUB_ACTIVE_THREADS' => 'currentScrubActiveThreads','CURRENT_SCRUB_PAGE_NUMBER' => 'currentScrubPageNumber','CURRENT_SCRUB_MAX_PAGE_NUMBER' => 'currentScrubMaxPageNumber','ON_SSD' => 'onSsd',            );                }                private $space;private $name;private $compressed;private $lastScrubCompleted;private $currentScrubStarted;private $currentScrubActiveThreads;private $currentScrubPageNumber;private $currentScrubMaxPageNumber;private $onSsd;                public function getspace()            {                return $this->space;            }public function getname()            {                return $this->name;            }public function getcompressed()            {                return $this->compressed;            }public function getlastScrubCompleted()            {                return $this->lastScrubCompleted;            }public function getcurrentScrubStarted()            {                return $this->currentScrubStarted;            }public function getcurrentScrubActiveThreads()            {                return $this->currentScrubActiveThreads;            }public function getcurrentScrubPageNumber()            {                return $this->currentScrubPageNumber;            }public function getcurrentScrubMaxPageNumber()            {                return $this->currentScrubMaxPageNumber;            }public function getonSsd()            {                return $this->onSsd;            }                public function setspace( $space )            {                $this->space = $space;            }public function setname( $name )            {                $this->name = $name;            }public function setcompressed( $compressed )            {                $this->compressed = $compressed;            }public function setlastScrubCompleted( $lastScrubCompleted )            {                $this->lastScrubCompleted = $lastScrubCompleted;            }public function setcurrentScrubStarted( $currentScrubStarted )            {                $this->currentScrubStarted = $currentScrubStarted;            }public function setcurrentScrubActiveThreads( $currentScrubActiveThreads )            {                $this->currentScrubActiveThreads = $currentScrubActiveThreads;            }public function setcurrentScrubPageNumber( $currentScrubPageNumber )            {                $this->currentScrubPageNumber = $currentScrubPageNumber;            }public function setcurrentScrubMaxPageNumber( $currentScrubMaxPageNumber )            {                $this->currentScrubMaxPageNumber = $currentScrubMaxPageNumber;            }public function setonSsd( $onSsd )            {                $this->onSsd = $onSsd;            }            }            ?>