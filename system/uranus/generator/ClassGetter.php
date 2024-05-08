<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;
use system\uranus\\;

/* ####################### ClassGetter : USAGE EXAMPLE ####################### 

	$varClassGetter = new ClassGetter();

	$varClassGetter->setName("ClassGetter_name_EXAMPLE");

	$varClassGetter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ClassGetter extends GeneratorClass {

	public $name;

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

print "public function get{$this->name}}()\n";
print "            {\n";
print "                return \$this->{$this->name}};\n";
print "            }\n";
}

 } 


?>

