<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### PassMethodParameter : USAGE EXAMPLE ####################### 

	$varPassMethodParameter = new PassMethodParameter();

	$varPassMethodParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PassMethodParameter extends GeneratorClass {

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

