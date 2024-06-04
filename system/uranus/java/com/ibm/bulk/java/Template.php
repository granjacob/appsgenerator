<?php

namespace system\uranus\java\com\ibm\bulk\java;
use system\jupiter\core\GeneratorClass;

/* ####################### Template : USAGE EXAMPLE ####################### 

	$varTemplate = new Template();

	$varTemplate->setWelcome("Template_welcome_EXAMPLE");

	$varTemplate->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Template extends GeneratorClass {

	public $welcome;

public function __construct()

{

		parent :: __construct();

	$this->welcome =  null;

}

	public function setWelcome(  $welcome)
{

		 $this->welcome = $welcome;
return $this; 
}

	public function getWelcome()
{

		return $this->welcome;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "Welcome to the";
$output .= "Junle!!";
$output .= "Add some items";
$output .= "to the template {$this->welcome}";
 return $output; }

 } 


?>

