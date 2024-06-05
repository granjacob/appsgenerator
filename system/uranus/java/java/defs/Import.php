<?php

namespace system\uranus\java\java\defs;
use system\jupiter\core\GeneratorClass;
use system\uranus\java\defs\VALVOA;
use system\uranus\cpp\examples\HelloWorld;

/* ####################### Import : USAGE EXAMPLE ####################### 

	$varImport = new Import();

	$varImport->setPackageName("Import_packageName_EXAMPLE");

	$varitem = new VALVOA();
	$varImport->addItemItem( $varItemItem );

	$varprueba = new HelloWorld();
	$varImport->addPruebaItem( $varPruebaItem );

	$varImport->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Import extends GeneratorClass {

	public $packageName;

	public $item;

	public $prueba;

public function __construct()

{

		parent :: __construct();

	$this->packageName =  null;

	$this->item =  new VALVOA();

	$this->prueba =  new HelloWorld();

}

	public function setPackageName(  $packageName)
{

		 $this->packageName = $packageName;
return $this; 
}

	public function setItem( VALVOA $item)
{

		 $this->item = $item;
return $this; 
}

	public function setPrueba( HelloWorld $prueba)
{

		 $this->prueba = $prueba;
return $this; 
}

	public function getPackageName()
{

		return $this->packageName;
}

	public function getItem()
{

		return $this->item;
}

	public function getPrueba()
{

		return $this->prueba;
}

	public function addItemItem( VALVOA $item )
{

		$this->item->append( clone $item);
return $this; 
}

	public function addPruebaItem( HelloWorld $item )
{

		$this->prueba->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "import {$this->packageName};";
$output .= "";		
$output .= $this->writeArrayObject( $this->item, VALVOA::class );

$output .= "";
$output .= "Otras cositas aqui...";
$output .= "";		
$output .= $this->writeArrayObject( $this->prueba, HelloWorld::class );

$output .= "";
 return $output; }

 } 


?>

