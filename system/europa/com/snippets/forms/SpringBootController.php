<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringBootController : USAGE EXAMPLE ####################### 

	$varSpringBootController = new SpringBootController();

	$varSpringBootController->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootController extends GeneratorClass {

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

