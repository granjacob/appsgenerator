<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### EmptyResultsMessage : USAGE EXAMPLE ####################### 

	$varEmptyResultsMessage = new EmptyResultsMessage();

	$varEmptyResultsMessage->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class EmptyResultsMessage extends GeneratorClass {

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

