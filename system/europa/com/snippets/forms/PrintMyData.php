<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### PrintMyData : USAGE EXAMPLE ####################### 

	$varPrintMyData = new PrintMyData();

	$varPrintMyData->setName("PrintMyData_name_EXAMPLE");

	$varPrintMyData->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PrintMyData extends GeneratorClass {

	protected $name;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function write() {

	$this->validateData();

print "<li>Data del elemento  <strong>{$this->name}</strong> en la lista.</li>\n";
}

 } 


?>

