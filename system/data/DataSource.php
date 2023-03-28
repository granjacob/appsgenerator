<?php

namespace system\data;

use system\SystemItem;

class DataSource extends SystemItem {
    protected $username;
    protected $password;
    protected $host;
    protected $port;
    protected $databaseName;
    protected $dsn;
    protected $charset;
    protected $options;
    protected $applicationPackages;
    protected $isDefault;

    public function __construct()
    {
        $this->charset = "utf8mb4";
        $this->applicationPackages = array();
        $this->isDefault = false;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @param mixed $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     * @return mixed
     */
    public function getDsn()
    {
        return $this->dsn;
    }

    /**
     * @param mixed $dsn
     */
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
    }

    public function buildDSN()
    {
        return
            "mysql:host=" . $this->host .
            ";dbname=" . $this->databaseName .
            ";charset=" . $this->charset;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getApplicationPackages()
    {
        return $this->applicationPackages;
    }

    /**
     * @param array $applicationPackages
     */
    public function setApplicationPackages($applicationPackages)
    {
        $this->applicationPackages = $applicationPackages;
    }

    public function addApplicationPackage( $package )
    {
        array_push( $this->applicationPackages, $package );
    }

    public function hasPackage( $package )
    {

    }

    /**
     * @return false
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param false $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }


}

?>