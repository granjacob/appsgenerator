<?php

namespace system\uranus\html\examples\html;
use system\jupiter\core\GeneratorClass;

/* ####################### JavascriptImport : USAGE EXAMPLE ####################### 

	$varJavascriptImport = new JavascriptImport();

	$varJavascriptImport->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class JavascriptImport extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<script></script>";
 return $output; }

 } 


?>

