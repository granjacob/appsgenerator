<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class_method : USAGE EXAMPLE ####################### 

	$varclass_method = new class_method();

	$varclass_method->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_method extends GeneratorClass {

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

