<?php

namespace system\uranus\com\ibm\infraestructure\code;
use system\jupiter\core\GeneratorClass;

/* ####################### prueba : USAGE EXAMPLE ####################### 

	$varprueba = new prueba();

	$varprueba->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class prueba extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "Welcome!";
 return $output; }

 } 


?>

