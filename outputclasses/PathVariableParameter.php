
<?php

require_once( "GeneratorClass.php" );

/* ####################### PathVariableParameter : USAGE EXAMPLE ####################### 

	$varPathVariableParameter = new PathVariableParameter();

	$varPathVariableParameter->setPathVariableName("PathVariableParameter_pathVariableName_EXAMPLE");

	$varPathVariableParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class PathVariableParameter extends GeneratorClass {

	protected $pathVariableName;

public function __construct()

{

		parent :: __construct();

	$this->pathVariableName =  null;

}

	public function setPathVariableName(  $pathVariableName)
{

		 $this->pathVariableName = $pathVariableName;
return $this; 
}

	public function getPathVariableName()
{

		return $this->pathVariableName;
}

	public function write() {

	$this->validateData();

print "@PathVariable(\"{$this->pathVariableName}\") String {$this->pathVariableName},\n";
}

 } 


?>

