
<?php

require_once( "GeneratorClass.php" );

/* ####################### Empresa : USAGE EXAMPLE ####################### 

	$varEmpresa = new Empresa();

	$varEmpresa->setNetWorth("Empresa_NetWorth_EXAMPLE");

	$varEmpresa->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Empresa extends GeneratorClass {

	protected $NetWorth;

public function __construct()

{

		parent :: __construct();

	$this->NetWorth =  null;

}

	public function setNetWorth(  $NetWorth)
{

		 $this->NetWorth = $NetWorth;
return $this; 
}

	public function getNetWorth()
{

		return $this->NetWorth;
}

	public function write() {

	$this->validateData();

print "\$ {$this->NetWorth}\n";
}

 } 


?>

