
<?php

require_once( "GeneratorClass.php" );

/* ####################### class_method : USAGE EXAMPLE ####################### 

	$varclass_method = new class_method();

	$varclass_method->setMethodName("XXXXXXX");

	$varclass_method->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_method extends GeneratorClass {

	protected $method_name;

public function __construct()

{

		parent :: __construct();

	$this->method_name =  null;

}

	public function setMethodName(  $method_name)
{

		 $this->method_name = $method_name;
return $this; 
}

	public function getMethodName()
{

		return $this->method_name;
}

	public function addMethodNameItem(  $item )
{

		$this->method_name->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "public function {$this->method_name}( \n";
if ((is_array( $this->method_parameters ) && count( $this->method_parameters ) > 0)) {


print "\n";		
if (is_array( $this->method_parameters)) {		
foreach ($this->method_parameters as $item_method_parameters) {
			$item_method_parameters->write();
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

