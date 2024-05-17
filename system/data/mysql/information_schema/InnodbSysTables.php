<?php namespace system\data\mysql\information_schema;
class InnodbSysTables extends MySQLBase
{
    public function __construct()
    {
        parent:: __construct();
        $this->tableReference = array('TABLE_ID' => 'tableId', 'NAME' => 'name', 'FLAG' => 'flag', 'N_COLS' => 'nCols', 'SPACE' => 'space', 'ROW_FORMAT' => 'rowFormat', 'ZIP_PAGE_SIZE' => 'zipPageSize', 'SPACE_TYPE' => 'spaceType',);
    }

    private $tableId;
    private $name;
    private $flag;
    private $nCols;
    private $space;
    private $rowFormat;
    private $zipPageSize;
    private $spaceType;

    public function gettableId()
    {
        return $this->tableId;
    }

    public function getname()
    {
        return $this->name;
    }

    public function getflag()
    {
        return $this->flag;
    }

    public function getnCols()
    {
        return $this->nCols;
    }

    public function getspace()
    {
        return $this->space;
    }

    public function getrowFormat()
    {
        return $this->rowFormat;
    }

    public function getzipPageSize()
    {
        return $this->zipPageSize;
    }

    public function getspaceType()
    {
        return $this->spaceType;
    }

    public function settableId($tableId)
    {
        $this->tableId = $tableId;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    public function setflag($flag)
    {
        $this->flag = $flag;
    }

    public function setnCols($nCols)
    {
        $this->nCols = $nCols;
    }

    public function setspace($space)
    {
        $this->space = $space;
    }

    public function setrowFormat($rowFormat)
    {
        $this->rowFormat = $rowFormat;
    }

    public function setzipPageSize($zipPageSize)
    {
        $this->zipPageSize = $zipPageSize;
    }

    public function setspaceType($spaceType)
    {
        $this->spaceType = $spaceType;
    }
} ?>