
<?php

require_once( "GeneratorClass.php" );

/* ####################### method_parameter : USAGE EXAMPLE ####################### 

	$varmethod_parameter = new method_parameter();

	$varmethod_parameter->setName("method_parameter_name_EXAMPLE");

	$varmethod_parameter->setNotlast("method_parameter_notlast_EXAMPLE");

	$varmethod_parameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class method_parameter extends GeneratorClass {

	protected $name;

	protected $notlast;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

	$this->notlast =  null;

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function setNotlast(  $notlast)
{

		 $this->notlast = $notlast;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function getNotlast()
{

		return $this->notlast;
}

	public function write() {

	$this->validateData();

print "${$this->name}\n";
if () {


print "{$this->notlast}\n";
print ",\n";

}

print "\n";
}

 } 


?>

