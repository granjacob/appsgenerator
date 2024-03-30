<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class_constructor : USAGE EXAMPLE ####################### 

	$varclass_constructor = new class_constructor();

	$varclass_constructor->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_constructor extends GeneratorClass {

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

