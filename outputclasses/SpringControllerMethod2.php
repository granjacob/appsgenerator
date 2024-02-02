
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringControllerMethod2 : USAGE EXAMPLE ####################### 

	$varSpringControllerMethod2 = new SpringControllerMethod2();

	$varSpringControllerMethod2->setMappingAnnotation("SpringControllerMethod2_mappingAnnotation_EXAMPLE");

	$varSpringControllerMethod2->setPath("SpringControllerMethod2_path_EXAMPLE");

	$varSpringControllerMethod2->setPathVariableName("SpringControllerMethod2_pathVariableName_EXAMPLE");

	$varSpringControllerMethod2->setAccessModifier("SpringControllerMethod2_accessModifier_EXAMPLE");

	$varSpringControllerMethod2->setReturnType("SpringControllerMethod2_returnType_EXAMPLE");

	$varSpringControllerMethod2->setContollerMethodName("SpringControllerMethod2_contollerMethodName_EXAMPLE");

	$varSpringControllerMethod2->setVariableAnnotation("SpringControllerMethod2_variableAnnotation_EXAMPLE");

	$varSpringControllerMethod2->setParamName("SpringControllerMethod2_paramName_EXAMPLE");

	$varSpringControllerMethod2->setControllerMethodBody("SpringControllerMethod2_controllerMethodBody_EXAMPLE");

	$varSpringControllerMethod2->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethod2 extends GeneratorClass {

	protected $mappingAnnotation;

	protected $path;

	protected $pathVariableName;

	protected $accessModifier;

	protected $returnType;

	protected $contollerMethodName;

	protected $variableAnnotation;

	protected $paramName;

	protected $controllerMethodBody;

public function __construct()

{

		parent :: __construct();

	$this->mappingAnnotation =  null;

	$this->path =  null;

	$this->pathVariableName =  null;

	$this->accessModifier =  null;

	$this->returnType =  null;

	$this->contollerMethodName =  null;

	$this->variableAnnotation =  null;

	$this->paramName =  null;

	$this->controllerMethodBody =  null;

}

	public function setMappingAnnotation(  $mappingAnnotation)
{

		 $this->mappingAnnotation = $mappingAnnotation;
return $this; 
}

	public function setPath(  $path)
{

		 $this->path = $path;
return $this; 
}

	public function setPathVariableName(  $pathVariableName)
{

		 $this->pathVariableName = $pathVariableName;
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

	public function setParamName(  $paramName)
{

		 $this->paramName = $paramName;
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

	public function getPath()
{

		return $this->path;
}

	public function getPathVariableName()
{

		return $this->pathVariableName;
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

	public function getParamName()
{

		return $this->paramName;
}

	public function getControllerMethodBody()
{

		return $this->controllerMethodBody;
}

	public function write( $options ) {

	$this->validateData();

print "@{$this->mappingAnnotation}(\"{$this->path}/{{$this->pathVariableName}}\")\n";
print "    {$this->accessModifier} {$this->returnType} {$this->contollerMethodName}(@{$this->variableAnnotation}(\"{$this->pathVariableName}\") String {$this->paramName}) {\n";
print "        {$this->controllerMethodBody}\n";
print "    }\n";
}

 } 


?>

