<?php

namespace system\europa\com\java\spring;
use system\jupiter\core\GeneratorClass;

/* ####################### method_parameter : USAGE EXAMPLE ####################### 

	$varmethod_parameter = new method_parameter();

	$varmethod_parameter->setName("method_parameter_name_EXAMPLE");

	$varmethod_parameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class method_parameter extends GeneratorClass {

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

print "\${$this->name}\n";if ($this->validateOptions("condition:notlast")) { 

print ",\n";
 }
print "\n";
}

 } 


?>
