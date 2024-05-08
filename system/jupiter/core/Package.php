<?php

namespace system\jupiter\core;

use ArrayObject;
use system\jupiter\core\PackageFile;
use Exception;

class Package extends ArrayObject {

    public $basePath;

    public $name;


    public $parentPackage;

    protected $packagePath;


    public PackageFile $files;

    public function __construct()
    {
        parent :: __construct();
        $this->files = new PackageFile();
    }

    public function setPackagePath( $path )
    {
        $this->packagePath = $path;
    }

    public function getFullPath()
    {
        return $this->basePath . _bslash() . $this->packagePath;
    }

    public function setName( $packageName )
    {
        $this->name = strtolower( $packageName );
        $parts = explode( '.', $this->name );
        $this->packagePath = implode( _bslash(), $parts  );
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAsPath()
    {
        return getPackageNameAsPath(( $this->name ));
    }

    protected function make()
    {

    }

    public function scanFiles()
    {
        //print ' Scanning file for ' . $this->name . ' at ' . $this->getFullPath() . endl() . endl();

        if (is_dir( $this->getFullPath() )) {
            $paths = glob( $this->getFullPath() . _bslash() . "*" );


            foreach ($paths as $path) {
                if (!is_dir( $path )) {
                    $pathinfo = pathinfo( $path );
                    $newFile = new PackageFile();
                    $newFile->filename = $pathinfo['filename'];
                    $newFile->filenameExtension = $pathinfo['extension'];

                    if (strtolower( $newFile->filenameExtension ) !== "xml") {
                        throw new Exception("Non XML file found with name
                        '{$newFile->filename}.{$newFile->filenameExtension}'
                        .Templates must be defined on XML files only.");
                    }


                    $newFile->basePath = $pathinfo['dirname'];
                    $newFile->fullPath = $path;
                    $newFile->packageName = $this->name;
                    $filenameParts = explode( ".", $newFile->filename );
                    $newFile->language = $filenameParts[1];

                    if ($newFile->language === "" ||
                        $newFile->language === null) {
                            throw new Exception(
                                "{$newFile->filename}.xml is not a valid filename.
                                The filename must have a language defined on its name like *.%lang%.xml.");
                    }

                    if ($newFile->isValidSigned()) {
                        $this->files->append( $newFile );
                    }
                    else {
                        throw new Exception("Bad signature on file
                        <strong>{$newFile->filename}.xml</strong>, not a valid file for templates definition.
                        The file must be signed with the package '{$newFile->packageName}'
                         and language '{$newFile->language}'");
                    }

                    // is a file
                }
            }
        }
        else {
            print 'No information for package ' . $this->name .  ' (path=' . $this->getFullPath()  . ') was found.' . endl();
        }
    }
}
