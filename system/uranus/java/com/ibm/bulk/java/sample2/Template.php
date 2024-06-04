<?php

namespace system\uranus\java\com\ibm\bulk\java\sample2;
use system\jupiter\core\GeneratorClass;
use system\uranus\com\ibm\bulk\java\sample2\TemplateX;

/* ####################### Template : USAGE EXAMPLE ####################### 

	$varTemplate = new Template();

	$vartop = new TemplateX();
	$varTemplate->addTopItem( $varTopItem );

	$varTemplate->setWelcome("Template_welcome_EXAMPLE");

	$varTemplate->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Template extends GeneratorClass {

	public $top;

	public $welcome;

public function __construct()

{

		parent :: __construct();

	$this->top =  new TemplateX();

	$this->welcome =  null;

}

	public function setTop( TemplateX $top)
{

		 $this->top = $top;
return $this; 
}

	public function setWelcome(  $welcome)
{

		 $this->welcome = $welcome;
return $this; 
}

	public function getTop()
{

		return $this->top;
}

	public function getWelcome()
{

		return $this->welcome;
}

	public function addTopItem( TemplateX $item )
{

		$this->top->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();
		
$output .= $this->writeArrayObject( $this->top, TemplateX::class );

$output .= "";
$output .= "";
$output .= "Welcome to the";
$output .= "Junle!!";
$output .= "Add some items";
$output .= "to the template {$this->welcome}";
$output .= "";
$output .= "";
$output .= "weqweqweqweqw";
$output .= "eqweqwe";
$output .= "qweqw";
$output .= "eqwe";
$output .= "";
$output .= "wweqweqweqw";
$output .= "";
$output .= "";
$output .= "Welcome to the";
$output .= "Junle!!";
$output .= "Add some items";
$output .= "to the template {$this->welcome}";
$output .= "";
$output .= "";
$output .= "weqweqweqweqw";
$output .= "eqweqwe";
$output .= "qweqw";
$output .= "eqwe";
$output .= "";
$output .= "wweqweqweqw";
$output .= "";
$output .= "";
$output .= "";
$output .= "Welcome to the";
$output .= "Junle!!";
$output .= "Add some items";
$output .= "to the template {$this->welcome}";
$output .= "";
$output .= "";
$output .= "weqweqweqweqw";
$output .= "eqweqwe";
$output .= "qweqw";
$output .= "eqwe";
$output .= "";
$output .= "wweqweqweqw";
 return $output; }

 } 


?>

