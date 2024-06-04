<?php

namespace system\uranus\java\java\defs;
use system\jupiter\core\GeneratorClass;

/* ####################### Import : USAGE EXAMPLE ####################### 

	$varImport = new Import();

	$varImport->setPackageName("Import_packageName_EXAMPLE");

	$varImport->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Import extends GeneratorClass {

	public $packageName;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

}

	public function setPackageName(  $packageName)
{

		 $this->packageName = $packageName;
return $this; 
}

	public function getPackageName()
{

		return $this->packageName;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "import {$this->packageName};";
 return $output; }

 } 


?>

