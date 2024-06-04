<?php

namespace system\uranus\java\java\defs;
use system\jupiter\core\GeneratorClass;
use system\uranus\java\defs\AnnotationParameter;

/* ####################### JavaAnnotation : USAGE EXAMPLE ####################### 

	$varJavaAnnotation = new JavaAnnotation();

	$varJavaAnnotation->setAnnotationName("JavaAnnotation_annotationName_EXAMPLE");

	$varannotationParameters = new AnnotationParameter();
	$varJavaAnnotation->addAnnotationParametersItem( $varAnnotationParametersItem );

	$varJavaAnnotation->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class JavaAnnotation extends GeneratorClass {

	public $annotationName;

	public $annotationParameters;

public function __construct()

{

		parent :: __construct();

	$this->annotationName =  null;

	$this->annotationParameters =  new AnnotationParameter();

}

	public function setAnnotationName(  $annotationName)
{

		 $this->annotationName = $annotationName;
return $this; 
}

	public function setAnnotationParameters( AnnotationParameter $annotationParameters)
{

		 $this->annotationParameters = $annotationParameters;
return $this; 
}

	public function getAnnotationName()
{

		return $this->annotationName;
}

	public function getAnnotationParameters()
{

		return $this->annotationParameters;
}

	public function addAnnotationParametersItem( AnnotationParameter $item )
{

		$this->annotationParameters->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "@{$this->annotationName}";
if (($this->verifyOptionalExpression($this->annotationParameters))) {


$output .= "(";		
$output .= $this->writeArrayObject( $this->annotationParameters, AnnotationParameter::class );

$output .= ")";

}

$output .= "";
 return $output; }

 } 


?>

