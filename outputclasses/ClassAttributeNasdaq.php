
<?php

require_once( "GeneratorClass.php" );
require_once( "prefixedNasdaq.php" );

/* ####################### class_attribute_nasdaq : USAGE EXAMPLE ####################### 

	$varclass_attribute_nasdaq = new class_attribute_nasdaq();

	$varclass_attribute_nasdaq->setAccessModifier("XXXXXXX");

	$varattributeName = new prefixedNasdaq();
	$varclass_attribute_nasdaq->addAttributeNameItem( $varAttributeName );

	$varclass_attribute_nasdaq->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_attribute_nasdaq extends GeneratorClass {

	protected $access_modifier;

	protected prefixedNasdaq $attributeName;

public function __construct()

{

		parent :: __construct();

	$this->access_modifier =  null;

	$this->attributeName =  new prefixedNasdaq();

}

	public function setAccessModifier(  $access_modifier)
{

		 $this->access_modifier = $access_modifier;
return $this; 
}

	public function setAttributeName( prefixedNasdaq $attributeName)
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

	public function addAttributeNameItem( prefixedNasdaq $item )
{

		$this->attributeName->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "{$this->access_modifier}\n";
print " \n";		
if ($this->attributeName !== null) {		
foreach ($this->attributeName as $item_attributeName) {
			$item_attributeName->write();
		}}

print ";\n";
}

 } 


?>

