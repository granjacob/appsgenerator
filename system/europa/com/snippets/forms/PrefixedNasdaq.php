<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### prefixedNasdaq : USAGE EXAMPLE ####################### 

	$varprefixedNasdaq = new prefixedNasdaq();

	$varprefixedNasdaq->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class prefixedNasdaq extends GeneratorClass {

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

