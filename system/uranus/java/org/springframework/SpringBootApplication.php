<?php

namespace system\uranus\java\org\springframework;
use system\jupiter\core\GeneratorClass;
use system\uranus\org\springframework\Import;
use system\uranus\org\springframework\Annotation;
use system\uranus\org\springframework\JavaMethod;

/* ####################### SpringBootApplication : USAGE EXAMPLE ####################### 

	$varSpringBootApplication = new SpringBootApplication();

	$varSpringBootApplication->setPackageName("SpringBootApplication_packageName_EXAMPLE");

	$varimports = new Import();
	$varSpringBootApplication->addImportsItem( $varImportsItem );

	$varannotations = new Annotation();
	$varSpringBootApplication->addAnnotationsItem( $varAnnotationsItem );

	$varSpringBootApplication->setClassName("SpringBootApplication_className_EXAMPLE");

	$varotherMethods = new JavaMethod();
	$varSpringBootApplication->addOtherMethodsItem( $varOtherMethodsItem );

	$varSpringBootApplication->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootApplication extends GeneratorClass {

	public $packageName;

	public $imports;

	public $annotations;

	public $className;

	public $otherMethods;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

	$this->imports =  new Import();

	$this->annotations =  new Annotation();

	$this->className =  null;

	$this->otherMethods =  new JavaMethod();

}

	public function setPackageName(  $packageName)
{

		 $this->packageName = $packageName;
return $this; 
}

	public function setImports( Import $imports)
{

		 $this->imports = $imports;
return $this; 
}

	public function setAnnotations( Annotation $annotations)
{

		 $this->annotations = $annotations;
return $this; 
}

	public function setClassName(  $className)
{

		 $this->className = $className;
return $this; 
}

	public function setOtherMethods( JavaMethod $otherMethods)
{

		 $this->otherMethods = $otherMethods;
return $this; 
}

	public function getPackageName()
{

		return $this->packageName;
}

	public function getImports()
{

		return $this->imports;
}

	public function getAnnotations()
{

		return $this->annotations;
}

	public function getClassName()
{

		return $this->className;
}

	public function getOtherMethods()
{

		return $this->otherMethods;
}

	public function addImportsItem( Import $item )
{

		$this->imports->append( clone $item);
return $this; 
}

	public function addAnnotationsItem( Annotation $item )
{

		$this->annotations->append( clone $item);
return $this; 
}

	public function addOtherMethodsItem( JavaMethod $item )
{

		$this->otherMethods->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "package {$this->packageName};";
$output .= "";
$output .= "";		
$output .= $this->writeArrayObject( $this->imports, Import::class );

$output .= "";
$output .= "";
$output .= "";		
$output .= $this->writeArrayObject( $this->annotations, Annotation::class );

$output .= "";
$output .= "public class {$this->className} {";
$output .= "";
$output .= "  public static void main(String[] args) {";
$output .= "    {$this->className}.run({$this->className}.class, args);";
$output .= "  }";
$output .= "";
$output .= "  ";		
$output .= $this->writeArrayObject( $this->otherMethods, JavaMethod::class );

$output .= "";
$output .= "}";
 return $output; }

 } 


?>

