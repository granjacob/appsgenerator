
<?php

require_once( "GeneratorClass.php" );

/* ####################### AAAA : USAGE EXAMPLE ####################### 

	$varAAAA = new AAAA();

	$varAAAA->setAtrname("XXXXXXX");

	$varAAAA->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class AAAA extends GeneratorClass {

	protected $atrname;

public function __construct()

{

		parent :: __construct();

	$this->atrname =  null;

}

	public function setAtrname(  $atrname)
{

		 $this->atrname = $atrname;
return $this; 
}

	public function getAtrname()
{

		return $this->atrname;
}

	public function write() {

	$this->validateData();

print "AAAA{$this->atrname}\n";
}

 } 


?>

