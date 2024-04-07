<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;

/* ####################### ThirdTest : USAGE EXAMPLE ####################### 

	$varThirdTest = new ThirdTest();

	$varThirdTest->set(std.beast.Prueba)var("ThirdTest_(std.beast.Prueba)var_EXAMPLE");

	$varThirdTest->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ThirdTest extends GeneratorClass {

	protected $(std.beast.Prueba)var;

public function __construct()

{

		parent :: __construct();

	$this->(std.beast.Prueba)var =  null;

}

	public function set(std.beast.Prueba)var(  $(std.beast.Prueba)var)
{

		 $this->(std.beast.Prueba)var = $(std.beast.Prueba)var;
return $this; 
}

	public function get(std.beast.Prueba)var()
{

		return $this->(std.beast.Prueba)var;
}

	public function write() {

	$this->validateData();

print "Test this third! {$this->(std.beast.Prueba)var}}\n";
}

 } 


?>

