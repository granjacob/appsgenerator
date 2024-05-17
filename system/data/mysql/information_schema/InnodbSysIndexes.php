<?php namespace system\data\mysql\information_schema;
class InnodbSysIndexes extends MySQLBase
{
    public function __construct()
    {
        parent:: __construct();
        $this->tableReference = array('INDEX_ID' => 'indexId', 'NAME' => 'name', 'TABLE_ID' => 'tableId', 'TYPE' => 'type', 'N_FIELDS' => 'nFields', 'PAGE_NO' => 'pageNo', 'SPACE' => 'space', 'MERGE_THRESHOLD' => 'mergeThreshold',);
    }

    private $indexId;
    private $name;
    private $tableId;
    private $type;
    private $nFields;
    private $pageNo;
    private $space;
    private $mergeThreshold;

    public function getindexId()
    {
        return $this->indexId;
    }

    public function getname()
    {
        return $this->name;
    }

    public function gettableId()
    {
        return $this->tableId;
    }

    public function gettype()
    {
        return $this->type;
    }

    public function getnFields()
    {
        return $this->nFields;
    }

    public function getpageNo()
    {
        return $this->pageNo;
    }

    public function getspace()
    {
        return $this->space;
    }

    public function getmergeThreshold()
    {
        return $this->mergeThreshold;
    }

    public function setindexId($indexId)
    {
        $this->indexId = $indexId;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    public function settableId($tableId)
    {
        $this->tableId = $tableId;
    }

    public function settype($type)
    {
        $this->type = $type;
    }

    public function setnFields($nFields)
    {
        $this->nFields = $nFields;
    }

    public function setpageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    public function setspace($space)
    {
        $this->space = $space;
    }

    public function setmergeThreshold($mergeThreshold)
    {
        $this->mergeThreshold = $mergeThreshold;
    }
} ?>