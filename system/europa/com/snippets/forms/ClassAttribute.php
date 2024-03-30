<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class_attribute : USAGE EXAMPLE ####################### 

	$varclass_attribute = new class_attribute();

	$varclass_attribute->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_attribute extends GeneratorClass {

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

