<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### TestVariable : USAGE EXAMPLE ####################### 

	$varTestVariable = new TestVariable();

	$varTestVariable->setAccessModifier("TestVariable_accessModifier_EXAMPLE");

	$varTestVariable->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TestVariable extends GeneratorClass {

	public $accessModifier;

public function __construct()

{

		parent :: __construct();

	$this->accessModifier =  null;

}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function write() {

	$this->validateData();

print "before{$this->accessModifier}after\n";
}

 } 


?>

