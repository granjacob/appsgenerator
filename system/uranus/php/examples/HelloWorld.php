<?php

namespace system\uranus\php\examples;
use system\jupiter\core\GeneratorClass;

/* ####################### HelloWorld : USAGE EXAMPLE ####################### 

	$varHelloWorld = new HelloWorld();

	$varHelloWorld->setExpression("HelloWorld_expression_EXAMPLE");

	$varHelloWorld->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HelloWorld extends GeneratorClass {

	public $expression;

public function __construct()

{

		parent :: __construct();

	$this->expression =  null;

}

	public function setExpression(  $expression)
{

		 $this->expression = $expression;
return $this; 
}

	public function getExpression()
{

		return $this->expression;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<?php";
$output .= "";
$output .= "print '{$this->expression}';";
$output .= "";
$output .= "?>";
 return $output; }

 } 


?>

