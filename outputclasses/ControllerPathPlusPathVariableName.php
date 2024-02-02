
<?php

require_once( "GeneratorClass.php" );

/* ####################### ControllerPathPlusPathVariableName : USAGE EXAMPLE ####################### 

	$varControllerPathPlusPathVariableName = new ControllerPathPlusPathVariableName();

	$varControllerPathPlusPathVariableName->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class ControllerPathPlusPathVariableName extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write( $options ) {

	$this->validateData();

print "\n";
}

 } 


?>

