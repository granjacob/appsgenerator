
<?php

require_once( "GeneratorClass.php" );

/* ####################### SpringAutowiredService : USAGE EXAMPLE ####################### 

	$varSpringAutowiredService = new SpringAutowiredService();

	$varSpringAutowiredService->setAccessModifier("SpringAutowiredService_accessModifier_EXAMPLE");

	$varSpringAutowiredService->setServiceType("SpringAutowiredService_ServiceType_EXAMPLE");

	$varSpringAutowiredService->setServiceName("SpringAutowiredService_ServiceName_EXAMPLE");

	$varSpringAutowiredService->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class SpringAutowiredService extends GeneratorClass {

	protected $accessModifier;

	protected $ServiceType;

	protected $ServiceName;

public function __construct()

{

		parent :: __construct();

	$this->accessModifier =  null;

	$this->ServiceType =  null;

	$this->ServiceName =  null;

}

	public function setAccessModifier(  $accessModifier)
{

		 $this->accessModifier = $accessModifier;
return $this; 
}

	public function setServiceType(  $ServiceType)
{

		 $this->ServiceType = $ServiceType;
return $this; 
}

	public function setServiceName(  $ServiceName)
{

		 $this->ServiceName = $ServiceName;
return $this; 
}

	public function getAccessModifier()
{

		return $this->accessModifier;
}

	public function getServiceType()
{

		return $this->ServiceType;
}

	public function getServiceName()
{

		return $this->ServiceName;
}

	public function write( $options ) {

	$this->validateData();

print "@Autowired\n";
print "        {$this->accessModifier} {$this->ServiceType} {$this->ServiceName};\n";
}

 } 


?>

