<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### AAAA : USAGE EXAMPLE ####################### 

	$varAAAA = new AAAA();

	$varAAAA->setAtrname("AAAA_atrname_EXAMPLE");

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

