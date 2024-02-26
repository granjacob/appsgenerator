
<?php

use system\jupiter\core\GeneratorClass;

/* ####################### SpringControllerMethodDynamic : USAGE EXAMPLE ####################### 

	$varSpringControllerMethodDynamic = new SpringControllerMethodDynamic();

	$varSpringControllerMethodDynamic->setMappingAnnotation("SpringControllerMethodDynamic_mappingAnnotation_EXAMPLE");

	$varSpringControllerMethodDynamic->setPathVariableService("SpringControllerMethodDynamic_pathVariableService_EXAMPLE");

	$varSpringControllerMethodDynamic->setPathVariableTo("SpringControllerMethodDynamic_pathVariableTo_EXAMPLE");

	$varSpringControllerMethodDynamic->setPathVariableJungle("SpringControllerMethodDynamic_pathVariableJungle_EXAMPLE");

	$varSpringControllerMethodDynamic->setAccessModifier("SpringControllerMethodDynamic_accessModifier_EXAMPLE");

	$varSpringControllerMethodDynamic->setReturnType("SpringControllerMethodDynamic_returnType_EXAMPLE");

	$varSpringControllerMethodDynamic->setContollerMethodName("SpringControllerMethodDynamic_contollerMethodName_EXAMPLE");

	$varSpringControllerMethodDynamic->setControllerMethodBody("SpringControllerMethodDynamic_controllerMethodBody_EXAMPLE");

	$varSpringControllerMethodDynamic->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethodDynamic extends GeneratorClass {

	protected $mappingAnnotation;

	protected $pathVariableService;

	protected $pathVariableTo;

	protected $pathVariableJungle;

	protected $accessModifier;

	protected $returnType;

	protected $contollerMethodName;

	protected $controllerMethodBody;

public function __construct()

{

		parent :: __construct();

	$this->mappingAnnotation =  null;

	$this->pathVariableService =  null;

	$this->pathVariableTo =  null;

	$this->pathVariableJungle =  null;

	$this->accessModifier =  null;

	$this->returnType =  null;

	$this->contollerMethodName =  null;

	$this->controllerMethodBody =  null;

}

	public function setMappingAnnotation(  $mappingAnnotation)
{

		 $this->mappingAnnotation = $mappingAnnotation;
return $this; 
}

	public function setPathVariableService(  $pathVariableService)
{

		 $this->pathVariableService = $pathVariableService;
return $this; 
}

	public function setPathVariableTo(  $pathVariableTo)
{

		 $this->pathVariableTo = $pathVariableTo;
return $this; 
}

	public function setPathVariableJungle(  $pathVariableJungle)
{

		 $this->pathVariableJungle = $pathVariableJungle;
return $this; 
}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setReturnType(  $returnType)
{

		 $this->returnType = $returnType;
return $this; 
}

	public function setContollerMethodName(  $contollerMethodName)
{

		 $this->contollerMethodName = $contollerMethodName;
return $this; 
}

	public function setControllerMethodBody(  $controllerMethodBody)
{

		 $this->controllerMethodBody = $controllerMethodBody;
return $this; 
}

	public function getMappingAnnotation()
{

		return $this->mappingAnnotation;
}

	public function getPathVariableService()
{

		return $this->pathVariableService;
}

	public function getPathVariableTo()
{

		return $this->pathVariableTo;
}

	public function getPathVariableJungle()
{

		return $this->pathVariableJungle;
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getReturnType()
{

		return $this->returnType;
}

	public function getContollerMethodName()
{

		return $this->contollerMethodName;
}

	public function getControllerMethodBody()
{

		return $this->controllerMethodBody;
}

	public function write() {

	$this->validateData();

print "@{$this->mappingAnnotation}(\"/ciss/common/{{$this->pathVariableService}}/welcome/{{$this->pathVariableTo}}/the/{{$this->pathVariableJungle}}\")\n";
print "    {$this->accessModifier} {$this->returnType} {$this->contollerMethodName}(\n";
print "            @PathVariable(\"{$this->pathVariableService}\") String {$this->pathVariableService},\n";
print "             @PathVariable(\"{$this->pathVariableTo}\") String {$this->pathVariableTo},\n";
print "              @PathVariable(\"{$this->pathVariableJungle}\") String {$this->pathVariableJungle}\n";
print "            ) {\n";
print "        {$this->controllerMethodBody}\n";
print "    }\n";
}

 } 


?>

