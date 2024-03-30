<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### TypeDato : USAGE EXAMPLE ####################### 

	$varTypeDato = new TypeDato();

	$varTypeDato->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TypeDato extends GeneratorClass {

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

