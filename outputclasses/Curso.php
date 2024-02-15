
<?php

require_once( "GeneratorClass.php" );
require_once( "int.php" );
require_once( "Date.php" );

/* ####################### Curso : USAGE EXAMPLE ####################### 

	$varCurso = new Curso();

	$varid = new int();
	$varCurso->addIdItem( $varIdItem );

	$varCurso->setNombre("Curso_nombre_EXAMPLE");

	$varCurso->setCupo("Curso_cupo_EXAMPLE");

	$varCurso->setDescripcion("Curso_descripcion_EXAMPLE");

	$varfecha_inicio = new Date();
	$varCurso->addFechaInicioItem( $varFechaInicioItem );

	$varCurso->setFechaFin("Curso_fecha_fin_EXAMPLE");

	$varCurso->setCantidadModulos("Curso_cantidadModulos_EXAMPLE");

	$varCurso->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Curso extends GeneratorClass {

	protected int $id;

	protected $nombre;

	protected $cupo;

	protected $descripcion;

	protected Date $fecha_inicio;

	protected $fecha_fin;

	protected $cantidadModulos;

public function __construct()

{

		parent :: __construct();

	$this->id =  new int();

	$this->nombre =  null;

	$this->cupo =  null;

	$this->descripcion =  null;

	$this->fecha_inicio =  new Date();

	$this->fecha_fin =  null;

	$this->cantidadModulos =  null;

}

	public function setId( int $id)
{

		 $this->id = $id;
return $this; 
}

	public function setNombre(  $nombre)
{

		 $this->nombre = $nombre;
return $this; 
}

	public function setCupo(  $cupo)
{

		 $this->cupo = $cupo;
return $this; 
}

	public function setDescripcion(  $descripcion)
{

		 $this->descripcion = $descripcion;
return $this; 
}

	public function setFechaInicio( Date $fecha_inicio)
{

		 $this->fecha_inicio = $fecha_inicio;
return $this; 
}

	public function setFechaFin(  $fecha_fin)
{

		 $this->fecha_fin = $fecha_fin;
return $this; 
}

	public function setCantidadModulos(  $cantidadModulos)
{

		 $this->cantidadModulos = $cantidadModulos;
return $this; 
}

	public function getId()
{

		return $this->id;
}

	public function getNombre()
{

		return $this->nombre;
}

	public function getCupo()
{

		return $this->cupo;
}

	public function getDescripcion()
{

		return $this->descripcion;
}

	public function getFechaInicio()
{

		return $this->fecha_inicio;
}

	public function getFechaFin()
{

		return $this->fecha_fin;
}

	public function getCantidadModulos()
{

		return $this->cantidadModulos;
}

	public function addIdItem( int $item )
{

		$this->id->append( clone $item);
return $this; 
}

	public function addFechaInicioItem( Date $item )
{

		$this->fecha_inicio->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "\n";		
$this->writeArrayObject( $this->id );

print "\n";
print "            {$this->nombre}\n";
print "            {$this->cupo}\n";
print "            {$this->descripcion}\n";
print "            \n";		
$this->writeArrayObject( $this->fecha_inicio );

print "\n";
print "            {$this->fecha_fin}\n";
print "            {$this->cantidadModulos}\n";
}

 } 


?>

