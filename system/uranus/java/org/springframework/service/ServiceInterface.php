<?php

namespace system\uranus\java\org\springframework\service;
use system\jupiter\core\GeneratorClass;
use system\uranus\org\springframework\service\Import;

/* ####################### ServiceInterface : USAGE EXAMPLE ####################### 

	$varServiceInterface = new ServiceInterface();

	$varServiceInterface->setServicePackage("ServiceInterface_servicePackage_EXAMPLE");

	$varServiceInterface->setEntityPackage("ServiceInterface_EntityPackage_EXAMPLE");

	$varimports = new Import();
	$varServiceInterface->addImportsItem( $varImportsItem );

	$varServiceInterface->setEntityName("ServiceInterface_EntityName_EXAMPLE");

	$varServiceInterface->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ServiceInterface extends GeneratorClass {

	public $servicePackage;

	public $EntityPackage;

	public $imports;

	public $EntityName;

public function __construct()

{

		parent :: __construct();

	$this->servicePackage =  null;

	$this->EntityPackage =  null;

	$this->imports =  new Import();

	$this->EntityName =  null;

}

	public function setServicePackage(  $servicePackage)
{

		 $this->servicePackage = $servicePackage;
return $this; 
}

	public function setEntityPackage(  $EntityPackage)
{

		 $this->EntityPackage = $EntityPackage;
return $this; 
}

	public function setImports( Import $imports)
{

		 $this->imports = $imports;
return $this; 
}

	public function setEntityName(  $EntityName)
{

		 $this->EntityName = $EntityName;
return $this; 
}

	public function getServicePackage()
{

		return $this->servicePackage;
}

	public function getEntityPackage()
{

		return $this->EntityPackage;
}

	public function getImports()
{

		return $this->imports;
}

	public function getEntityName()
{

		return $this->EntityName;
}

	public function addImportsItem( Import $item )
{

		$this->imports->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "// Java Program to Demonstrate DepartmentService File";
$output .= "";
$output .= "// Importing required package to code fragment";
$output .= "package {$this->servicePackage};";
$output .= "";
$output .= "import {$this->EntityPackage};";
$output .= "// Importing required classes";
$output .= "";
if (($this->verifyOptionalExpression($this->imports))) {

		
$output .= $this->writeArrayObject( $this->imports, Import::class );

$output .= "";

}

$output .= "";
$output .= "";
$output .= "// Interface";
$output .= "public interface {$this->EntityName}Service {";
$output .= "";
$output .= "    // Save operation";
$output .= "    {$this->EntityName} save{$this->EntityName}({$this->EntityName} department);";
$output .= "";
$output .= "    // Read operation";
$output .= "    List<{$this->EntityName}> fetch{$this->EntityName}List();";
$output .= "";
$output .= "    // Update operation";
$output .= "    {$this->EntityName} updateDepartment({$this->EntityName} department,";
$output .= "                                Long departmentId);";
$output .= "";
$output .= "    // Delete operation";
$output .= "    void deleteDepartmentById(Long departmentId);";
$output .= "}";
 return $output; }

 } 


?>

