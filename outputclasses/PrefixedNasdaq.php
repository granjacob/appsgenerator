
<?php

require_once( "GeneratorClass.php" );
require_once( "AAAA.php" );

/* ####################### prefixedNasdaq : USAGE EXAMPLE ####################### 

	$varprefixedNasdaq = new prefixedNasdaq();

	$varattrName = new AAAA();
	$varprefixedNasdaq->addAttrNameItem( $varAttrNameItem );

	$varprefixedNasdaq->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class prefixedNasdaq extends GeneratorClass {

	protected AAAA $attrName;

public function __construct()

{

		parent :: __construct();

	$this->attrName =  new AAAA();

}

	public function setAttrName( AAAA $attrName)
{

		 $this->attrName = $attrName;
return $this; 
}

	public function getAttrName()
{

		return $this->attrName;
}

	public function addAttrNameItem( AAAA $item )
{

		$this->attrName->append($item);
return $this; 
}

	public function write( $options ) {

	$this->validateData();

print "NASDAQ_\n";		
if ($this->attrName !== null) {		
$keys = array_keys( $this->attrName);		
foreach ($this->attrName as $item_attrName => $key) {
			$options = array( "condition:notlast" => (end( $keys ) === $key ? true : false));			$item_attrName->write($options);
		}}

print "\n";
}

 } 


?>

