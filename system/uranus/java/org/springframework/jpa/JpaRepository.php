<?php

namespace system\uranus\java\org\springframework\jpa;
use system\jupiter\core\GeneratorClass;

/* ####################### JpaRepository : USAGE EXAMPLE ####################### 

	$varJpaRepository = new JpaRepository();

	$varJpaRepository->setRepositoryPackage("JpaRepository_repositoryPackage_EXAMPLE");

	$varJpaRepository->setPackageEntity("JpaRepository_packageEntity_EXAMPLE");

	$varJpaRepository->setEntityName("JpaRepository_EntityName_EXAMPLE");

	$varJpaRepository->setImportEntityPackage("JpaRepository_importEntityPackage_EXAMPLE");

	$varJpaRepository->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class JpaRepository extends GeneratorClass {

	public $repositoryPackage;

	public $packageEntity;

	public $EntityName;

	public $importEntityPackage;

public function __construct()

{

		parent :: __construct();

	$this->repositoryPackage =  null;

	$this->packageEntity =  null;

	$this->EntityName =  null;

	$this->importEntityPackage =  null;

}

	public function setRepositoryPackage(  $repositoryPackage)
{

		 $this->repositoryPackage = $repositoryPackage;
return $this; 
}

	public function setPackageEntity(  $packageEntity)
{

		 $this->packageEntity = $packageEntity;
return $this; 
}

	public function setEntityName(  $EntityName)
{

		 $this->EntityName = $EntityName;
return $this; 
}

	public function setImportEntityPackage(  $importEntityPackage)
{

		 $this->importEntityPackage = $importEntityPackage;
return $this; 
}

	public function getRepositoryPackage()
{

		return $this->repositoryPackage;
}

	public function getPackageEntity()
{

		return $this->packageEntity;
}

	public function getEntityName()
{

		return $this->EntityName;
}

	public function getImportEntityPackage()
{

		return $this->importEntityPackage;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "package {$this->repositoryPackage};";
$output .= "";
$output .= "";
if (($this->verifyOptionalExpression($this->packageEntity)) &&
($this->verifyOptionalExpression($this->EntityName))) {


$output .= "import {$this->packageEntity}.{$this->EntityName};";

}

$output .= "";
$output .= "";
if (($this->verifyOptionalExpression($this->importEntityPackage))) {


$output .= "import {$this->importEntityPackage};";

}

$output .= "";
$output .= "import org.springframework.data.jpa.repository.JpaRepository;";
$output .= "import org.springframework.stereotype.Repository;";
$output .= "";
$output .= "// Annotation";
$output .= "@Repository";
$output .= "";
$output .= "// Interface";
$output .= "public interface {$this->EntityName}Repository";
$output .= "    extends JpaRepository<{$this->EntityName}, Long> {";
$output .= "}";
 return $output; }

 } 


?>

