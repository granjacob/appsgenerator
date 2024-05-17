<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### MethodParameter : USAGE EXAMPLE ####################### 

	$varMethodParameter = new MethodParameter();

	$varMethodParameter->setDataType("MethodParameter_dataType_EXAMPLE");

	$varMethodParameter->setName("MethodParameter_name_EXAMPLE");

	$varMethodParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class MethodParameter extends GeneratorClass {

	public $dataType;

	public $name;

public function __construct()

{

		parent :: __construct();

	$this->dataType =  null;

	$this->name =  null;

}

	public function setDataType(  $dataType)
{

		 $this->dataType = $dataType;
return $this; 
}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function getDataType()
{

		return $this->dataType;
}

	public function getName()
{

		return $this->name;
}

	public function write() {

		$output = ""; 

		$this->validateData();

if (($this->verifyOptionalExpression($this->dataType))) {


$output .= "{$this->dataType}";
$output .= "";

}

$output .= " \${$this->name},";
 return $output; }

 } 


?>

