<?php

namespace system\uranus\cpp\examples;
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

$output .= "#include <iostream>";
$output .= "";
$output .= "using namespace std;";
$output .= "";
$output .= "int main()";
$output .= "{";
$output .= "    cout << "{$this->expression}" << endl;";
$output .= "}";
 return $output; }

 } 


?>

