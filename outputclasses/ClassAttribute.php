
<?php

require_once( "GeneratorClass.php" );

/* ####################### class_attribute : USAGE EXAMPLE ####################### 

	$varclass_attribute = new class_attribute();

	$varclass_attribute->setAccessModifier("XXXXXXX");

	$varclass_attribute->setAttributeName("XXXXXXX");

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

	public function addAccessModifierItem(  $item )
{

		$this->access_modifier->append($item);
return $this; 
}

	public function addAttributeNameItem(  $item )
{

		$this->attributeName->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "{$this->access_modifier}\n";
print " {$this->attributeName};\n";
}

 } 


?>

