<?php

namespace system\europa\com\java\spring;
use system\jupiter\core\GeneratorClass;
use \system\europa\com\java\spring\class_constructor;
use \system\europa\com\java\spring\class_attribute;
use \system\europa\com\java\spring\class_attribute_nasdaq;
use \system\europa\com\java\spring\class_method;

/* ####################### class : USAGE EXAMPLE ####################### 

	$varclass = new class();

	$varclass->setClassName("class_class_name_EXAMPLE");

	$varclass->setClassNameExtends("class_class_name_extends_EXAMPLE");

	$varconstructor = new class_constructor();
	$varclass->addConstructorItem( $varConstructorItem );

	$varattributes = new class_attribute();
	$varclass->addAttributesItem( $varAttributesItem );

	$varnasdaq_attributes = new class_attribute_nasdaq();
	$varclass->addNasdaqAttributesItem( $varNasdaqAttributesItem );

	$varmethods = new class_method();
	$varclass->addMethodsItem( $varMethodsItem );

	$varclass->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class extends GeneratorClass {

	protected $class_name;

	protected $class_name_extends;

	protected class_constructor $constructor;

	protected class_attribute $attributes;

	protected class_attribute_nasdaq $nasdaq_attributes;

	protected class_method $methods;

public function __construct()

{

		parent :: __construct();

	$this->class_name =  null;

	$this->class_name_extends =  null;

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

	public function setClassNameExtends(  $class_name_extends)
{

		 $this->class_name_extends = $class_name_extends;
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

	public function getClassNameExtends()
{

		return $this->class_name_extends;
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

	public function addConstructorItem( class_constructor $item )
{

		$this->constructor->append( clone $item);
return $this; 
}

	public function addAttributesItem( class_attribute $item )
{

		$this->attributes->append( clone $item);
return $this; 
}

	public function addNasdaqAttributesItem( class_attribute_nasdaq $item )
{

		$this->nasdaq_attributes->append( clone $item);
return $this; 
}

	public function addMethodsItem( class_method $item )
{

		$this->methods->append( clone $item);
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
$this->writeArrayObject( $this->constructor );

print "\n";
print "                \n";		
$this->writeArrayObject( $this->attributes );

print "\n";
print "                \n";		
$this->writeArrayObject( $this->nasdaq_attributes );

print "\n";
print "                \n";		
$this->writeArrayObject( $this->methods );

print "\n";
print "            }\n";
}

 } 


?>

