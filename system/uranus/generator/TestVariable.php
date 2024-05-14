<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;

/* ####################### TestVariable : USAGE EXAMPLE ####################### 

	$varTestVariable = new TestVariable();

	$varTestVariable->setAccessModifier("TestVariable_accessModifier_EXAMPLE");

	$varTestVariable->setJungle("TestVariable_jungle_EXAMPLE");

	$varTestVariable->write();

    ####################### USAGE EXAMPLE ####################### **/

class TestVariable extends GeneratorClass
{

    public $accessModifier;

    public $jungle;

    public function __construct()

    {

        parent:: __construct();

        $this->accessModifier = null;

        $this->jungle = null;

    }

    public function setAccessModifier($accessModifier)
    {

        $this->accessModifier = $accessModifier;
        return $this;
    }

    public function setJungle($jungle)
    {

        $this->jungle = $jungle;
        return $this;
    }

    public function getAccessModifier()
    {

        return $this->accessModifier;
    }

    public function getJungle()
    {

        return $this->jungle;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "before{$this->accessModifier}\n";
        $output .= "\n";
        $output .= "            and before after\n";
        $output .= "\n";
        $output .= "            \n";
        if (($this->jungle !== null &&
            $this->jungle->count() > 0)) {


            $output .= "welcome to the {$this->jungle}\n";

        }

        $output .= "\n";
        $output .= "\n";
        $output .= "            after\n";
        return $output;
    }

}


?>

