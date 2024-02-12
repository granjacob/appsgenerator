
<?php

require_once( "GeneratorClass.php" );

/* ####################### Curso : USAGE EXAMPLE ####################### 

	$varCurso = new Curso();

	$varCurso->setId("Curso_id_EXAMPLE");

	$varCurso->setNombre("Curso_nombre_EXAMPLE");

	$varCurso->setCupo("Curso_cupo_EXAMPLE");

	$varCurso->setDescripcion("Curso_descripcion_EXAMPLE");

	$varCurso->setFechaInicio("Curso_fecha_inicio_EXAMPLE");

	$varCurso->setFechaFin("Curso_fecha_fin_EXAMPLE");

	$varCurso->setCantidadModulos("Curso_cantidadModulos_EXAMPLE");

	$varCurso->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Curso extends GeneratorClass {

	protected $id;

	protected $nombre;

	protected $cupo;

	protected $descripcion;

	protected $fecha_inicio;

	protected $fecha_fin;

	protected $cantidadModulos;

public function __construct()

{

		parent :: __construct();

	$this->id =  null;

	$this->nombre =  null;

	$this->cupo =  null;

	$this->descripcion =  null;

	$this->fecha_inicio =  null;

	$this->fecha_fin =  null;

	$this->cantidadModulos =  null;

}

	public function setId(  $id)
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

	public function setFechaInicio(  $fecha_inicio)
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

	public function write() {

	$this->validateData();

print "{$this->id}\n";
print "\n";
print "            {$this->nombre}\n";
print "            {$this->cupo}\n";
print "            {$this->descripcion}\n";
print "            {$this->fecha_inicio}\n";
print "            {$this->fecha_fin}\n";
print "            {$this->cantidadModulos}\n";
}

 } 


?>

