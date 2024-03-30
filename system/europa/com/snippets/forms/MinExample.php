<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### MinExample : USAGE EXAMPLE ####################### 

	$varMinExample = new MinExample();

	$varMinExample->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class MinExample extends GeneratorClass {

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

