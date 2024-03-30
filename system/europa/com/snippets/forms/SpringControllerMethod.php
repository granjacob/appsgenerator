<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringControllerMethod : USAGE EXAMPLE ####################### 

	$varSpringControllerMethod = new SpringControllerMethod();

	$varSpringControllerMethod->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethod extends GeneratorClass {

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

