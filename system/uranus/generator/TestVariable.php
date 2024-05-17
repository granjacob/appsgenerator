<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### TestVariable : USAGE EXAMPLE ####################### 

	$varTestVariable = new TestVariable();

	$varTestVariable->setAccessModifier("TestVariable_accessModifier_EXAMPLE");

	$varTestVariable->setJungle("TestVariable_jungle_EXAMPLE");

	$varTestVariable->setVar1("TestVariable_var1_EXAMPLE");

	$varTestVariable->setVar2("TestVariable_var2_EXAMPLE");

	$varTestVariable->setVar3("TestVariable_var3_EXAMPLE");

	$varTestVariable->setVar4("TestVariable_var4_EXAMPLE");

	$varTestVariable->setVar5("TestVariable_var5_EXAMPLE");

	$varTestVariable->setVar6("TestVariable_var6_EXAMPLE");

	$varTestVariable->setVar7("TestVariable_var7_EXAMPLE");

	$varTestVariable->setVar8("TestVariable_var8_EXAMPLE");

	$varTestVariable->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TestVariable extends GeneratorClass {

	public $accessModifier;

	public $jungle;

	public $var1;

	public $var2;

	public $var3;

	public $var4;

	public $var5;

	public $var6;

	public $var7;

	public $var8;

public function __construct()

{

		parent :: __construct();

	$this->accessModifier =  null;

	$this->jungle =  null;

	$this->var1 =  null;

	$this->var2 =  null;

	$this->var3 =  null;

	$this->var4 =  null;

	$this->var5 =  null;

	$this->var6 =  null;

	$this->var7 =  null;

	$this->var8 =  null;

}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setJungle(  $jungle)
{

		 $this->jungle = $jungle;
return $this; 
}

	public function setVar1(  $var1)
{

		 $this->var1 = $var1;
return $this; 
}

	public function setVar2(  $var2)
{

		 $this->var2 = $var2;
return $this; 
}

	public function setVar3(  $var3)
{

		 $this->var3 = $var3;
return $this; 
}

	public function setVar4(  $var4)
{

		 $this->var4 = $var4;
return $this; 
}

	public function setVar5(  $var5)
{

		 $this->var5 = $var5;
return $this; 
}

	public function setVar6(  $var6)
{

		 $this->var6 = $var6;
return $this; 
}

	public function setVar7(  $var7)
{

		 $this->var7 = $var7;
return $this; 
}

	public function setVar8(  $var8)
{

		 $this->var8 = $var8;
return $this; 
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getJungle()
{

		return $this->jungle;
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

	public function getVar4()
{

		return $this->var4;
}

	public function getVar5()
{

		return $this->var5;
}

	public function getVar6()
{

		return $this->var6;
}

	public function getVar7()
{

		return $this->var7;
}

	public function getVar8()
{

		return $this->var8;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "before{$this->accessModifier}";
$output .= "";
$output .= "            and before after";
$output .= "";
$output .= "            ";
if (($this->verifyOptionalExpression($this->jungle))) {


$output .= "welcome to the {$this->jungle}";
$output .= "";
$output .= "                ";
if (($this->verifyOptionalExpression($this->var1))) {


$output .= "prueba {$this->var1}";
$output .= "";
$output .= "                    ";
if (($this->verifyOptionalExpression($this->var2))) {


$output .= "prueba {$this->var2}";

}

$output .= "";

}

$output .= "";
$output .= "";
$output .= "                ";
if (($this->verifyOptionalExpression($this->var3)) &&
($this->verifyOptionalExpression($this->var4))) {


$output .= "prueba {$this->var3} {$this->var4}";
$output .= "";
$output .= "                    ";
if (($this->verifyOptionalExpression($this->var5)) &&
($this->verifyOptionalExpression($this->var6))) {


$output .= "prueba {$this->var5} {$this->var6}";
$output .= "";
$output .= "                        ";
if (($this->verifyOptionalExpression($this->var7))) {


$output .= "prueba {$this->var7}";

}

$output .= "";

}

$output .= "";
$output .= "";
$output .= "                    ";
if (($this->verifyOptionalExpression($this->var8))) {


$output .= "prueba {$this->var8}";

}

$output .= "";

}

$output .= "";

}

$output .= "";
$output .= "";
$output .= "            after";
 return $output; }

 } 


?>

