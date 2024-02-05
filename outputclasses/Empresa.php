
<?php

require_once( "GeneratorClass.php" );

/* ####################### Empresa : USAGE EXAMPLE ####################### 

	$varEmpresa = new Empresa();

	$varEmpresa->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Empresa extends GeneratorClass {

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

