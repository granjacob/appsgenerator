<?php

namespace system\europa\com\subpackage;
use system\jupiter\core\GeneratorClass;

/* ####################### HelloWorld : USAGE EXAMPLE ####################### 

	$varHelloWorld = new HelloWorld();

	$varHelloWorld->setVariableValue("HelloWorld_variableValue_EXAMPLE");

	$varHelloWorld->set(com.java.spring.SpringBootController)welcomers("HelloWorld_(com.java.spring.SpringBootController)welcomers_EXAMPLE");

	$varHelloWorld->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HelloWorld extends GeneratorClass {

	protected $variableValue;

	protected $(com.java.spring.SpringBootController)welcomers;

public function __construct()

{

		parent :: __construct();

	$this->variableValue =  null;

	$this->(com.java.spring.SpringBootController)welcomers =  null;

}

	public function setVariableValue(  $variableValue)
{

		 $this->variableValue = $variableValue;
return $this; 
}

	public function set(com.java.spring.SpringBootController)welcomers(  $(com.java.spring.SpringBootController)welcomers)
{

		 $this->(com.java.spring.SpringBootController)welcomers = $(com.java.spring.SpringBootController)welcomers;
return $this; 
}

	public function getVariableValue()
{

		return $this->variableValue;
}

	public function get(com.java.spring.SpringBootController)welcomers()
{

		return $this->(com.java.spring.SpringBootController)welcomers;
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
print "\n";
print "{$this->(com.java.spring.SpringBootController)welcomers}\n";
}

 } 


?>

