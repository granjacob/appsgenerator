
<?php

use system\jupiter\core\GeneratorClass;

/* ####################### HelloWorld : USAGE EXAMPLE ####################### 

	$varHelloWorld = new HelloWorld();

	$varHelloWorld->setVariableValue("HelloWorld_variableValue_EXAMPLE");

	$varHelloWorld->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HelloWorld extends GeneratorClass {

	protected $variableValue;

public function __construct()

{

		parent :: __construct();

	$this->variableValue =  null;

}

	public function setVariableValue(  $variableValue)
{

		 $this->variableValue = $variableValue;
return $this; 
}

	public function getVariableValue()
{

		return $this->variableValue;
}

	public function write() {

	$this->validateData();

print "#include <iostream>\n";
print "using namespace sts;\n";
print "\n";
print "int main()\n";
print "{\n";
print "    cout << \"This is a test program for write the variable \" << \n";
print "        \"{$this->variableValue}\" << endl;\n";
print "    return 0;\n";
print "}\n";
}

 } 


?>

