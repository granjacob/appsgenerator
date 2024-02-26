
<?php

use system\jupiter\core\GeneratorClass;
use \system\europa\com\java\spring\PrintMyData;

/* ####################### ErrorMessage : USAGE EXAMPLE ####################### 

	$varErrorMessage = new ErrorMessage();

	$varErrorMessage->setMessage("ErrorMessage_message_EXAMPLE");

	$vardata = new PrintMyData();
	$varErrorMessage->addDataItem( $varDataItem );

	$varErrorMessage->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ErrorMessage extends GeneratorClass {

	protected $message;

	protected PrintMyData $data;

public function __construct()

{

		parent :: __construct();

	$this->message =  null;

	$this->data =  new PrintMyData();

}

	public function setMessage(  $message)
{

		 $this->message = $message;
return $this; 
}

	public function setData( PrintMyData $data)
{

		 $this->data = $data;
return $this; 
}

	public function getMessage()
{

		return $this->message;
}

	public function getData()
{

		return $this->data;
}

	public function addDataItem( PrintMyData $item )
{

		$this->data->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "\n";if ($this->validateOptions("condition:empty")) { 

print "<p>{$this->message}</p>\n";
 }
print "\n";if ($this->validateOptions("condition:notempty")) { 

print "<ul>\n";		
$this->writeArrayObject( $this->data );

print "</ul>\n";
 }
print "\n";
print "\n";
print "            \n";
}

 } 


?>

