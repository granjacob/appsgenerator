<?php            namespace system\data\mysql\information_schema;            class InnodbSysTablespaces extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'SPACE' => 'space','NAME' => 'name','FLAG' => 'flag','ROW_FORMAT' => 'rowFormat','PAGE_SIZE' => 'pageSize','ZIP_PAGE_SIZE' => 'zipPageSize','SPACE_TYPE' => 'spaceType','FS_BLOCK_SIZE' => 'fsBlockSize','FILE_SIZE' => 'fileSize','ALLOCATED_SIZE' => 'allocatedSize',            );                }                private $space;private $name;private $flag;private $rowFormat;private $pageSize;private $zipPageSize;private $spaceType;private $fsBlockSize;private $fileSize;private $allocatedSize;                public function getspace()            {                return $this->space;            }public function getname()            {                return $this->name;            }public function getflag()            {                return $this->flag;            }public function getrowFormat()            {                return $this->rowFormat;            }public function getpageSize()            {                return $this->pageSize;            }public function getzipPageSize()            {                return $this->zipPageSize;            }public function getspaceType()            {                return $this->spaceType;            }public function getfsBlockSize()            {                return $this->fsBlockSize;            }public function getfileSize()            {                return $this->fileSize;            }public function getallocatedSize()            {                return $this->allocatedSize;            }                public function setspace( $space )            {                $this->space = $space;            }public function setname( $name )            {                $this->name = $name;            }public function setflag( $flag )            {                $this->flag = $flag;            }public function setrowFormat( $rowFormat )            {                $this->rowFormat = $rowFormat;            }public function setpageSize( $pageSize )            {                $this->pageSize = $pageSize;            }public function setzipPageSize( $zipPageSize )            {                $this->zipPageSize = $zipPageSize;            }public function setspaceType( $spaceType )            {                $this->spaceType = $spaceType;            }public function setfsBlockSize( $fsBlockSize )            {                $this->fsBlockSize = $fsBlockSize;            }public function setfileSize( $fileSize )            {                $this->fileSize = $fileSize;            }public function setallocatedSize( $allocatedSize )            {                $this->allocatedSize = $allocatedSize;            }            }            ?>