<?php

namespace system\europa\com\java\spring;
use system\jupiter\core\GeneratorClass;

/* ####################### HelloWorld : USAGE EXAMPLE ####################### 

	$varHelloWorld = new HelloWorld();

	$varHelloWorld->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HelloWorld extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "\n";
}

 } 


?>

