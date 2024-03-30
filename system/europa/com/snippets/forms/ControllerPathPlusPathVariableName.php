<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### ControllerPathPlusPathVariableName : USAGE EXAMPLE ####################### 

	$varControllerPathPlusPathVariableName = new ControllerPathPlusPathVariableName();

	$varControllerPathPlusPathVariableName->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ControllerPathPlusPathVariableName extends GeneratorClass {

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

