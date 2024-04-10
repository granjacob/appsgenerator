<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;

/* ####################### TestSnippet : USAGE EXAMPLE ####################### 

	$varTestSnippet = new TestSnippet();

	$varTestSnippet->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TestSnippet extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "Hello world!, this is my first snippet!\n";
}

 } 


?>

