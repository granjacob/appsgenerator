<?php

namespace system\titan\std\beast;
use system\jupiter\core\GeneratorClass;

/* ####################### Prueba1 : USAGE EXAMPLE ####################### 

	$varPrueba1 = new Prueba1();

	$varPrueba1->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Prueba1 extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "1111111 Template extensivo de prueba! :) ;)\n";
}

 } 


?>

