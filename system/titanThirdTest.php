<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\std\beast\Prueba;

/* ####################### ThirdTest : USAGE EXAMPLE ####################### 

	$varThirdTest = new ThirdTest();

	$varvar = new Prueba();
	$varThirdTest->addVarItem( $varVarItem );

	$varThirdTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ThirdTest extends GeneratorClass {

	protected Prueba $var;

public function __construct()

{

		parent :: __construct();

	$this->var =  new Prueba();

}

	public function setVar( Prueba $var)
{

		 $this->var = $var;
return $this; 
}

	public function getVar()
{

		return $this->var;
}

	public function addVarItem( Prueba $item )
{

		$this->var->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "T\n";		
$this->writeArrayObject( $this->var );

print "}\n";
}

 } 


?>

