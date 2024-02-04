
<?php

require_once( "GeneratorClass.php" );
require_once( "SpringAutowiredService.php" );
require_once( "SpringControllerMethod.php" );
require_once( "SpringControllerMethod2.php" );

/* ####################### SpringBootController : USAGE EXAMPLE ####################### 

	$varSpringBootController = new SpringBootController();

	$varSpringBootController->setPackageName("SpringBootController_packageName_EXAMPLE");

	$varSpringBootController->setControllerClassName("SpringBootController_controllerClassName_EXAMPLE");

	$varServices = new SpringAutowiredService();
	$varSpringBootController->addServicesItem( $varServicesItem );

	$varMethods = new SpringControllerMethod();
	$varSpringBootController->addMethodsItem( $varMethodsItem );

	$varMethodsWithPathVariable = new SpringControllerMethod2();
	$varSpringBootController->addMethodsWithPathVariableItem( $varMethodsWithPathVariableItem );

	$varRepositories = new SpringControllerMethod();
	$varSpringBootController->addRepositoriesItem( $varRepositoriesItem );

	$varOtherThings = new SpringControllerMethod();
	$varSpringBootController->addOtherThingsItem( $varOtherThingsItem );

	$varMoreThings = new SpringControllerMethod();
	$varSpringBootController->addMoreThingsItem( $varMoreThingsItem );

	$varAndMoreThings = new SpringControllerMethod();
	$varSpringBootController->addAndMoreThingsItem( $varAndMoreThingsItem );

	$varWithMoreThings = new SpringControllerMethod();
	$varSpringBootController->addWithMoreThingsItem( $varWithMoreThingsItem );

	$varSpringBootController->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootController extends GeneratorClass {

	protected $packageName;

	protected $controllerClassName;

	protected SpringAutowiredService $Services;

	protected SpringControllerMethod $Methods;

	protected SpringControllerMethod2 $MethodsWithPathVariable;

	protected SpringControllerMethod $Repositories;

	protected SpringControllerMethod $OtherThings;

	protected SpringControllerMethod $MoreThings;

	protected SpringControllerMethod $AndMoreThings;

	protected SpringControllerMethod $WithMoreThings;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

	$this->controllerClassName =  null;

	$this->Services =  new SpringAutowiredService();

	$this->Methods =  new SpringControllerMethod();

	$this->MethodsWithPathVariable =  new SpringControllerMethod2();

	$this->Repositories =  new SpringControllerMethod();

	$this->OtherThings =  new SpringControllerMethod();

	$this->MoreThings =  new SpringControllerMethod();

	$this->AndMoreThings =  new SpringControllerMethod();

	$this->WithMoreThings =  new SpringControllerMethod();

}

	public function setPackageName(  $packageName)
{

		 $this->packageName = $packageName;
return $this; 
}

	public function setControllerClassName(  $controllerClassName)
{

		 $this->controllerClassName = $controllerClassName;
return $this; 
}

	public function setServices( SpringAutowiredService $Services)
{

		 $this->Services = $Services;
return $this; 
}

	public function setMethods( SpringControllerMethod $Methods)
{

		 $this->Methods = $Methods;
return $this; 
}

	public function setMethodsWithPathVariable( SpringControllerMethod2 $MethodsWithPathVariable)
{

		 $this->MethodsWithPathVariable = $MethodsWithPathVariable;
return $this; 
}

	public function setRepositories( SpringControllerMethod $Repositories)
{

		 $this->Repositories = $Repositories;
return $this; 
}

	public function setOtherThings( SpringControllerMethod $OtherThings)
{

		 $this->OtherThings = $OtherThings;
return $this; 
}

	public function setMoreThings( SpringControllerMethod $MoreThings)
{

		 $this->MoreThings = $MoreThings;
return $this; 
}

	public function setAndMoreThings( SpringControllerMethod $AndMoreThings)
{

		 $this->AndMoreThings = $AndMoreThings;
return $this; 
}

	public function setWithMoreThings( SpringControllerMethod $WithMoreThings)
{

		 $this->WithMoreThings = $WithMoreThings;
return $this; 
}

	public function getPackageName()
{

		return $this->packageName;
}

	public function getControllerClassName()
{

		return $this->controllerClassName;
}

	public function getServices()
{

		return $this->Services;
}

	public function getMethods()
{

		return $this->Methods;
}

	public function getMethodsWithPathVariable()
{

		return $this->MethodsWithPathVariable;
}

	public function getRepositories()
{

		return $this->Repositories;
}

	public function getOtherThings()
{

		return $this->OtherThings;
}

	public function getMoreThings()
{

		return $this->MoreThings;
}

	public function getAndMoreThings()
{

		return $this->AndMoreThings;
}

	public function getWithMoreThings()
{

		return $this->WithMoreThings;
}

	public function addServicesItem( SpringAutowiredService $item )
{

		$this->Services->append( clone $item);
return $this; 
}

	public function addMethodsItem( SpringControllerMethod $item )
{

		$this->Methods->append( clone $item);
return $this; 
}

	public function addMethodsWithPathVariableItem( SpringControllerMethod2 $item )
{

		$this->MethodsWithPathVariable->append( clone $item);
return $this; 
}

	public function addRepositoriesItem( SpringControllerMethod $item )
{

		$this->Repositories->append( clone $item);
return $this; 
}

	public function addOtherThingsItem( SpringControllerMethod $item )
{

		$this->OtherThings->append( clone $item);
return $this; 
}

	public function addMoreThingsItem( SpringControllerMethod $item )
{

		$this->MoreThings->append( clone $item);
return $this; 
}

	public function addAndMoreThingsItem( SpringControllerMethod $item )
{

		$this->AndMoreThings->append( clone $item);
return $this; 
}

	public function addWithMoreThingsItem( SpringControllerMethod $item )
{

		$this->WithMoreThings->append( clone $item);
return $this; 
}

	public function write( $options=array() ) {

	$this->validateData();

print "package {$this->packageName};\n";
print "\n";
print "import java.util.List;\n";
print "\n";
print "import org.springframework.web.bind.annotation.DeleteMapping;\n";
print "import org.springframework.web.bind.annotation.GetMapping;\n";
print "import org.springframework.web.bind.annotation.PathVariable;\n";
print "import org.springframework.web.bind.annotation.PostMapping;\n";
print "import org.springframework.web.bind.annotation.PutMapping;\n";
print "import org.springframework.web.bind.annotation.RequestBody;\n";
print "import org.springframework.web.bind.annotation.RestController;\n";
print "\n";
print "@RestController\n";
print "public class {$this->controllerClassName} {\n";
print "\n";
print "    \n";		
if ($this->Services !== null) {		
$keys = array_keys( get_object_vars( $this->Services) );		
foreach ($this->Services as $key => $item_Services) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_Services->write($options);
		}}

print "\n";
print "\n";
print "    \n";		
if ($this->Methods !== null) {		
$keys = array_keys( get_object_vars( $this->Methods) );		
foreach ($this->Methods as $key => $item_Methods) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_Methods->write($options);
		}}

print "\n";
print "\n";
print "    \n";		
if ($this->MethodsWithPathVariable !== null) {		
$keys = array_keys( get_object_vars( $this->MethodsWithPathVariable) );		
foreach ($this->MethodsWithPathVariable as $key => $item_MethodsWithPathVariable) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_MethodsWithPathVariable->write($options);
		}}

print "\n";
print "\n";
print "    \n";
if (($this->Repositories !== null &&
 $this->Repositories->count() > 0)) {


print "\n";		
if ($this->Repositories !== null) {		
$keys = array_keys( get_object_vars( $this->Repositories) );		
foreach ($this->Repositories as $key => $item_Repositories) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_Repositories->write($options);
		}}

print "\n";

}

print "\n";
print "\n";
print "    \n";
if (($this->OtherThings !== null &&
 $this->OtherThings->count() > 0)) {


print "\n";		
if ($this->OtherThings !== null) {		
$keys = array_keys( get_object_vars( $this->OtherThings) );		
foreach ($this->OtherThings as $key => $item_OtherThings) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_OtherThings->write($options);
		}}

print "\n";

}

print "\n";
print "\n";
print "    \n";
if (($this->MoreThings !== null &&
 $this->MoreThings->count() > 0) &&
 ($this->AndMoreThings !== null &&
 $this->AndMoreThings->count() > 0)) {


print "\n";		
if ($this->MoreThings !== null) {		
$keys = array_keys( get_object_vars( $this->MoreThings) );		
foreach ($this->MoreThings as $key => $item_MoreThings) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_MoreThings->write($options);
		}}

print " and \n";		
if ($this->AndMoreThings !== null) {		
$keys = array_keys( get_object_vars( $this->AndMoreThings) );		
foreach ($this->AndMoreThings as $key => $item_AndMoreThings) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_AndMoreThings->write($options);
		}}

print " \n";
print "            \n";
if (($this->WithMoreThings !== null &&
 $this->WithMoreThings->count() > 0)) {


print "\n";		
if ($this->WithMoreThings !== null) {		
$keys = array_keys( get_object_vars( $this->WithMoreThings) );		
foreach ($this->WithMoreThings as $key => $item_WithMoreThings) {
			$options = array( "condition:notlast" => (end( $keys ) === $key));			$item_WithMoreThings->write($options);
		}}

print "\n";

}

print "\n";

}

print "\n";
print "}\n";
}

 } 


?>

