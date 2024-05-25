<?php            namespace system\data\mysql\information_schema;            class Routines extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'SPECIFIC_NAME' => 'specificName','ROUTINE_CATALOG' => 'routineCatalog','ROUTINE_SCHEMA' => 'routineSchema','ROUTINE_NAME' => 'routineName','ROUTINE_TYPE' => 'routineType','DATA_TYPE' => 'dataType','CHARACTER_MAXIMUM_LENGTH' => 'characterMaximumLength','CHARACTER_OCTET_LENGTH' => 'characterOctetLength','NUMERIC_PRECISION' => 'numericPrecision','NUMERIC_SCALE' => 'numericScale','DATETIME_PRECISION' => 'datetimePrecision','CHARACTER_SET_NAME' => 'characterSetName','COLLATION_NAME' => 'collationName','DTD_IDENTIFIER' => 'dtdIdentifier','ROUTINE_BODY' => 'routineBody','ROUTINE_DEFINITION' => 'routineDefinition','EXTERNAL_NAME' => 'externalName','EXTERNAL_LANGUAGE' => 'externalLanguage','PARAMETER_STYLE' => 'parameterStyle','IS_DETERMINISTIC' => 'isDeterministic','SQL_DATA_ACCESS' => 'sqlDataAccess','SQL_PATH' => 'sqlPath','SECURITY_TYPE' => 'securityType','CREATED' => 'created','LAST_ALTERED' => 'lastAltered','SQL_MODE' => 'sqlMode','ROUTINE_COMMENT' => 'routineComment','DEFINER' => 'definer','CHARACTER_SET_CLIENT' => 'characterSetClient','COLLATION_CONNECTION' => 'collationConnection','DATABASE_COLLATION' => 'databaseCollation',            );                }                private $specificName;private $routineCatalog;private $routineSchema;private $routineName;private $routineType;private $dataType;private $characterMaximumLength;private $characterOctetLength;private $numericPrecision;private $numericScale;private $datetimePrecision;private $characterSetName;private $collationName;private $dtdIdentifier;private $routineBody;private $routineDefinition;private $externalName;private $externalLanguage;private $parameterStyle;private $isDeterministic;private $sqlDataAccess;private $sqlPath;private $securityType;private $created;private $lastAltered;private $sqlMode;private $routineComment;private $definer;private $characterSetClient;private $collationConnection;private $databaseCollation;                public function getspecificName()            {                return $this->specificName;            }public function getroutineCatalog()            {                return $this->routineCatalog;            }public function getroutineSchema()            {                return $this->routineSchema;            }public function getroutineName()            {                return $this->routineName;            }public function getroutineType()            {                return $this->routineType;            }public function getdataType()            {                return $this->dataType;            }public function getcharacterMaximumLength()            {                return $this->characterMaximumLength;            }public function getcharacterOctetLength()            {                return $this->characterOctetLength;            }public function getnumericPrecision()            {                return $this->numericPrecision;            }public function getnumericScale()            {                return $this->numericScale;            }public function getdatetimePrecision()            {                return $this->datetimePrecision;            }public function getcharacterSetName()            {                return $this->characterSetName;            }public function getcollationName()            {                return $this->collationName;            }public function getdtdIdentifier()            {                return $this->dtdIdentifier;            }public function getroutineBody()            {                return $this->routineBody;            }public function getroutineDefinition()            {                return $this->routineDefinition;            }public function getexternalName()            {                return $this->externalName;            }public function getexternalLanguage()            {                return $this->externalLanguage;            }public function getparameterStyle()            {                return $this->parameterStyle;            }public function getisDeterministic()            {                return $this->isDeterministic;            }public function getsqlDataAccess()            {                return $this->sqlDataAccess;            }public function getsqlPath()            {                return $this->sqlPath;            }public function getsecurityType()            {                return $this->securityType;            }public function getcreated()            {                return $this->created;            }public function getlastAltered()            {                return $this->lastAltered;            }public function getsqlMode()            {                return $this->sqlMode;            }public function getroutineComment()            {                return $this->routineComment;            }public function getdefiner()            {                return $this->definer;            }public function getcharacterSetClient()            {                return $this->characterSetClient;            }public function getcollationConnection()            {                return $this->collationConnection;            }public function getdatabaseCollation()            {                return $this->databaseCollation;            }                public function setspecificName( $specificName )            {                $this->specificName = $specificName;            }public function setroutineCatalog( $routineCatalog )            {                $this->routineCatalog = $routineCatalog;            }public function setroutineSchema( $routineSchema )            {                $this->routineSchema = $routineSchema;            }public function setroutineName( $routineName )            {                $this->routineName = $routineName;            }public function setroutineType( $routineType )            {                $this->routineType = $routineType;            }public function setdataType( $dataType )            {                $this->dataType = $dataType;            }public function setcharacterMaximumLength( $characterMaximumLength )            {                $this->characterMaximumLength = $characterMaximumLength;            }public function setcharacterOctetLength( $characterOctetLength )            {                $this->characterOctetLength = $characterOctetLength;            }public function setnumericPrecision( $numericPrecision )            {                $this->numericPrecision = $numericPrecision;            }public function setnumericScale( $numericScale )            {                $this->numericScale = $numericScale;            }public function setdatetimePrecision( $datetimePrecision )            {                $this->datetimePrecision = $datetimePrecision;            }public function setcharacterSetName( $characterSetName )            {                $this->characterSetName = $characterSetName;            }public function setcollationName( $collationName )            {                $this->collationName = $collationName;            }public function setdtdIdentifier( $dtdIdentifier )            {                $this->dtdIdentifier = $dtdIdentifier;            }public function setroutineBody( $routineBody )            {                $this->routineBody = $routineBody;            }public function setroutineDefinition( $routineDefinition )            {                $this->routineDefinition = $routineDefinition;            }public function setexternalName( $externalName )            {                $this->externalName = $externalName;            }public function setexternalLanguage( $externalLanguage )            {                $this->externalLanguage = $externalLanguage;            }public function setparameterStyle( $parameterStyle )            {                $this->parameterStyle = $parameterStyle;            }public function setisDeterministic( $isDeterministic )            {                $this->isDeterministic = $isDeterministic;            }public function setsqlDataAccess( $sqlDataAccess )            {                $this->sqlDataAccess = $sqlDataAccess;            }public function setsqlPath( $sqlPath )            {                $this->sqlPath = $sqlPath;            }public function setsecurityType( $securityType )            {                $this->securityType = $securityType;            }public function setcreated( $created )            {                $this->created = $created;            }public function setlastAltered( $lastAltered )            {                $this->lastAltered = $lastAltered;            }public function setsqlMode( $sqlMode )            {                $this->sqlMode = $sqlMode;            }public function setroutineComment( $routineComment )            {                $this->routineComment = $routineComment;            }public function setdefiner( $definer )            {                $this->definer = $definer;            }public function setcharacterSetClient( $characterSetClient )            {                $this->characterSetClient = $characterSetClient;            }public function setcollationConnection( $collationConnection )            {                $this->collationConnection = $collationConnection;            }public function setdatabaseCollation( $databaseCollation )            {                $this->databaseCollation = $databaseCollation;            }            }            ?>