<?php

namespace system\uranus\php\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### AssocArrayValue : USAGE EXAMPLE ####################### 

	$varAssocArrayValue = new AssocArrayValue();

	$varAssocArrayValue->setKey("AssocArrayValue_key_EXAMPLE");

	$varAssocArrayValue->setValue("AssocArrayValue_value_EXAMPLE");

	$varAssocArrayValue->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class AssocArrayValue extends GeneratorClass {

	public $key;

	public $value;

public function __construct()

{

		parent :: __construct();

	$this->key =  null;

	$this->value =  null;

}

	public function setKey(  $key)
{

		 $this->key = $key;
return $this; 
}

	public function setValue(  $value)
{

		 $this->value = $value;
return $this; 
}

	public function getKey()
{

		return $this->key;
}

	public function getValue()
{

		return $this->value;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "'{$this->key}' => '{$this->value}',";
 return $output; }

 } 


?>

