<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\com\Prueba;
use system\titan\com\Prueba2;

/* ####################### QuintoTest : USAGE EXAMPLE ####################### 

	$varQuintoTest = new QuintoTest();

	$varvar = new Prueba();
	$varQuintoTest->addVarItem( $varVarItem );

	$varvarattr2 = new Prueba();
	$varQuintoTest->addVarattr2Item( $varVarattr2Item );

	$varvarattr3 = new Prueba();
	$varQuintoTest->addVarattr3Item( $varVarattr3Item );

	$varvarattr4 = new Prueba2();
	$varQuintoTest->addVarattr4Item( $varVarattr4Item );

	$varQuintoTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class QuintoTest extends GeneratorClass {

	protected Prueba $var;

	protected Prueba $varattr2;

	protected Prueba $varattr3;

	protected Prueba2 $varattr4;

public function __construct()

{

		parent :: __construct();

	$this->var =  new Prueba();

	$this->varattr2 =  new Prueba();

	$this->varattr3 =  new Prueba();

	$this->varattr4 =  new Prueba2();

}

	public function setVar( Prueba $var)
{

		 $this->var = $var;
return $this; 
}

	public function setVarattr2( Prueba $varattr2)
{

		 $this->varattr2 = $varattr2;
return $this; 
}

	public function setVarattr3( Prueba $varattr3)
{

		 $this->varattr3 = $varattr3;
return $this; 
}

	public function setVarattr4( Prueba2 $varattr4)
{

		 $this->varattr4 = $varattr4;
return $this; 
}

	public function getVar()
{

		return $this->var;
}

	public function getVarattr2()
{

		return $this->varattr2;
}

	public function getVarattr3()
{

		return $this->varattr3;
}

	public function getVarattr4()
{

		return $this->varattr4;
}

	public function addVarItem( Prueba $item )
{

		$this->var->append( clone $item);
return $this; 
}

	public function addVarattr2Item( Prueba $item )
{

		$this->varattr2->append( clone $item);
return $this; 
}

	public function addVarattr3Item( Prueba $item )
{

		$this->varattr3->append( clone $item);
return $this; 
}

	public function addVarattr4Item( Prueba2 $item )
{

		$this->varattr4->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Test1 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
print "            Test2 \n";		
$this->writeArrayObject( $this->varattr2 );

print "}\n";
print "            Test3 \n";		
$this->writeArrayObject( $this->varattr3 );

print "}\n";
print "            Test4 \n";		
$this->writeArrayObject( $this->varattr4 );

print "}\n";
}

 } 


?>

