<?php


abstract class GeneratorClass extends ArrayObject {

    public $selected;

    public $disabled;

    public $customCondition;

    public function __construct()
    {
        $this->options = array();
    }

    public function validateData()
    {
    }

    public abstract function write( $options=array() );

}

?>