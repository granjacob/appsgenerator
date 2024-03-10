<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### ColegioJerusalen : USAGE EXAMPLE ####################### 

	$varColegioJerusalen = new ColegioJerusalen();

	$varColegioJerusalen->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ColegioJerusalen extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "El colegio Leo ofrece a los estudiantes de bachillerato estudiar los \n";
print "         grados sexto, septimo, octavo, noveno, decimo y undecimo.\n";
print "\n";
print "         Las matriculas de los estudiantes se realizan cada año en \n";
print "         el primer mes del año a cursar o el ultimo mes del año vigente.\n";
print "\n";
print "         El colegio cuenta con 30 profesores disponibles.\n";
print "\n";
print "         Cada año se genera un horario para cada estudiante y profesor.\n";
print "         \n";
print "         Cada grado cuenta con un plan academico.\n";
print "         \n";
print "         Los planes academicos estan compuestos por materias.\n";
print "         \n";
print "         Las materias se componen de modulos que el profesor debera abordar durante el \n";
print "         año lectivo en curso.\n";
print "\n";
print "         Los estudiantes deberan cumplir y aprobar los objetivos de cada modulo mediante evaluaciones.\n";
print "\n";
print "         Las materias son evaluadas mediante porcentajes que el profesor debe definir para la materia.\n";
print "\n";
print "         Los porcentajes de evaluacion reciben una calificacion entre 0.0 y 5.0, siendo 0.0 la nota minima\n";
print "         y 5.0 la nota maxima.\n";
print "\n";
print "         Cada matricula tiene un valor para el año en curso y el valor de esta se definira de acuerdo con\n";
print "         lo establecido por el ministerio de educacion.\n";
print "\n";
print "         Cada estudiante debera pagar mes a mes el valor correspondiente a una pension.\n";
print "\n";
print "         Con el dinero recolectado de la pension se le paga a los profesores y se destinan recursos\n";
print "         para el mantenimiento de las instalaciones.\n";
}

 } 


?>

