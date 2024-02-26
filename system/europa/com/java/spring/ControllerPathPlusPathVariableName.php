
<?php

use system\jupiter\core\GeneratorClass;

/* ####################### ControllerPathPlusPathVariableName : USAGE EXAMPLE ####################### 

	$varControllerPathPlusPathVariableName = new ControllerPathPlusPathVariableName();

	$varControllerPathPlusPathVariableName->setControllerPath("ControllerPathPlusPathVariableName_controllerPath_EXAMPLE");

	$varControllerPathPlusPathVariableName->setPathVariableName("ControllerPathPlusPathVariableName_pathVariableName_EXAMPLE");

	$varControllerPathPlusPathVariableName->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ControllerPathPlusPathVariableName extends GeneratorClass {

	protected $controllerPath;

	protected $pathVariableName;

public function __construct()

{

		parent :: __construct();

	$this->controllerPath =  null;

	$this->pathVariableName =  null;

}

	public function setControllerPath(  $controllerPath)
{

		 $this->controllerPath = $controllerPath;
return $this; 
}

	public function setPathVariableName(  $pathVariableName)
{

		 $this->pathVariableName = $pathVariableName;
return $this; 
}

	public function getControllerPath()
{

		return $this->controllerPath;
}

	public function getPathVariableName()
{

		return $this->pathVariableName;
}

	public function write() {

	$this->validateData();

print "{$this->controllerPath}\n";
print "/{{$this->pathVariableName}}\n";
}

 } 


?>

