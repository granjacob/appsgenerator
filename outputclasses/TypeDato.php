
<?php

require_once( "GeneratorClass.php" );

/* ####################### TypeDato : USAGE EXAMPLE ####################### 

	$varTypeDato = new TypeDato();

	$varTypeDato->setAddress("TypeDato_address_EXAMPLE");

	$varTypeDato->setId("TypeDato_id_EXAMPLE");

	$varTypeDato->setNombrePersona("TypeDato_nombre_persona_EXAMPLE");

	$varTypeDato->write( $options );

    ####################### USAGE EXAMPLE ####################### **/ 

class TypeDato extends GeneratorClass {

	protected $address;

	protected $id;

	protected $nombre_persona;

public function __construct()

{

		parent :: __construct();

	$this->address =  null;

	$this->id =  null;

	$this->nombre_persona =  null;

}

	public function setAddress(  $address)
{

		 $this->address = $address;
return $this; 
}

	public function setId(  $id)
{

		 $this->id = $id;
return $this; 
}

	public function setNombrePersona(  $nombre_persona)
{

		 $this->nombre_persona = $nombre_persona;
return $this; 
}

	public function getAddress()
{

		return $this->address;
}

	public function getId()
{

		return $this->id;
}

	public function getNombrePersona()
{

		return $this->nombre_persona;
}

	public function write( $options=array() ) {

	$this->validateData();

print "The output of TypeDato! ---> {$this->address} and {$this->id} is the data for {$this->nombre_persona}\n";
}

 } 


?>

