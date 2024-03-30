<?php

namespace system\titan\std\beast;
use system\jupiter\core\GeneratorClass;

/* ####################### Prueba : USAGE EXAMPLE ####################### 

	$varPrueba = new Prueba();

	$varPrueba->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Prueba extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "Template extensivo de prueba! :)\n";
}

 } 


?>

