<?php

namespace system\uranus\php\generator;
use system\jupiter\core\GeneratorClass;
use system\uranus\generator\AssocArrayValue;

/* ####################### TableReference : USAGE EXAMPLE ####################### 

	$varTableReference = new TableReference();

	$varTableReference->setName("TableReference_name_EXAMPLE");

	$varvalues = new AssocArrayValue();
	$varTableReference->addValuesItem( $varValuesItem );

	$varTableReference->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TableReference extends GeneratorClass {

	public $name;

	public $values;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

	$this->values =  new AssocArrayValue();

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function setValues( AssocArrayValue $values)
{

		 $this->values = $values;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function getValues()
{

		return $this->values;
}

	public function addValuesItem( AssocArrayValue $item )
{

		$this->values->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "\$this->{$this->name} = array(";
$output .= "                ";		
$output .= $this->writeArrayObject( $this->values, AssocArrayValue::class );

$output .= "";
$output .= "            );";
 return $output; }

 } 


?>

