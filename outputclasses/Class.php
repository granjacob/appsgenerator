
<?php

require_once( "GeneratorClass.php" );
require_once( "class_constructor.php" );
require_once( "class_attribute.php" );
require_once( "class_attribute_nasdaq.php" );
require_once( "class_method.php" );

/* ####################### class : USAGE EXAMPLE ####################### 

	$varclass = new class();

	$varclass->setClassName("XXXXXXX");

	$varconstructor = new class_constructor();
	$varclass->addConstructorItem( $item );

	$varattributes = new class_attribute();
	$varclass->addAttributesItem( $item );

	$varnasdaq_attributes = new class_attribute_nasdaq();
	$varclass->addNasdaqAttributesItem( $item );

	$varmethods = new class_method();
	$varclass->addMethodsItem( $item );

	$varclass->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class extends GeneratorClass {

	protected $class_name;

	protected class_constructor $constructor;

	protected class_attribute $attributes;

	protected class_attribute_nasdaq $nasdaq_attributes;

	protected class_method $methods;

public function __construct()

{

		parent :: __construct();

	$this->class_name =  null;

	$this->constructor =  new class_constructor();

	$this->attributes =  new class_attribute();

	$this->nasdaq_attributes =  new class_attribute_nasdaq();

	$this->methods =  new class_method();

}

	public function setClassName(  $class_name)
{

		 $this->class_name = $class_name;
return $this; 
}

	public function setConstructor( class_constructor $constructor)
{

		 $this->constructor = $constructor;
return $this; 
}

	public function setAttributes( class_attribute $attributes)
{

		 $this->attributes = $attributes;
return $this; 
}

	public function setNasdaqAttributes( class_attribute_nasdaq $nasdaq_attributes)
{

		 $this->nasdaq_attributes = $nasdaq_attributes;
return $this; 
}

	public function setMethods( class_method $methods)
{

		 $this->methods = $methods;
return $this; 
}

	public function getClassName()
{

		return $this->class_name;
}

	public function getConstructor()
{

		return $this->constructor;
}

	public function getAttributes()
{

		return $this->attributes;
}

	public function getNasdaqAttributes()
{

		return $this->nasdaq_attributes;
}

	public function getMethods()
{

		return $this->methods;
}

	public function addClassNameItem(  $item )
{

		$this->class_name->append($item);
return $this; 
}

	public function addConstructorItem( class_constructor $item )
{

		$this->constructor->append($item);
return $this; 
}

	public function addAttributesItem( class_attribute $item )
{

		$this->attributes->append($item);
return $this; 
}

	public function addNasdaqAttributesItem( class_attribute_nasdaq $item )
{

		$this->nasdaq_attributes->append($item);
return $this; 
}

	public function addMethodsItem( class_method $item )
{

		$this->methods->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "public class {$this->class_name} \n";
if () {


print "extends {$this->class_name_extends}\n";

}

print " {\n";
print "                \n";		
if (is_array( $this->constructor)) {		
foreach ($this->constructor as $item_constructor) {
			$item_constructor->write();
		}}

print "\n";
print "                \n";		
if (is_array( $this->attributes)) {		
foreach ($this->attributes as $item_attributes) {
			$item_attributes->write();
		}}

print "\n";
print "                \n";		
if (is_array( $this->nasdaq_attributes)) {		
foreach ($this->nasdaq_attributes as $item_nasdaq_attributes) {
			$item_nasdaq_attributes->write();
		}}

print "\n";
print "                \n";		
if (is_array( $this->methods)) {		
foreach ($this->methods as $item_methods) {
			$item_methods->write();
		}}

print "\n";
print "            }\n";
}

 } 


?>

