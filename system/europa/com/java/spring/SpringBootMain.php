
<?php

use system\jupiter\core\GeneratorClass;

/* ####################### SpringBootMain : USAGE EXAMPLE ####################### 

	$varSpringBootMain = new SpringBootMain();

	$varSpringBootMain->setPackage("SpringBootMain_package_EXAMPLE");

	$varSpringBootMain->setApplicationMainClass("SpringBootMain_applicationMainClass_EXAMPLE");

	$varSpringBootMain->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootMain extends GeneratorClass {

	protected $package;

	protected $applicationMainClass;

public function __construct()

{

		parent :: __construct();

	$this->package =  null;

	$this->applicationMainClass =  null;

}

	public function setPackage(  $package)
{

		 $this->package = $package;
return $this; 
}

	public function setApplicationMainClass(  $applicationMainClass)
{

		 $this->applicationMainClass = $applicationMainClass;
return $this; 
}

	public function getPackage()
{

		return $this->package;
}

	public function getApplicationMainClass()
{

		return $this->applicationMainClass;
}

	public function write() {

	$this->validateData();

print "package {$this->package};\n";
print "\n";
print "import org.springframework.boot.SpringApplication;\n";
print "import org.springframework.boot.autoconfigure.SpringBootApplication;\n";
print "\n";
print "@SpringBootApplication\n";
print "public class {$this->applicationMainClass} {\n";
print "\n";
print "  public static void main(String... args) {\n";
print "    SpringApplication.run({$this->applicationMainClass}.class, args);\n";
print "  }\n";
print "}\n";
}

 } 


?>

