
<?php

require_once( "GeneratorClass.php" );
require_once( "method_parameter.php" );

/* ####################### class_constructor : USAGE EXAMPLE ####################### 

	$varclass_constructor = new class_constructor();

	$varclass_constructor->setMethodName("class_constructor_method_name_EXAMPLE");

	$varmethod_parameters = new method_parameter();
	$varclass_constructor->addMethodParametersItem( $varMethodParametersItem );

	$varclass_constructor->setMethodBody("class_constructor_method_body_EXAMPLE");

	$varclass_constructor->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_constructor extends GeneratorClass {

	protected $method_name;

	protected method_parameter $method_parameters;

	protected $method_body;

public function __construct()

{

		parent :: __construct();

	$this->method_name =  null;

	$this->method_parameters =  new method_parameter();

	$this->method_body =  null;

}

	public function setMethodName(  $method_name)
{

		 $this->method_name = $method_name;
return $this; 
}

	public function setMethodParameters( method_parameter $method_parameters)
{

		 $this->method_parameters = $method_parameters;
return $this; 
}

	public function setMethodBody(  $method_body)
{

		 $this->method_body = $method_body;
return $this; 
}

	public function getMethodName()
{

		return $this->method_name;
}

	public function getMethodParameters()
{

		return $this->method_parameters;
}

	public function getMethodBody()
{

		return $this->method_body;
}

	public function addMethodParametersItem( method_parameter $item )
{

		$this->method_parameters->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "public function {$this->method_name}( \n";
if (($this->method_parameters !== null &&
 $this->method_parameters->count() > 0)) {


print "\n";		
if ($this->method_parameters !== null) {		
$keys = array_keys( get_object_vars( $this->method_parameters) );		
foreach ($this->method_parameters as $key => $item_method_parameters) {
		$item_method_parameters->options = $this->getOptionsArray( $keys, $key, $item_method_parameters );			$item_method_parameters->write();
		}}

print "\n";

}

print " )\n";
print "            {\n";
print "                \n";
if () {


print "{$this->method_body}\n";
print "\n";

}

print "\n";
print "            }\n";
}

 } 


?>

