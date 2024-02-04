
<?php

require_once( "GeneratorClass.php" );
require_once( "TypeDato.php" );

/* ####################### MinExample : USAGE EXAMPLE ####################### 

	$varMinExample = new MinExample();

	$vardatos = new TypeDato();
	$varMinExample->addDatosItem( $varDatosItem );

	$varMinExample->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class MinExample extends GeneratorClass {

	protected TypeDato $datos;

public function __construct()

{

		parent :: __construct();

	$this->datos =  new TypeDato();

}

	public function setDatos( TypeDato $datos)
{

		 $this->datos = $datos;
return $this; 
}

	public function getDatos()
{

		return $this->datos;
}

	public function addDatosItem( TypeDato $item )
{

		$this->datos->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Hello world! ---> \n";		
if ($this->datos !== null) {		
$keys = array_keys( get_object_vars( $this->datos) );		
foreach ($this->datos as $key => $item_datos) {
		$item_datos->options = $this->getOptionsArray( $keys, $key, $item_datos );			$item_datos->write();
		}}

print "\n";
}

 } 


?>

