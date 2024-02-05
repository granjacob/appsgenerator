
<?php

require_once( "GeneratorClass.php" );
require_once( "PrintMyData.php" );

/* ####################### EmptyResultsMessage : USAGE EXAMPLE ####################### 

	$varEmptyResultsMessage = new EmptyResultsMessage();

	$vardata = new PrintMyData();
	$varEmptyResultsMessage->addDataItem( $varDataItem );

	$varEmptyResultsMessage->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class EmptyResultsMessage extends GeneratorClass {

	protected PrintMyData $data;

public function __construct()

{

		parent :: __construct();

	$this->data =  new PrintMyData();

}

	public function setData( PrintMyData $data)
{

		 $this->data = $data;
return $this; 
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

print "Este mensaje aparece porque los resultados estan vacios o no hay informacion disponible.\n";
 }
print "\n";if ($this->validateOptions("condition:notempty")) { 

print "\n";		
$this->writeArrayObject( $this->data );

print "\n";
 }
print "\n";
print "\n";
print "            \n";
}

 } 


?>

