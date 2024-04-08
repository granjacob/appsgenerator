<?php

namespace system\titan\com;
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

print "Esta es una prueba!\n";
}

 } 


?>

