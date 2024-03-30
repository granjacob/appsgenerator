<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### ColegioJerusalen : USAGE EXAMPLE ####################### 

	$varColegioJerusalen = new ColegioJerusalen();

	$varColegioJerusalen->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ColegioJerusalen extends GeneratorClass {

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

