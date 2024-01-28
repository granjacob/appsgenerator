
<?php

require_once( "GeneratorClass.php" );
require_once( "TypeDato.php" );

/* ####################### MinExample : USAGE EXAMPLE ####################### 

	$varMinExample = new MinExample();

	$vardatos = new TypeDato();
	$varMinExample->addDatosItem( $item );

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

		$this->datos->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "Hello world! ---> \n";		
if (is_array( $this->datos)) {		
foreach ($this->datos as $item_datos) {
			$item_datos->write();
		}}

print "\n";
}

 } 


?>

