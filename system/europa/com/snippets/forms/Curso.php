<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### Curso : USAGE EXAMPLE ####################### 

	$varCurso = new Curso();

	$varCurso->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Curso extends GeneratorClass {

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

