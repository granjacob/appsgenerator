<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class_attribute_nasdaq : USAGE EXAMPLE ####################### 

	$varclass_attribute_nasdaq = new class_attribute_nasdaq();

	$varclass_attribute_nasdaq->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class_attribute_nasdaq extends GeneratorClass {

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

