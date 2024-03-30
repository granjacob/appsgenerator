<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### PrintMyData : USAGE EXAMPLE ####################### 

	$varPrintMyData = new PrintMyData();

	$varPrintMyData->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PrintMyData extends GeneratorClass {

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

