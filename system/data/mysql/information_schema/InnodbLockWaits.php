<?php            namespace system\data\mysql\information_schema;            class InnodbLockWaits extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'requesting_trx_id' => 'requestingTrxId','requested_lock_id' => 'requestedLockId','blocking_trx_id' => 'blockingTrxId','blocking_lock_id' => 'blockingLockId',            );                }                private $requestingTrxId;private $requestedLockId;private $blockingTrxId;private $blockingLockId;                public function getrequestingTrxId()            {                return $this->requestingTrxId;            }public function getrequestedLockId()            {                return $this->requestedLockId;            }public function getblockingTrxId()            {                return $this->blockingTrxId;            }public function getblockingLockId()            {                return $this->blockingLockId;            }                public function setrequestingTrxId( $requestingTrxId )            {                $this->requestingTrxId = $requestingTrxId;            }public function setrequestedLockId( $requestedLockId )            {                $this->requestedLockId = $requestedLockId;            }public function setblockingTrxId( $blockingTrxId )            {                $this->blockingTrxId = $blockingTrxId;            }public function setblockingLockId( $blockingLockId )            {                $this->blockingLockId = $blockingLockId;            }            }            ?>