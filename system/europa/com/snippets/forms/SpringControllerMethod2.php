<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringControllerMethod2 : USAGE EXAMPLE ####################### 

	$varSpringControllerMethod2 = new SpringControllerMethod2();

	$varSpringControllerMethod2->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethod2 extends GeneratorClass {

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

