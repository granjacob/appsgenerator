
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringControllerMethod : USAGE EXAMPLE ####################### 

	$varSpringControllerMethod = new SpringControllerMethod();

	$varSpringControllerMethod->setMappingAnnotation("XXXXXXX");

	$varSpringControllerMethod->setControllerPath("XXXXXXX");

	$varSpringControllerMethod->setAccessModifier("XXXXXXX");

	$varSpringControllerMethod->setReturnType("XXXXXXX");

	$varSpringControllerMethod->setControllerMethodName("XXXXXXX");

	$varSpringControllerMethod->setMethodBody("XXXXXXX");

	$varSpringControllerMethod->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringControllerMethod extends GeneratorClass {

	protected $mappingAnnotation;

	protected $controllerPath;

	protected $accessModifier;

	protected $returnType;

	protected $controllerMethodName;

	protected $MethodBody;

public function __construct()

{

		parent :: __construct();

	$this->mappingAnnotation =  null;

	$this->controllerPath =  null;

	$this->accessModifier =  null;

	$this->returnType =  null;

	$this->controllerMethodName =  null;

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

	public function getMethodBody()
{

		return $this->MethodBody;
}

	public function addMappingAnnotationItem(  $item )
{

		$this->mappingAnnotation->append($item);
return $this; 
}

	public function addControllerPathItem(  $item )
{

		$this->controllerPath->append($item);
return $this; 
}

	public function addAccessModifierItem(  $item )
{

		$this->accessModifier->append($item);
return $this; 
}

	public function addReturnTypeItem(  $item )
{

		$this->returnType->append($item);
return $this; 
}

	public function addControllerMethodNameItem(  $item )
{

		$this->controllerMethodName->append($item);
return $this; 
}

	public function addMethodBodyItem(  $item )
{

		$this->MethodBody->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "@{$this->mappingAnnotation}(\"{$this->controllerPath}\")\n";
print "    {$this->accessModifier} {$this->returnType} {$this->controllerMethodName}( \n";
print "            \n";
if ((is_array( $this->parameters ) && count( $this->parameters ) > 0)) {


print "\n";		
if (is_array( $this->parameters)) {		
foreach ($this->parameters as $item_parameters) {
			$item_parameters->write();
		}}

print "\n";

}

print " ) {\n";
print "        {$this->MethodBody}\n";
print "    }\n";
}

 } 


?>

