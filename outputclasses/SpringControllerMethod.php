
<?php

require_once( "GeneratorClass.php" );
require_once( "SpringBootMethodParameter.php" );

/* ####################### SpringControllerMethod : USAGE EXAMPLE ####################### 

	$varSpringControllerMethod = new SpringControllerMethod();

	$varSpringControllerMethod->setMappingAnnotation("SpringControllerMethod_mappingAnnotation_EXAMPLE");

	$varSpringControllerMethod->setControllerPath("SpringControllerMethod_controllerPath_EXAMPLE");

	$varSpringControllerMethod->setPathVariableName("SpringControllerMethod_pathVariableName_EXAMPLE");

	$varSpringControllerMethod->setAccessModifier("SpringControllerMethod_accessModifier_EXAMPLE");

	$varSpringControllerMethod->setReturnType("SpringControllerMethod_returnType_EXAMPLE");

	$varSpringControllerMethod->setControllerMethodName("SpringControllerMethod_controllerMethodName_EXAMPLE");

	$varparameters = new SpringBootMethodParameter();
	$varSpringControllerMethod->addParametersItem( $varParametersItem );

	$varSpringControllerMethod->setMethodBody("SpringControllerMethod_MethodBody_EXAMPLE");

	$varSpringControllerMethod->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethod extends GeneratorClass {

	protected $mappingAnnotation;

	protected $controllerPath;

	protected $pathVariableName;

	protected $accessModifier;

	protected $returnType;

	protected $controllerMethodName;

	protected SpringBootMethodParameter $parameters;

	protected $MethodBody;

public function __construct()

{

		parent :: __construct();

	$this->mappingAnnotation =  null;

	$this->controllerPath =  null;

	$this->pathVariableName =  null;

	$this->accessModifier =  null;

	$this->returnType =  null;

	$this->controllerMethodName =  null;

	$this->parameters =  new SpringBootMethodParameter();

	$this->MethodBody =  null;

}

	public function setMappingAnnotation(  $mappingAnnotation)
{

		 $this->mappingAnnotation = $mappingAnnotation;
return $this; 
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

	public function setControllerMethodName(  $controllerMethodName)
{

		 $this->controllerMethodName = $controllerMethodName;
return $this; 
}

	public function setParameters( SpringBootMethodParameter $parameters)
{

		 $this->parameters = $parameters;
return $this; 
}

	public function setMethodBody(  $MethodBody)
{

		 $this->MethodBody = $MethodBody;
return $this; 
}

	public function getMappingAnnotation()
{

		return $this->mappingAnnotation;
}

	public function getControllerPath()
{

		return $this->controllerPath;
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

	public function getControllerMethodName()
{

		return $this->controllerMethodName;
}

	public function getParameters()
{

		return $this->parameters;
}

	public function getMethodBody()
{

		return $this->MethodBody;
}

	public function addParametersItem( SpringBootMethodParameter $item )
{

		$this->parameters->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "@{$this->mappingAnnotation}(\"{$this->controllerPath}/{$this->pathVariableName}\")\n";
print "    {$this->accessModifier} {$this->returnType} {$this->controllerMethodName}( \n";
print "            \n";
if (($this->parameters !== null &&
 $this->parameters->count() > 0)) {


print "\n";		
$this->writeArrayObject( $this->parameters );

print "\n";

}

print " ) {\n";
print "        {$this->MethodBody}\n";
print "    }\n";
}

 } 


?>

