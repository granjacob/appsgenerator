<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### AAAA : USAGE EXAMPLE ####################### 

	$varAAAA = new AAAA();

	$varAAAA->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class AAAA extends GeneratorClass {

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

