<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### PathVariableParameter : USAGE EXAMPLE ####################### 

	$varPathVariableParameter = new PathVariableParameter();

	$varPathVariableParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PathVariableParameter extends GeneratorClass {

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

