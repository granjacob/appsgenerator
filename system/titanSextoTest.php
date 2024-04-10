<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\std\beast\Prueba;
use system\titan\std\beast\Prueba1;
use system\titan\std\beast\Prueba2;
use system\titan\com\Prueba;

/* ####################### SextoTest : USAGE EXAMPLE ####################### 

	$varSextoTest = new SextoTest();

	$varvar = new Prueba();
	$varSextoTest->addVarItem( $varVarItem );

	$varvar1 = new Prueba1();
	$varSextoTest->addVar1Item( $varVar1Item );

	$varvar2 = new Prueba2();
	$varSextoTest->addVar2Item( $varVar2Item );

	$varvar3 = new Prueba();
	$varSextoTest->addVar3Item( $varVar3Item );

	$varSextoTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SextoTest extends GeneratorClass {

	protected Prueba $var;

	protected Prueba1 $var1;

	protected Prueba2 $var2;

	protected Prueba $var3;

public function __construct()

{

		parent :: __construct();

	$this->var =  new Prueba();

	$this->var1 =  new Prueba1();

	$this->var2 =  new Prueba2();

	$this->var3 =  new Prueba();

}

	public function setVar( Prueba $var)
{

		 $this->var = $var;
return $this; 
}

	public function setVar1( Prueba1 $var1)
{

		 $this->var1 = $var1;
return $this; 
}

	public function setVar2( Prueba2 $var2)
{

		 $this->var2 = $var2;
return $this; 
}

	public function setVar3( Prueba $var3)
{

		 $this->var3 = $var3;
return $this; 
}

	public function getVar()
{

		return $this->var;
}

	public function getVar1()
{

		return $this->var1;
}

	public function getVar2()
{

		return $this->var2;
}

	public function getVar3()
{

		return $this->var3;
}

	public function addVarItem( Prueba $item )
{

		$this->var->append( clone $item);
return $this; 
}

	public function addVar1Item( Prueba1 $item )
{

		$this->var1->append( clone $item);
return $this; 
}

	public function addVar2Item( Prueba2 $item )
{

		$this->var2->append( clone $item);
return $this; 
}

	public function addVar3Item( Prueba $item )
{

		$this->var3->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Test1 \n";		
$this->writeArrayObject( $this->var );

print "}\n";
print "            Test2 \n";		
$this->writeArrayObject( $this->var1 );

print "}\n";
print "            Test3 \n";		
$this->writeArrayObject( $this->var2 );

print "}\n";
print "            Test4 \n";		
$this->writeArrayObject( $this->var3 );

print "}\n";
}

 } 


?>

