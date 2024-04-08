<?php

namespace system\titan\std\beast;
use system\jupiter\core\GeneratorClass;

/* ####################### Prueba2 : USAGE EXAMPLE ####################### 

	$varPrueba2 = new Prueba2();

	$varPrueba2->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Prueba2 extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "2222222 Template extensivo de prueba! :) :) :)\n";
}

 } 


?>

