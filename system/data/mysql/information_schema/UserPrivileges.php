<?php            namespace system\data\mysql\information_schema;            class UserPrivileges extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'GRANTEE' => 'grantee','TABLE_CATALOG' => 'tableCatalog','PRIVILEGE_TYPE' => 'privilegeType','IS_GRANTABLE' => 'isGrantable',            );                }                private $grantee;private $tableCatalog;private $privilegeType;private $isGrantable;                public function getgrantee()            {                return $this->grantee;            }public function gettableCatalog()            {                return $this->tableCatalog;            }public function getprivilegeType()            {                return $this->privilegeType;            }public function getisGrantable()            {                return $this->isGrantable;            }                public function setgrantee( $grantee )            {                $this->grantee = $grantee;            }public function settableCatalog( $tableCatalog )            {                $this->tableCatalog = $tableCatalog;            }public function setprivilegeType( $privilegeType )            {                $this->privilegeType = $privilegeType;            }public function setisGrantable( $isGrantable )            {                $this->isGrantable = $isGrantable;            }            }            ?>