
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringBootMain : USAGE EXAMPLE ####################### 

	$varSpringBootMain = new SpringBootMain();

	$varSpringBootMain->setPackageName("XXXXXXX");

	$varSpringBootMain->setApplicationMainClass("XXXXXXX");

	$varSpringBootMain->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringBootMain extends GeneratorClass {

	protected $packageName;

	protected $applicationMainClass;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

	$this->applicationMainClass =  null;

}

	public function setPackageName(  $packageName)
{

		 $this->packageName = $packageName;
return $this; 
}

	public function setApplicationMainClass(  $applicationMainClass)
{

		 $this->applicationMainClass = $applicationMainClass;
return $this; 
}

	public function getPackageName()
{

		return $this->packageName;
}

	public function getApplicationMainClass()
{

		return $this->applicationMainClass;
}

	public function addPackageNameItem(  $item )
{

		$this->packageName->append($item);
return $this; 
}

	public function addApplicationMainClassItem(  $item )
{

		$this->applicationMainClass->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "package {$this->packageName};\n";
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

