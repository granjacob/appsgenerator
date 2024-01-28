
<?php

require_once( "GeneratorClass.php" );
require_once( "SpringAutowiredService.php" );
require_once( "SpringControllerMethod.php" );

/* ####################### SpringBootController : USAGE EXAMPLE ####################### 

	$varSpringBootController = new SpringBootController();

	$varSpringBootController->setPackageName("XXXXXXX");

	$varSpringBootController->setControllerClassName("XXXXXXX");

	$varServices = new SpringAutowiredService();
	$varSpringBootController->addServicesItem( $varServices );

	$varMethods = new SpringControllerMethod();
	$varSpringBootController->addMethodsItem( $varMethods );

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
if ($this->Services !== null) {		
foreach ($this->Services as $item_Services) {
			$item_Services->write();
		}}

print "\n";
print "\n";
print "    \n";		
if ($this->Methods !== null) {		
foreach ($this->Methods as $item_Methods) {
			$item_Methods->write();
		}}

print "\n";
print "\n";
print "    \n";
if (($this->Repositories !== null &&
 $this->Repositories->count() > 0)) {


print "\n";		
if ($this->Repositories !== null) {		
foreach ($this->Repositories as $item_Repositories) {
			$item_Repositories->write();
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
foreach ($this->OtherThings as $item_OtherThings) {
			$item_OtherThings->write();
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
foreach ($this->MoreThings as $item_MoreThings) {
			$item_MoreThings->write();
		}}

print " and \n";		
if ($this->AndMoreThings !== null) {		
foreach ($this->AndMoreThings as $item_AndMoreThings) {
			$item_AndMoreThings->write();
		}}

print " \n";
print "            \n";
if (($this->WithMoreThings !== null &&
 $this->WithMoreThings->count() > 0)) {


print "\n";		
if ($this->WithMoreThings !== null) {		
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

