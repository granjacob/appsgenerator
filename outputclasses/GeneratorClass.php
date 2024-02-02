<?php


abstract class GeneratorClass extends ArrayObject {

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