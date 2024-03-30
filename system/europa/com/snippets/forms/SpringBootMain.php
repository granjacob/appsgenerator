<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringBootMain : USAGE EXAMPLE ####################### 

	$varSpringBootMain = new SpringBootMain();

	$varSpringBootMain->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootMain extends GeneratorClass {

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

