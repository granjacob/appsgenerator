<?php            namespace system\data\mysql\information_schema;            class EnabledRoles extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'ROLE_NAME' => 'roleName',            );                }                private $roleName;                public function getroleName()            {                return $this->roleName;            }                public function setroleName( $roleName )            {                $this->roleName = $roleName;            }            }            ?>