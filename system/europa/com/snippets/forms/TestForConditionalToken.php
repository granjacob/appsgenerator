<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### TestForConditionalToken : USAGE EXAMPLE ####################### 

	$varTestForConditionalToken = new TestForConditionalToken();

	$varTestForConditionalToken->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TestForConditionalToken extends GeneratorClass {

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

