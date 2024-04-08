<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\com\Prueba;

/* ####################### SeptimoTest : USAGE EXAMPLE ####################### 

	$varSeptimoTest = new SeptimoTest();

	$varvar = new Prueba();
	$varSeptimoTest->addVarItem( $varVarItem );

	$varSeptimoTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SeptimoTest extends GeneratorClass {

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

print "Test1 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
print "            Test2 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
print "            Test3 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
}

 } 


?>

