<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### SpringAutowiredService : USAGE EXAMPLE ####################### 

	$varSpringAutowiredService = new SpringAutowiredService();

	$varSpringAutowiredService->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringAutowiredService extends GeneratorClass {

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

