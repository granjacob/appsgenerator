<?php

namespace system\uranus\java\org\springframework\service;
use system\jupiter\core\GeneratorClass;
use system\uranus\org\springframework\service\Import;

/* ####################### ServiceImplementation : USAGE EXAMPLE ####################### 

	$varServiceImplementation = new ServiceImplementation();

	$varServiceImplementation->setServiceImplementationPackage("ServiceImplementation_serviceImplementationPackage_EXAMPLE");

	$varServiceImplementation->setEntityPackage("ServiceImplementation_EntityPackage_EXAMPLE");

	$varServiceImplementation->setRepositoryPackage("ServiceImplementation_RepositoryPackage_EXAMPLE");

	$varimports = new Import();
	$varServiceImplementation->addImportsItem( $varImportsItem );

	$varServiceImplementation->setEntityName("ServiceImplementation_EntityName_EXAMPLE");

	$varServiceImplementation->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ServiceImplementation extends GeneratorClass {

	public $serviceImplementationPackage;

	public $EntityPackage;

	public $RepositoryPackage;

	public $imports;

	public $EntityName;

public function __construct()

{

		parent :: __construct();

	$this->serviceImplementationPackage =  null;

	$this->EntityPackage =  null;

	$this->RepositoryPackage =  null;

	$this->imports =  new Import();

	$this->EntityName =  null;

}

	public function setServiceImplementationPackage(  $serviceImplementationPackage)
{

		 $this->serviceImplementationPackage = $serviceImplementationPackage;
return $this; 
}

	public function setEntityPackage(  $EntityPackage)
{

		 $this->EntityPackage = $EntityPackage;
return $this; 
}

	public function setRepositoryPackage(  $RepositoryPackage)
{

		 $this->RepositoryPackage = $RepositoryPackage;
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

	public function getServiceImplementationPackage()
{

		return $this->serviceImplementationPackage;
}

	public function getEntityPackage()
{

		return $this->EntityPackage;
}

	public function getRepositoryPackage()
{

		return $this->RepositoryPackage;
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

$output .= "package {$this->serviceImplementationPackage};";
$output .= "";
$output .= "import {$this->EntityPackage};";
$output .= "import {$this->RepositoryPackage};";
$output .= "";
$output .= "// Importing required classes";
$output .= "";
if (($this->verifyOptionalExpression($this->imports))) {

		
$output .= $this->writeArrayObject( $this->imports, Import::class );

$output .= "";

}

$output .= "";
$output .= "";
$output .= "// Annotation";
$output .= "@Service";
$output .= "";
$output .= "// Class";
$output .= "public class {$this->EntityName}ServiceImpl";
$output .= "    implements {$this->EntityName}Service {";
$output .= "";
$output .= "    @Autowired";
$output .= "    private {$this->EntityName}Repository {$this->EntityName}Repository;";
$output .= "";
$output .= "    // Save operation";
$output .= "    @Override";
$output .= "    public {$this->EntityName} save{$this->EntityName}({$this->EntityName} {$this->EntityName})";
$output .= "    {";
$output .= "        return {$this->EntityName}Repository.save({$this->EntityName});";
$output .= "    }";
$output .= "";
$output .= "    // Read operation";
$output .= "    @Override";
$output .= "    public List<{$this->EntityName}> fetch{$this->EntityName}List()";
$output .= "    {";
$output .= "        return (List<{$this->EntityName}>)";
$output .= "            {$this->EntityName}Repository.findAll();";
$output .= "    }";
$output .= "";
$output .= "    // Update operation";
$output .= "    @Override";
$output .= "    public {$this->EntityName}";
$output .= "    update{$this->EntityName}({$this->EntityName} {$this->EntityName},";
$output .= "                     Long {$this->EntityName}Id)";
$output .= "    {";
$output .= "        return null;";
$output .= "    }";
$output .= "";
$output .= "    // Delete operation";
$output .= "    @Override";
$output .= "    public void delete{$this->EntityName}ById(Long {$this->EntityName}Id)";
$output .= "    {";
$output .= "        {$this->EntityName}Repository.deleteById(d{$this->EntityName}Id);";
$output .= "    }";
$output .= "}";
 return $output; }

 } 


?>

