
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringControllerMethodN : USAGE EXAMPLE ####################### 

	$varSpringControllerMethodN = new SpringControllerMethodN();

	$varSpringControllerMethodN->setMappingAnnotation("SpringControllerMethodN_mappingAnnotation_EXAMPLE");

	$varSpringControllerMethodN->setAccessModifier("SpringControllerMethodN_accessModifier_EXAMPLE");

	$varSpringControllerMethodN->setReturnType("SpringControllerMethodN_returnType_EXAMPLE");

	$varSpringControllerMethodN->setContollerMethodName("SpringControllerMethodN_contollerMethodName_EXAMPLE");

	$varSpringControllerMethodN->setVariableAnnotation("SpringControllerMethodN_variableAnnotation_EXAMPLE");

	$varSpringControllerMethodN->setPathVariableService("SpringControllerMethodN_pathVariableService_EXAMPLE");

	$varSpringControllerMethodN->setPathVariableTo("SpringControllerMethodN_pathVariableTo_EXAMPLE");

	$varSpringControllerMethodN->setPathVariableJungle("SpringControllerMethodN_pathVariableJungle_EXAMPLE");

	$varSpringControllerMethodN->setControllerMethodBody("SpringControllerMethodN_controllerMethodBody_EXAMPLE");

	$varSpringControllerMethodN->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethodN extends GeneratorClass {

	protected $mappingAnnotation;

	protected $accessModifier;

	protected $returnType;

	protected $contollerMethodName;

	protected $variableAnnotation;

	protected $pathVariableService;

	protected $pathVariableTo;

	protected $pathVariableJungle;

	protected $controllerMethodBody;

public function __construct()

{

		parent :: __construct();

	$this->mappingAnnotation =  null;

	$this->accessModifier =  null;

	$this->returnType =  null;

	$this->contollerMethodName =  null;

	$this->variableAnnotation =  null;

	$this->pathVariableService =  null;

	$this->pathVariableTo =  null;

	$this->pathVariableJungle =  null;

	$this->controllerMethodBody =  null;

}

	public function setMappingAnnotation(  $mappingAnnotation)
{

		 $this->mappingAnnotation = $mappingAnnotation;
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

	public function setVariableAnnotation(  $variableAnnotation)
{

		 $this->variableAnnotation = $variableAnnotation;
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

	public function setControllerMethodBody(  $controllerMethodBody)
{

		 $this->controllerMethodBody = $controllerMethodBody;
return $this; 
}

	public function getMappingAnnotation()
{

		return $this->mappingAnnotation;
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

	public function getVariableAnnotation()
{

		return $this->variableAnnotation;
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

	public function getControllerMethodBody()
{

		return $this->controllerMethodBody;
}

	public function write() {

	$this->validateData();

print "@{$this->mappingAnnotation}(\"/ciss/common/{service}/welcome/{to}/the/{jungle}\")\n";
print "    {$this->accessModifier} {$this->returnType} {$this->contollerMethodName}(\n";
print "            @{$this->variableAnnotation}(\"service\") String {$this->pathVariableService},\n";
print "             @{$this->variableAnnotation}(\"to\") String {$this->pathVariableTo},\n";
print "              @{$this->variableAnnotation}(\"jungle\") String {$this->pathVariableJungle}\n";
print "            ) {\n";
print "        {$this->controllerMethodBody}\n";
print "    }\n";
}

 } 


?>

