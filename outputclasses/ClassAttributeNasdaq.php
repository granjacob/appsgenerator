
<?php

require_once( "GeneratorClass.php" );
require_once( "prefixedNasdaq.php" );

/* ####################### class_attribute_nasdaq : USAGE EXAMPLE ####################### 

	$varclass_attribute_nasdaq = new class_attribute_nasdaq();

	$varclass_attribute_nasdaq->setAccessModifier("class_attribute_nasdaq_access_modifier_EXAMPLE");

	$varattributeName = new prefixedNasdaq();
	$varclass_attribute_nasdaq->addAttributeNameItem( $varAttributeNameItem );

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

		$this->attributeName->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "{$this->access_modifier}\n";
print " \n";		
if ($this->attributeName !== null) {		
$keys = array_keys( get_object_vars( $this->attributeName) );		
foreach ($this->attributeName as $key => $item_attributeName) {
		$item_attributeName->options = $this->getOptionsArray( $keys, $key, $item_attributeName );			$item_attributeName->write();
		}}

print ";\n";
}

 } 


?>

