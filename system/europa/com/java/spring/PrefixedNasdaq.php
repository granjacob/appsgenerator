<?php

namespace system\europa\com\java\spring;
use system\jupiter\core\GeneratorClass;
use \system\europa\com\java\spring\AAAA;

/* ####################### prefixedNasdaq : USAGE EXAMPLE ####################### 

	$varprefixedNasdaq = new prefixedNasdaq();

	$varattrName = new AAAA();
	$varprefixedNasdaq->addAttrNameItem( $varAttrNameItem );

	$varprefixedNasdaq->write();

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

		$this->attrName->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "NASDAQ_\n";		
$this->writeArrayObject( $this->attrName );

print "\n";
}

 } 


?>

