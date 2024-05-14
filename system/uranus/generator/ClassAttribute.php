<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### ClassAttribute : USAGE EXAMPLE ####################### 

	$varClassAttribute = new ClassAttribute();

	$varClassAttribute->setAccessModifier("ClassAttribute_accessModifier_EXAMPLE");

	$varClassAttribute->setName("ClassAttribute_name_EXAMPLE");

	$varClassAttribute->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ClassAttribute extends GeneratorClass {

	public $accessModifier;

	public $name;

public function __construct()

{

		parent :: __construct();

	$this->accessModifier =  null;

	$this->name =  null;

}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getName()
{

		return $this->name;
}

	public function write() {

	$this->validateData();

print "{$this->accessModifier}\n";
print " \${$this->name};\n";
}

 } 


?>

