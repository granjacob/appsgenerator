
<?php

require_once( "GeneratorClass.php" );
require_once( "method_parameter.php" );

/* ####################### class_method : USAGE EXAMPLE ####################### 

	$varclass_method = new class_method();

	$varclass_method->setMethodName("class_method_method_name_EXAMPLE");

	$varmethod_parameters = new method_parameter();
	$varclass_method->addMethodParametersItem( $varMethodParametersItem );

	$varclass_method->setMethodBody("class_method_method_body_EXAMPLE");

	$varclass_method->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class class_method extends GeneratorClass {

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

		$this->method_parameters->append($item);
return $this; 
}

	public function write( $options ) {

	$this->validateData();

print "public function {$this->method_name}( \n";
if (($this->method_parameters !== null &&
 $this->method_parameters->count() > 0)) {


print "\n";		
if ($this->method_parameters !== null) {		
$keys = array_keys( $this->method_parameters);		
foreach ($this->method_parameters as $item_method_parameters => $key) {
			$options = array( "condition:notlast" => (end( $keys ) === $key ? true : false));			$item_method_parameters->write($options);
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

