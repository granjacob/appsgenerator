<?php

namespace system\jupiter\core;

use ArrayObject;
use DOMDocument;
use Exception;

class PackageFile extends ArrayObject {

    public $filename;

    public $filenameExtension;

    public $fullPath;

    public $basePath;

    public $fileContent;

    public $packageName;

    public $language;

    public function getFullFilename()
    {
        return $this->filename . "." . $this->filenameExtension;
    }

    public function getPackageName()
    {
        return $this->packageName;
    }


    public function getPackageNameAsPath()
    {
        return str_replace( '.', _bslash(), $this->packageName );
    }




    public function isValidSigned($filename = null)
    {

        if ($filename === null) {
            $filename = $this->fullPath;
        }

        $xml = new DOMDocument();

        try {
            $xml->load($filename);
        }

        catch (Exception) {
            return false;
        }
        print 'filename = ' . $filename . endl();
        $snippets = $xml->getElementsByTagName('snippets');

        $result = false;
        foreach ($snippets as $snippet) {

            $result = ($snippet->getAttribute('package')  === $this->packageName &&
            ($snippet->getAttribute('lang') === $this->language ||
            $snippet->getAttribute('language') === $this->language));

        }
        return $result;

    }

}