<?php            namespace system\data\mysql\information_schema;            class ClientStatistics extends MySQLBase  {                public function __construct()                {                    parent :: __construct();                    $this->tableReference = array(                'CLIENT' => 'client','TOTAL_CONNECTIONS' => 'totalConnections','CONCURRENT_CONNECTIONS' => 'concurrentConnections','CONNECTED_TIME' => 'connectedTime','BUSY_TIME' => 'busyTime','CPU_TIME' => 'cpuTime','BYTES_RECEIVED' => 'bytesReceived','BYTES_SENT' => 'bytesSent','BINLOG_BYTES_WRITTEN' => 'binlogBytesWritten','ROWS_READ' => 'rowsRead','ROWS_SENT' => 'rowsSent','ROWS_DELETED' => 'rowsDeleted','ROWS_INSERTED' => 'rowsInserted','ROWS_UPDATED' => 'rowsUpdated','SELECT_COMMANDS' => 'selectCommands','UPDATE_COMMANDS' => 'updateCommands','OTHER_COMMANDS' => 'otherCommands','COMMIT_TRANSACTIONS' => 'commitTransactions','ROLLBACK_TRANSACTIONS' => 'rollbackTransactions','DENIED_CONNECTIONS' => 'deniedConnections','LOST_CONNECTIONS' => 'lostConnections','ACCESS_DENIED' => 'accessDenied','EMPTY_QUERIES' => 'emptyQueries','TOTAL_SSL_CONNECTIONS' => 'totalSslConnections','MAX_STATEMENT_TIME_EXCEEDED' => 'maxStatementTimeExceeded',            );                }                private $client;private $totalConnections;private $concurrentConnections;private $connectedTime;private $busyTime;private $cpuTime;private $bytesReceived;private $bytesSent;private $binlogBytesWritten;private $rowsRead;private $rowsSent;private $rowsDeleted;private $rowsInserted;private $rowsUpdated;private $selectCommands;private $updateCommands;private $otherCommands;private $commitTransactions;private $rollbackTransactions;private $deniedConnections;private $lostConnections;private $accessDenied;private $emptyQueries;private $totalSslConnections;private $maxStatementTimeExceeded;                public function getclient()            {                return $this->client;            }public function gettotalConnections()            {                return $this->totalConnections;            }public function getconcurrentConnections()            {                return $this->concurrentConnections;            }public function getconnectedTime()            {                return $this->connectedTime;            }public function getbusyTime()            {                return $this->busyTime;            }public function getcpuTime()            {                return $this->cpuTime;            }public function getbytesReceived()            {                return $this->bytesReceived;            }public function getbytesSent()            {                return $this->bytesSent;            }public function getbinlogBytesWritten()            {                return $this->binlogBytesWritten;            }public function getrowsRead()            {                return $this->rowsRead;            }public function getrowsSent()            {                return $this->rowsSent;            }public function getrowsDeleted()            {                return $this->rowsDeleted;            }public function getrowsInserted()            {                return $this->rowsInserted;            }public function getrowsUpdated()            {                return $this->rowsUpdated;            }public function getselectCommands()            {                return $this->selectCommands;            }public function getupdateCommands()            {                return $this->updateCommands;            }public function getotherCommands()            {                return $this->otherCommands;            }public function getcommitTransactions()            {                return $this->commitTransactions;            }public function getrollbackTransactions()            {                return $this->rollbackTransactions;            }public function getdeniedConnections()            {                return $this->deniedConnections;            }public function getlostConnections()            {                return $this->lostConnections;            }public function getaccessDenied()            {                return $this->accessDenied;            }public function getemptyQueries()            {                return $this->emptyQueries;            }public function gettotalSslConnections()            {                return $this->totalSslConnections;            }public function getmaxStatementTimeExceeded()            {                return $this->maxStatementTimeExceeded;            }                public function setclient( $client )            {                $this->client = $client;            }public function settotalConnections( $totalConnections )            {                $this->totalConnections = $totalConnections;            }public function setconcurrentConnections( $concurrentConnections )            {                $this->concurrentConnections = $concurrentConnections;            }public function setconnectedTime( $connectedTime )            {                $this->connectedTime = $connectedTime;            }public function setbusyTime( $busyTime )            {                $this->busyTime = $busyTime;            }public function setcpuTime( $cpuTime )            {                $this->cpuTime = $cpuTime;            }public function setbytesReceived( $bytesReceived )            {                $this->bytesReceived = $bytesReceived;            }public function setbytesSent( $bytesSent )            {                $this->bytesSent = $bytesSent;            }public function setbinlogBytesWritten( $binlogBytesWritten )            {                $this->binlogBytesWritten = $binlogBytesWritten;            }public function setrowsRead( $rowsRead )            {                $this->rowsRead = $rowsRead;            }public function setrowsSent( $rowsSent )            {                $this->rowsSent = $rowsSent;            }public function setrowsDeleted( $rowsDeleted )            {                $this->rowsDeleted = $rowsDeleted;            }public function setrowsInserted( $rowsInserted )            {                $this->rowsInserted = $rowsInserted;            }public function setrowsUpdated( $rowsUpdated )            {                $this->rowsUpdated = $rowsUpdated;            }public function setselectCommands( $selectCommands )            {                $this->selectCommands = $selectCommands;            }public function setupdateCommands( $updateCommands )            {                $this->updateCommands = $updateCommands;            }public function setotherCommands( $otherCommands )            {                $this->otherCommands = $otherCommands;            }public function setcommitTransactions( $commitTransactions )            {                $this->commitTransactions = $commitTransactions;            }public function setrollbackTransactions( $rollbackTransactions )            {                $this->rollbackTransactions = $rollbackTransactions;            }public function setdeniedConnections( $deniedConnections )            {                $this->deniedConnections = $deniedConnections;            }public function setlostConnections( $lostConnections )            {                $this->lostConnections = $lostConnections;            }public function setaccessDenied( $accessDenied )            {                $this->accessDenied = $accessDenied;            }public function setemptyQueries( $emptyQueries )            {                $this->emptyQueries = $emptyQueries;            }public function settotalSslConnections( $totalSslConnections )            {                $this->totalSslConnections = $totalSslConnections;            }public function setmaxStatementTimeExceeded( $maxStatementTimeExceeded )            {                $this->maxStatementTimeExceeded = $maxStatementTimeExceeded;            }            }            ?>