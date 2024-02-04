
<?php

require_once( "GeneratorClass.php" );
require_once( "TypeDato.php" );

/* ####################### MinExample : USAGE EXAMPLE ####################### 

	$varMinExample = new MinExample();

	$vardatos = new TypeDato();
	$varMinExample->addDatosItem( $varDatosItem );

	$varMinExample->write( $options );

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

	public function write( $options=array() ) {

	$this->validateData();

print "Hello world! ---> \n";		
if ($this->datos !== null) {		
$keys = array_keys( get_object_vars( $this->datos) );		
foreach ($this->datos as $key => $item_datos) {
			$options = array( "condition:notlast" => (end( $keys ) === $key), 
"condition:first" => ($key === $keys[0]),
"condition:notfirst" => ($key !== $keys[0]), 
"condition:disabled" => ($item_datos->disabled === true), 
"condition:notdisabled" => ($item_datos->disabled !== true), 
"condition:selected" => ($item_datos->selected === true), 
"condition:notselected" => ($item_datos->selected !== true), 
"condition:enabled" => ($item_datos->disabled !== true), 
"condition:notenabled" => ($item_datos->disabled === true), 
"condition:last" => ($key === end( $keys )), 
);			$item_datos->write($options);
		}}

print "\n";
}

 } 


?>

