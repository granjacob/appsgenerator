<?php

require_once("GeneratorClass.php");

/* ####################### SpringBootMain : USAGE EXAMPLE ####################### 

	$varSpringBootMain = new SpringBootMain();

	$varSpringBootMain->setApplicationMainClass("SpringBootMain_applicationMainClass_EXAMPLE");

	$varSpringBootMain->write();

	####################### USAGE EXAMPLE ####################### **/

class SpringBootMain extends GeneratorClass
{

	protected $applicationMainClass;

	public function __construct()
	{

		parent::__construct();

		$this->applicationMainClass = null;

	}

	public function setApplicationMainClass($applicationMainClass)
	{

		$this->applicationMainClass = $applicationMainClass;
		return $this;
	}

	public function getApplicationMainClass()
	{

		return $this->applicationMainClass;
	}

	public function write()
	{

		$this->validateData();

		print "package self%:package:%self;\n";
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