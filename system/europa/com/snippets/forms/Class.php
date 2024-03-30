<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### class : USAGE EXAMPLE ####################### 

	$varclass = new class();

	$varclass->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class class extends GeneratorClass {

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

