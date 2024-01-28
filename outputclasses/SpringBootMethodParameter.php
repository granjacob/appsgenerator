
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringBootMethodParameter : USAGE EXAMPLE ####################### 

	$varSpringBootMethodParameter = new SpringBootMethodParameter();

	$varSpringBootMethodParameter->setParameterAnnotation("XXXXXXX");

	$varSpringBootMethodParameter->setParameterType("XXXXXXX");

	$varSpringBootMethodParameter->setParameterName("XXXXXXX");

	$varSpringBootMethodParameter->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootMethodParameter extends GeneratorClass {

	protected $parameterAnnotation;

	protected $ParameterType;

	protected $ParameterName;

public function __construct()

{

		parent :: __construct();

	$this->parameterAnnotation =  null;

	$this->ParameterType =  null;

	$this->ParameterName =  null;

}

	public function setParameterAnnotation(  $parameterAnnotation)
{

		 $this->parameterAnnotation = $parameterAnnotation;
return $this; 
}

	public function setParameterType(  $ParameterType)
{

		 $this->ParameterType = $ParameterType;
return $this; 
}

	public function setParameterName(  $ParameterName)
{

		 $this->ParameterName = $ParameterName;
return $this; 
}

	public function getParameterAnnotation()
{

		return $this->parameterAnnotation;
}

	public function getParameterType()
{

		return $this->ParameterType;
}

	public function getParameterName()
{

		return $this->ParameterName;
}

	public function addParameterAnnotationItem(  $item )
{

		$this->parameterAnnotation->append($item);
return $this; 
}

	public function addParameterTypeItem(  $item )
{

		$this->ParameterType->append($item);
return $this; 
}

	public function addParameterNameItem(  $item )
{

		$this->ParameterName->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "@{$this->parameterAnnotation} {$this->ParameterType} {$this->ParameterName};\n";
}

 } 


?>

