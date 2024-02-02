
<?php

require_once( "GeneratorClass.php" );

/* ####################### PassMethodParameter : USAGE EXAMPLE ####################### 

	$varPassMethodParameter = new PassMethodParameter();

	$varPassMethodParameter->setVariableName("PassMethodParameter_variableName_EXAMPLE");

	$varPassMethodParameter->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class PassMethodParameter extends GeneratorClass {

	protected $variableName;

public function __construct()

{

		parent :: __construct();

	$this->variableName =  null;

}

	public function setVariableName(  $variableName)
{

		 $this->variableName = $variableName;
return $this; 
}

	public function getVariableName()
{

		return $this->variableName;
}

	public function write( $options ) {

	$this->validateData();

print "{$this->variableName}\n";
print ",\n";
}

 } 


?>
