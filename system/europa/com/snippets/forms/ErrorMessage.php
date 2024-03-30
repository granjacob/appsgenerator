<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### ErrorMessage : USAGE EXAMPLE ####################### 

	$varErrorMessage = new ErrorMessage();

	$varErrorMessage->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ErrorMessage extends GeneratorClass {

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

