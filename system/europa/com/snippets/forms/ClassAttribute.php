<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class_attribute : USAGE EXAMPLE ####################### 

	$varclass_attribute = new class_attribute();

	$varclass_attribute->setAccessModifier("class_attribute_access_modifier_EXAMPLE");

	$varclass_attribute->setAttributeName("class_attribute_attributeName_EXAMPLE");

	$varclass_attribute->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_attribute extends GeneratorClass {

	protected $access_modifier;

	protected $attributeName;

public function __construct()

{

		parent :: __construct();

	$this->access_modifier =  null;

	$this->attributeName =  null;

}

	public function setAccessModifier(  $access_modifier)
{

		 $this->access_modifier = $access_modifier;
return $this; 
}

	public function setAttributeName(  $attributeName)
{

		 $this->attributeName = $attributeName;
return $this; 
}

	public function getAccessModifier()
{

		return $this->access_modifier;
}

	public function getAttributeName()
{

		return $this->attributeName;
}

	public function write() {

	$this->validateData();

print "{$this->access_modifier}\n";
print " {$this->attributeName};\n";
}

 } 


?>

