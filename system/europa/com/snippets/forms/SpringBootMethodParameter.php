<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringBootMethodParameter : USAGE EXAMPLE ####################### 

	$varSpringBootMethodParameter = new SpringBootMethodParameter();

	$varSpringBootMethodParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootMethodParameter extends GeneratorClass {

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

