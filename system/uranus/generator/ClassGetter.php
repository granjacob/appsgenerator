<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;

/* ####################### ClassGetter : USAGE EXAMPLE ####################### 

	$varClassGetter = new ClassGetter();

	$varClassGetter->setName("ClassGetter_name_EXAMPLE");

	$varClassGetter->write();

    ####################### USAGE EXAMPLE ####################### **/

class ClassGetter extends GeneratorClass
{

    public $name;

    public function __construct()

    {

        parent:: __construct();

        $this->name = null;

    }

    public function setName($name)
    {

        $this->name = $name;
        return $this;
    }

    public function getName()
    {

        return $this->name;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "public function get{$this->name}()";
        $output .= "            {";
        $output .= "                return \$this->{$this->name};";
        $output .= "            }";
        return $output;
    }

}


?>

