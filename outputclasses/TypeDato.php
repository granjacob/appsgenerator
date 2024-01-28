
<?php

require_once( "GeneratorClass.php" );

/* ####################### TypeDato : USAGE EXAMPLE ####################### 

	$varTypeDato = new TypeDato();

	$varTypeDato->setAddress("XXXXXXX");

	$varTypeDato->setId("XXXXXXX");

	$varTypeDato->setNombrePersona("XXXXXXX");

	$varTypeDato->write();

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

	public function addAddressItem(  $item )
{

		$this->address->append($item);
return $this; 
}

	public function addIdItem(  $item )
{

		$this->id->append($item);
return $this; 
}

	public function addNombrePersonaItem(  $item )
{

		$this->nombre_persona->append($item);
return $this; 
}

	public function write() {

	$this->validateData();

print "The output of TypeDato! ---> {$this->address} and {$this->id} is the data for {$this->nombre_persona}\n";
}

 } 


?>

