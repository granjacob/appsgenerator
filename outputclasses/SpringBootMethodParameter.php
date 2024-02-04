
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringBootMethodParameter : USAGE EXAMPLE ####################### 

	$varSpringBootMethodParameter = new SpringBootMethodParameter();

	$varSpringBootMethodParameter->setParameterAnnotation("SpringBootMethodParameter_parameterAnnotation_EXAMPLE");

	$varSpringBootMethodParameter->setParameterType("SpringBootMethodParameter_ParameterType_EXAMPLE");

	$varSpringBootMethodParameter->setParameterName("SpringBootMethodParameter_ParameterName_EXAMPLE");

	$varSpringBootMethodParameter->write( $options );

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

	public function write( $options=array() ) {

	$this->validateData();

print "@{$this->parameterAnnotation} {$this->ParameterType} {$this->ParameterName}\n";if ((isset( $options["condition:notlast"] ) && 
$options["condition:notlast"] === true) || !isset( $options["condition:notlast"])) { 

print ",\n";
 }
print "\n";
}

 } 


?>

