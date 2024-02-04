
<?php

require_once( "GeneratorClass.php" );
require_once( "PrintMyData.php" );

/* ####################### EmptyResultsMessage : USAGE EXAMPLE ####################### 

	$varEmptyResultsMessage = new EmptyResultsMessage();

	$vardata = new PrintMyData();
	$varEmptyResultsMessage->addDataItem( $varDataItem );

	$varEmptyResultsMessage->write( $options );

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

	public function write( $options=array() ) {

	$this->validateData();

print "\n";if ((isset( $options["condition:emptyEs"] ) && 
$options["condition:emptyEs"] === true) || !isset( $options["condition:emptyEs"])) { 

print "te mensaje aparece porque los resultados estan vacios o no hay informacion disponible.\n";
 }
print "\n";if ((isset( $options["condition:notempt"] ) && 
$options["condition:notempt"] === true) || !isset( $options["condition:notempt"])) { 

print "y\n";		
if ($this->data !== null) {		
$keys = array_keys( get_object_vars( $this->data) );		
foreach ($this->data as $key => $item_data) {
			$options = array( "condition:notlast" => (end( $keys ) === $key), 
"condition:first" => ($key === $keys[0]),
"condition:notfirst" => ($key !== $keys[0]), 
"condition:disabled" => ($item_data->disabled === true), 
"condition:notdisabled" => ($item_data->disabled !== true), 
"condition:selected" => ($item_data->selected === true), 
"condition:notselected" => ($item_data->selected !== true), 
"condition:enabled" => ($item_data->disabled !== true), 
"condition:notenabled" => ($item_data->disabled === true), 
"condition:last" => ($key === end( $keys )), 
);			$item_data->write($options);
		}}

print "\n";
 }
print "\n";
print "\n";
print "            \n";
}

 } 


?>

