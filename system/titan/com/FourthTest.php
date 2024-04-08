<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\com\Prueba;
use system\titan\com\Prueba1;
use system\titan\com\Prueba2;

/* ####################### FourthTest : USAGE EXAMPLE ####################### 

	$varFourthTest = new FourthTest();

	$varvar = new Prueba();
	$varFourthTest->addVarItem( $varVarItem );

	$varvarattr1 = new Prueba1();
	$varFourthTest->addVarattr1Item( $varVarattr1Item );

	$varvarattr2 = new Prueba2();
	$varFourthTest->addVarattr2Item( $varVarattr2Item );

	$varFourthTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class FourthTest extends GeneratorClass {

	protected Prueba $var;

	protected Prueba1 $varattr1;

	protected Prueba2 $varattr2;

public function __construct()

{

		parent :: __construct();

	$this->var =  new Prueba();

	$this->varattr1 =  new Prueba1();

	$this->varattr2 =  new Prueba2();

}

	public function setVar( Prueba $var)
{

		 $this->var = $var;
return $this; 
}

	public function setVarattr1( Prueba1 $varattr1)
{

		 $this->varattr1 = $varattr1;
return $this; 
}

	public function setVarattr2( Prueba2 $varattr2)
{

		 $this->varattr2 = $varattr2;
return $this; 
}

	public function getVar()
{

		return $this->var;
}

	public function getVarattr1()
{

		return $this->varattr1;
}

	public function getVarattr2()
{

		return $this->varattr2;
}

	public function addVarItem( Prueba $item )
{

		$this->var->append( clone $item);
return $this; 
}

	public function addVarattr1Item( Prueba1 $item )
{

		$this->varattr1->append( clone $item);
return $this; 
}

	public function addVarattr2Item( Prueba2 $item )
{

		$this->varattr2->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Test1 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
print "            Test2 \n";		
$this->writeArrayObject( $this->varattr1 );

print "}\n";
print "            Test2 \n";		
$this->writeArrayObject( $this->varattr2 );

print "}\n";
}

 } 


?>

