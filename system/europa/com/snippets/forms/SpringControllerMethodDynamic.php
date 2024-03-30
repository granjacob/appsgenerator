<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringControllerMethodDynamic : USAGE EXAMPLE ####################### 

	$varSpringControllerMethodDynamic = new SpringControllerMethodDynamic();

	$varSpringControllerMethodDynamic->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethodDynamic extends GeneratorClass {

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

