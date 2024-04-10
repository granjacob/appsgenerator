<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\std\beast\Prueba;

/* ####################### OctTest : USAGE EXAMPLE ####################### 

	$varOctTest = new OctTest();

	$varvar = new Prueba();
	$varOctTest->addVarItem( $varVarItem );

	$varOctTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class OctTest extends GeneratorClass {

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
print "            Test4 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
}

 } 


?>

