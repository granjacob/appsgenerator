
<?php

use system\jupiter\core\GeneratorClass;

/* ####################### TestForConditionalToken : USAGE EXAMPLE ####################### 

	$varTestForConditionalToken = new TestForConditionalToken();

	$varTestForConditionalToken->setName("TestForConditionalToken_name_EXAMPLE");

	$varTestForConditionalToken->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TestForConditionalToken extends GeneratorClass {

	protected $name;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function write() {

	$this->validateData();

print "\n";if ($this->validateOptions("condition:notlast")) { 

print "\${$this->name},\n";
 }
print "\n";
}

 } 


?>

