<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### method_parameter : USAGE EXAMPLE ####################### 

	$varmethod_parameter = new method_parameter();

	$varmethod_parameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class method_parameter extends GeneratorClass {

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

