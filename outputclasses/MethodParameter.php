
<?php

require_once( "GeneratorClass.php" );

/* ####################### method_parameter : USAGE EXAMPLE ####################### 

	$varmethod_parameter = new method_parameter();

	$varmethod_parameter->setName("method_parameter_name_EXAMPLE");

	$varmethod_parameter->write( $options );

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

	public function write( $options=array() ) {

	$this->validateData();

print "\${$this->name}{?/notlast,/?}\n";
}

 } 


?>

