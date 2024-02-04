
<?php

require_once( "GeneratorClass.php" );

/* ####################### TestForConditionalToken : USAGE EXAMPLE ####################### 

	$varTestForConditionalToken = new TestForConditionalToken();

	$varTestForConditionalToken->setName("TestForConditionalToken_name_EXAMPLE");

	$varTestForConditionalToken->write( $options );

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

	public function write( $options=array() ) {

	$this->validateData();

print "\n";if ((isset( $options["condition:notlast"] ) && 
$options["condition:notlast"] === true) || !isset( $options["condition:notlast"])) { 

print "\${$this->name},\n";
 }
print "\n";
}

 } 


?>

