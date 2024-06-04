<?php

namespace system\uranus\java\java\defs;
use system\jupiter\core\GeneratorClass;

/* ####################### ClassAttribute : USAGE EXAMPLE ####################### 

	$varClassAttribute = new ClassAttribute();

	$varClassAttribute->setAccessModifier("ClassAttribute_accessModifier_EXAMPLE");

	$varClassAttribute->setDataType("ClassAttribute_dataType_EXAMPLE");

	$varClassAttribute->setAttributeName("ClassAttribute_attributeName_EXAMPLE");

	$varClassAttribute->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ClassAttribute extends GeneratorClass {

	public $accessModifier;

	public $dataType;

	public $attributeName;

public function __construct()

{

		parent :: __construct();

	$this->accessModifier =  null;

	$this->dataType =  null;

	$this->attributeName =  null;

}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setDataType(  $dataType)
{

		 $this->dataType = $dataType;
return $this; 
}

	public function setAttributeName(  $attributeName)
{

		 $this->attributeName = $attributeName;
return $this; 
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getDataType()
{

		return $this->dataType;
}

	public function getAttributeName()
{

		return $this->attributeName;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "{$this->accessModifier}";
$output .= " {$this->dataType} {$this->attributeName};";
 return $output; }

 } 


?>

