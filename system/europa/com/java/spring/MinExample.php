
<?php

use system\jupiter\core\GeneratorClass;
use \system\europa\com\java\spring\TypeDato;

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
$this->writeArrayObject( $this->datos );

print "\n";
}

 } 


?>

