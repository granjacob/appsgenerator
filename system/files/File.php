<?php

namespace system\files;


use system\exception\FileAlreadyOpenedException;
use system\SystemItem;

class File extends SystemItem {


    protected $filePath;
    protected $fileContent;

    public function __construct()
    {

    }

    public function load()
    {
        $this->fileContent = file_get_contents( $this->filePath );
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        if (!isset( $this->filePath ))
            $this->filePath = $filePath;
        else
            throw new FileAlreadyOpenedException();
    }

    /**
     * @return mixed
     */
    public function getFileContent()
    {
        return $this->fileContent;
    }

    /**
     * @param mixed $fileContent
     */
    public function setFileContent($fileContent)
    {
        $this->fileContent = $fileContent;
    }

    public function appendLine( $line )
    {
        $this->fileContent .= $line . "\r\n";
    }

    public function append($content)
    {
        $this->fileContent .= $content;
    }

    function open( $mode=null )
    {

    }

    function write()
    {
        file_put_contents( $this->filePath, $this->fileContent );
    }



}

?>