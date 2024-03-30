<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringControllerMethodN : USAGE EXAMPLE ####################### 

	$varSpringControllerMethodN = new SpringControllerMethodN();

	$varSpringControllerMethodN->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethodN extends GeneratorClass {

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

