<?php namespace system\data\mysql\information_schema;
class InnodbBufferPage extends MySQLBase
{
    public function __construct()
    {
        parent:: __construct();
        $this->tableReference = array('POOL_ID' => 'poolId', 'BLOCK_ID' => 'blockId', 'SPACE' => 'space', 'PAGE_NUMBER' => 'pageNumber', 'PAGE_TYPE' => 'pageType', 'FLUSH_TYPE' => 'flushType', 'FIX_COUNT' => 'fixCount', 'IS_HASHED' => 'isHashed', 'NEWEST_MODIFICATION' => 'newestModification', 'OLDEST_MODIFICATION' => 'oldestModification', 'ACCESS_TIME' => 'accessTime', 'TABLE_NAME' => 'tableName', 'INDEX_NAME' => 'indexName', 'NUMBER_RECORDS' => 'numberRecords', 'DATA_SIZE' => 'dataSize', 'COMPRESSED_SIZE' => 'compressedSize', 'PAGE_STATE' => 'pageState', 'IO_FIX' => 'ioFix', 'IS_OLD' => 'isOld', 'FREE_PAGE_CLOCK' => 'freePageClock',);
    }

    private $poolId;
    private $blockId;
    private $space;
    private $pageNumber;
    private $pageType;
    private $flushType;
    private $fixCount;
    private $isHashed;
    private $newestModification;
    private $oldestModification;
    private $accessTime;
    private $tableName;
    private $indexName;
    private $numberRecords;
    private $dataSize;
    private $compressedSize;
    private $pageState;
    private $ioFix;
    private $isOld;
    private $freePageClock;

    public function getpoolId()
    {
        return $this->poolId;
    }

    public function getblockId()
    {
        return $this->blockId;
    }

    public function getspace()
    {
        return $this->space;
    }

    public function getpageNumber()
    {
        return $this->pageNumber;
    }

    public function getpageType()
    {
        return $this->pageType;
    }

    public function getflushType()
    {
        return $this->flushType;
    }

    public function getfixCount()
    {
        return $this->fixCount;
    }

    public function getisHashed()
    {
        return $this->isHashed;
    }

    public function getnewestModification()
    {
        return $this->newestModification;
    }

    public function getoldestModification()
    {
        return $this->oldestModification;
    }

    public function getaccessTime()
    {
        return $this->accessTime;
    }

    public function gettableName()
    {
        return $this->tableName;
    }

    public function getindexName()
    {
        return $this->indexName;
    }

    public function getnumberRecords()
    {
        return $this->numberRecords;
    }

    public function getdataSize()
    {
        return $this->dataSize;
    }

    public function getcompressedSize()
    {
        return $this->compressedSize;
    }

    public function getpageState()
    {
        return $this->pageState;
    }

    public function getioFix()
    {
        return $this->ioFix;
    }

    public function getisOld()
    {
        return $this->isOld;
    }

    public function getfreePageClock()
    {
        return $this->freePageClock;
    }

    public function setpoolId($poolId)
    {
        $this->poolId = $poolId;
    }

    public function setblockId($blockId)
    {
        $this->blockId = $blockId;
    }

    public function setspace($space)
    {
        $this->space = $space;
    }

    public function setpageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
    }

    public function setpageType($pageType)
    {
        $this->pageType = $pageType;
    }

    public function setflushType($flushType)
    {
        $this->flushType = $flushType;
    }

    public function setfixCount($fixCount)
    {
        $this->fixCount = $fixCount;
    }

    public function setisHashed($isHashed)
    {
        $this->isHashed = $isHashed;
    }

    public function setnewestModification($newestModification)
    {
        $this->newestModification = $newestModification;
    }

    public function setoldestModification($oldestModification)
    {
        $this->oldestModification = $oldestModification;
    }

    public function setaccessTime($accessTime)
    {
        $this->accessTime = $accessTime;
    }

    public function settableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function setindexName($indexName)
    {
        $this->indexName = $indexName;
    }

    public function setnumberRecords($numberRecords)
    {
        $this->numberRecords = $numberRecords;
    }

    public function setdataSize($dataSize)
    {
        $this->dataSize = $dataSize;
    }

    public function setcompressedSize($compressedSize)
    {
        $this->compressedSize = $compressedSize;
    }

    public function setpageState($pageState)
    {
        $this->pageState = $pageState;
    }

    public function setioFix($ioFix)
    {
        $this->ioFix = $ioFix;
    }

    public function setisOld($isOld)
    {
        $this->isOld = $isOld;
    }

    public function setfreePageClock($freePageClock)
    {
        $this->freePageClock = $freePageClock;
    }
} ?>