<?php namespace system\data\mysql\information_schema;
class Collations extends MySQLBase
{
    public function __construct()
    {
        parent:: __construct();
        $this->tableReference = array('COLLATION_NAME' => 'collationName', 'CHARACTER_SET_NAME' => 'characterSetName', 'ID' => 'id', 'IS_DEFAULT' => 'isDefault', 'IS_COMPILED' => 'isCompiled', 'SORTLEN' => 'sortlen',);
    }

    private $collationName;
    private $characterSetName;
    private $id;
    private $isDefault;
    private $isCompiled;
    private $sortlen;

    public function getcollationName()
    {
        return $this->collationName;
    }

    public function getcharacterSetName()
    {
        return $this->characterSetName;
    }

    public function getid()
    {
        return $this->id;
    }

    public function getisDefault()
    {
        return $this->isDefault;
    }

    public function getisCompiled()
    {
        return $this->isCompiled;
    }

    public function getsortlen()
    {
        return $this->sortlen;
    }

    public function setcollationName($collationName)
    {
        $this->collationName = $collationName;
    }

    public function setcharacterSetName($characterSetName)
    {
        $this->characterSetName = $characterSetName;
    }

    public function setid($id)
    {
        $this->id = $id;
    }

    public function setisDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    public function setisCompiled($isCompiled)
    {
        $this->isCompiled = $isCompiled;
    }

    public function setsortlen($sortlen)
    {
        $this->sortlen = $sortlen;
    }
} ?>