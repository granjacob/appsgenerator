<?php

namespace system\europa\com\java\spring;
use system\jupiter\core\GeneratorClass;

/* ####################### PassMethodParameter : USAGE EXAMPLE ####################### 

	$varPassMethodParameter = new PassMethodParameter();

	$varPassMethodParameter->setVariableName("PassMethodParameter_variableName_EXAMPLE");

	$varPassMethodParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PassMethodParameter extends GeneratorClass {

	protected $variableName;

public function __construct()

{

		parent :: __construct();

	$this->variableName =  null;

}

	public function setVariableName(  $variableName)
{

		 $this->variableName = $variableName;
return $this; 
}

	public function getVariableName()
{

		return $this->variableName;
}

	public function write() {

	$this->validateData();

print "{$this->variableName}\n";
print ",\n";
}

 } 


?>

