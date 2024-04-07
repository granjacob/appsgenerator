<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\com\TestSnippet;

/* ####################### SecondTest : USAGE EXAMPLE ####################### 

	$varSecondTest = new SecondTest();

	$varvar = new TestSnippet();
	$varSecondTest->addVarItem( $varVarItem );

	$varSecondTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SecondTest extends GeneratorClass {

	protected TestSnippet $var;

public function __construct()

{

		parent :: __construct();

	$this->var =  new TestSnippet();

}

	public function setVar( TestSnippet $var)
{

		 $this->var = $var;
return $this; 
}

	public function getVar()
{

		return $this->var;
}

	public function addVarItem( TestSnippet $item )
{

		$this->var->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Grow up this! \n";		
$this->writeArrayObject( $this->var );

print "}\n";
}

 } 


?>

