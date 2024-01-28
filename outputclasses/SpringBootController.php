
<?php

require_once( "GeneratorClass.php" );
require_once( "SpringAutowiredService.php" );
require_once( "SpringControllerMethod.php" );

/* ####################### SpringBootController : USAGE EXAMPLE ####################### 

	$varSpringBootController = new SpringBootController();

	$varSpringBootController->setPackageName("XXXXXXX");

	$varSpringBootController->setControllerClassName("XXXXXXX");

	$varServices = new SpringAutowiredService();
	$varSpringBootController->addServicesItem( $item );

	$varMethods = new SpringControllerMethod();
	$varSpringBootController->addMethodsItem( $item );

	$varSpringBootController->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootController extends GeneratorClass {

	protected $packageName;

	protected $controllerClassName;

	protected SpringAutowiredService $Services;

	protected SpringControllerMethod $Methods;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

	$this->controllerClassName =  null;

	$this->Services =  new SpringAutowiredService();

	$this->Methods =  new SpringControllerMethod();

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

	public function addPackageNameItem(  $item )
{

		$this->packageName->append($item);
return $this; 
}

	public function addControllerClassNameItem(  $item )
{

		$this->controllerClassName->append($item);
return $this; 
}

	public function addServicesItem( SpringAutowiredService $item )
{

		$this->Services->append($item);
return $this; 
}

	public function addMethodsItem( SpringControllerMethod $item )
{

		$this->Methods->append($item);
return $this; 
}

	public function write() {

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
if (is_array( $this->Services)) {		
foreach ($this->Services as $item_Services) {
			$item_Services->write();
		}}

print "\n";
print "\n";
print "    \n";		
if (is_array( $this->Methods)) {		
foreach ($this->Methods as $item_Methods) {
			$item_Methods->write();
		}}

print "\n";
print "\n";
print "    \n";
if ((is_array( $this->Repositories ) && count( $this->Repositories ) > 0)) {


print "\n";		
if (is_array( $this->Repositories)) {		
foreach ($this->Repositories as $item_Repositories) {
			$item_Repositories->write();
		}}

print "\n";

}

print "\n";
print "\n";
print "    \n";
if ((is_array( $this->OtherThings ) && count( $this->OtherThings ) > 0)) {


print "\n";		
if (is_array( $this->OtherThings)) {		
foreach ($this->OtherThings as $item_OtherThings) {
			$item_OtherThings->write();
		}}

print "\n";

}

print "\n";
print "\n";
print "    \n";
if ((is_array( $this->MoreThings ) && count( $this->MoreThings ) > 0) && (is_array( $this->AndMoreThings ) && count( $this->AndMoreThings ) > 0)) {


print "\n";		
if (is_array( $this->MoreThings)) {		
foreach ($this->MoreThings as $item_MoreThings) {
			$item_MoreThings->write();
		}}

print " and \n";		
if (is_array( $this->AndMoreThings)) {		
foreach ($this->AndMoreThings as $item_AndMoreThings) {
			$item_AndMoreThings->write();
		}}

print " \n";
print "            \n";
if ((is_array( $this->WithMoreThings ) && count( $this->WithMoreThings ) > 0)) {


print "\n";		
if (is_array( $this->WithMoreThings)) {		
foreach ($this->WithMoreThings as $item_WithMoreThings) {
			$item_WithMoreThings->write();
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

