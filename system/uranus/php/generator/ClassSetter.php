<?php

namespace system\uranus\php\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### ClassSetter : USAGE EXAMPLE ####################### 

	$varClassSetter = new ClassSetter();

	$varClassSetter->setName("ClassSetter_name_EXAMPLE");

	$varClassSetter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ClassSetter extends GeneratorClass {

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

		$output = ""; 

		$this->validateData();

$output .= "public function set{$this->name}( \${$this->name} )";
$output .= "            {";
$output .= "                \$this->{$this->name} = \${$this->name};";
$output .= "            }";
 return $output; }

 } 


?>

