<?php

namespace system\uranus\java\java\defs;
use system\jupiter\core\GeneratorClass;
use system\uranus\java\defs\JavaAnnotation;
use system\uranus\java\defs\MethodParameter;
use system\uranus\java\defs\ClassList;

/* ####################### JavaMethod : USAGE EXAMPLE ####################### 

	$varJavaMethod = new JavaMethod();

	$varannotations = new JavaAnnotation();
	$varJavaMethod->addAnnotationsItem( $varAnnotationsItem );

	$varJavaMethod->setAccessModifier("JavaMethod_accessModifier_EXAMPLE");

	$varJavaMethod->setStatic("JavaMethod_static_EXAMPLE");

	$varJavaMethod->setReturnType("JavaMethod_returnType_EXAMPLE");

	$varJavaMethod->setMethodName("JavaMethod_methodName_EXAMPLE");

	$varparameters = new MethodParameter();
	$varJavaMethod->addParametersItem( $varParametersItem );

	$varexceptionsList = new ClassList();
	$varJavaMethod->addExceptionsListItem( $varExceptionsListItem );

	$varJavaMethod->setMethodBody("JavaMethod_methodBody_EXAMPLE");

	$varJavaMethod->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class JavaMethod extends GeneratorClass {

	public $annotations;

	public $accessModifier;

	public $static;

	public $returnType;

	public $methodName;

	public $parameters;

	public $exceptionsList;

	public $methodBody;

public function __construct()

{

		parent :: __construct();

	$this->annotations =  new JavaAnnotation();

	$this->accessModifier =  null;

	$this->static =  null;

	$this->returnType =  null;

	$this->methodName =  null;

	$this->parameters =  new MethodParameter();

	$this->exceptionsList =  new ClassList();

	$this->methodBody =  null;

}

	public function setAnnotations( JavaAnnotation $annotations)
{

		 $this->annotations = $annotations;
return $this; 
}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setStatic(  $static)
{

		 $this->static = $static;
return $this; 
}

	public function setReturnType(  $returnType)
{

		 $this->returnType = $returnType;
return $this; 
}

	public function setMethodName(  $methodName)
{

		 $this->methodName = $methodName;
return $this; 
}

	public function setParameters( MethodParameter $parameters)
{

		 $this->parameters = $parameters;
return $this; 
}

	public function setExceptionsList( ClassList $exceptionsList)
{

		 $this->exceptionsList = $exceptionsList;
return $this; 
}

	public function setMethodBody(  $methodBody)
{

		 $this->methodBody = $methodBody;
return $this; 
}

	public function getAnnotations()
{

		return $this->annotations;
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getStatic()
{

		return $this->static;
}

	public function getReturnType()
{

		return $this->returnType;
}

	public function getMethodName()
{

		return $this->methodName;
}

	public function getParameters()
{

		return $this->parameters;
}

	public function getExceptionsList()
{

		return $this->exceptionsList;
}

	public function getMethodBody()
{

		return $this->methodBody;
}

	public function addAnnotationsItem( JavaAnnotation $item )
{

		$this->annotations->append( clone $item);
return $this; 
}

	public function addParametersItem( MethodParameter $item )
{

		$this->parameters->append( clone $item);
return $this; 
}

	public function addExceptionsListItem( ClassList $item )
{

		$this->exceptionsList->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();
		
$output .= $this->writeArrayObject( $this->annotations, JavaAnnotation::class );

$output .= "";
$output .= "{$this->accessModifier} ";
if (($this->verifyOptionalExpression($this->static))) {


$output .= "{$this->static}";
$output .= "";

}

$output .= " {$this->returnType} {$this->methodName}( ";
if (($this->verifyOptionalExpression($this->parameters))) {

		
$output .= $this->writeArrayObject( $this->parameters, MethodParameter::class );

$output .= "";

}

$output .= ")";
$output .= "    ";
if (($this->verifyOptionalExpression($this->exceptionsList))) {


$output .= "throws ";		
$output .= $this->writeArrayObject( $this->exceptionsList, ClassList::class );

$output .= "";

}

$output .= "";
$output .= "{";
$output .= "    {$this->methodBody}";
$output .= "}";
 return $output; }

 } 


?>

