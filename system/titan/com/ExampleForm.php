<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\com\InputText;

/* ####################### ExampleForm : USAGE EXAMPLE ####################### 

	$varExampleForm = new ExampleForm();

	$varatributo1 = new InputText();
	$varExampleForm->addAtributo1Item( $varAtributo1Item );

	$varatributo2 = new InputText();
	$varExampleForm->addAtributo2Item( $varAtributo2Item );

	$varatributo3 = new InputText();
	$varExampleForm->addAtributo3Item( $varAtributo3Item );

	$varatributo4 = new InputText();
	$varExampleForm->addAtributo4Item( $varAtributo4Item );

	$varExampleForm->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ExampleForm extends GeneratorClass {

	protected InputText $atributo1;

	protected InputText $atributo2;

	protected InputText $atributo3;

	protected InputText $atributo4;

public function __construct()

{

		parent :: __construct();

	$this->atributo1 =  new InputText();

	$this->atributo2 =  new InputText();

	$this->atributo3 =  new InputText();

	$this->atributo4 =  new InputText();

}

	public function setAtributo1( InputText $atributo1)
{

		 $this->atributo1 = $atributo1;
return $this; 
}

	public function setAtributo2( InputText $atributo2)
{

		 $this->atributo2 = $atributo2;
return $this; 
}

	public function setAtributo3( InputText $atributo3)
{

		 $this->atributo3 = $atributo3;
return $this; 
}

	public function setAtributo4( InputText $atributo4)
{

		 $this->atributo4 = $atributo4;
return $this; 
}

	public function getAtributo1()
{

		return $this->atributo1;
}

	public function getAtributo2()
{

		return $this->atributo2;
}

	public function getAtributo3()
{

		return $this->atributo3;
}

	public function getAtributo4()
{

		return $this->atributo4;
}

	public function addAtributo1Item( InputText $item )
{

		$this->atributo1->append( clone $item);
return $this; 
}

	public function addAtributo2Item( InputText $item )
{

		$this->atributo2->append( clone $item);
return $this; 
}

	public function addAtributo3Item( InputText $item )
{

		$this->atributo3->append( clone $item);
return $this; 
}

	public function addAtributo4Item( InputText $item )
{

		$this->atributo4->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "<form>\n";
print "                \n";		
$this->writeArrayObject( $this->atributo1 );

print "}\n";
print "                \n";		
$this->writeArrayObject( $this->atributo2 );

print "}\n";
print "                \n";		
$this->writeArrayObject( $this->atributo3 );

print "}\n";
print "                \n";		
$this->writeArrayObject( $this->atributo4 );

print "}\n";
print "            </form>\n";
}

 } 


?>

