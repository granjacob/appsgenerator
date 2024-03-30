<?php

require_once( "core.php" );


use system\jupiter\core\Snippet;
use system\jupiter\core\TokenString;


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



class SnippetsManager extends Snippet {
    public string $mainPath;

    public string $outputPath;

    public $languages = array();

    public $packagesNames = array();

    /**
     * $snippetNames[packageName][objectName] = objectName;
     */
    public $snippetNames = array();

    public Package $packages;

    public function __construct()
    {
        parent :: __construct();
        $this->packages = new Package();
    }

    public function getListOfPackages()
    {
        if (is_array( TokenString :: $snippets ))
            return array_keys( TokenString :: $snippets );
        //return $this->packagesNames;
    }

    public  function validLanguage( $lang )
    {
        return true;
    }

    public  function addLanguage( $lang )
    {
        if ($this->validLanguage( $lang ))
            $this->languages[$lang] = $lang;
    }

    public  function removeLanguage( $lang )
    {
        if (isset( $this->languages [$lang] )) {
            unset( $this->languages[$lang] );
        }
    }

    public function packageExistsByName( string $packageName )
    {
        return isset( $this->packages[$packageName] ); 
    }

    public function packageExists( Package $package )
    {
        return isset( $this->packages[$package->name] ) &&
            get_class( $this->packages[$package->name] ) === Package::class; 
    }

    public function validPackageName( $packageName )
    {
        return true;
    }

    /**
     * $packageName format must be in the following format:
     * 
     * a.b.c 
     * example.one.and.you
     */
    public function addPackage( Package $package, $parentPackage=false )
    {


        $test = $package->name;
        $parts = explode( '.', $test );
        $packagePaths = array();
        
        for ($i = 1 ; $i < count( $parts ); $i++) {

            $parentPackagePath = implode( _bslash(), array_slice( $parts, 0, count( $parts ) - $i ) ) ;

            array_push( $packagePaths, $parentPackageName = 
                implode( ".", array_slice( $parts, 0, count( $parts ) - $i ) ) );
            if ($i == 1) {
                $package->parentPackage = $parentPackageName;
            }
            $parentPackage = clone $package;
            $parentPackage->name = $parentPackageName;
            $parentPackage->files = new PackageFile();
            $parentPackage->setPackagePath( $parentPackagePath );
            $this->addPackage( $parentPackage );
        }

        if (!$this->packageExists( $package )) {
            
            if (!is_dir( $package->getFullPath() ))
            {
                mkdir( $package->getFullPath() );   // creates the package for dir if not exists
            }
            $this->packages[$package->name] = clone $package;
        }

    }

    public  function removePackage( $packageName )
    {
        if (isset( $this->packagesNames[$packageName] )) {
            unset( $this->packages[$packageName] );
        }
    }


    public function getPackage( $packageName )
    {
        return $this->packages[$packageName];
    }

    /**
     * This method validates that the mainPath defined has a valid structure an definition of objetcs.
     * 
     * Rules:
     * 
     * 1) A package is defined with nested folders.
     *  example:
     *  - packageName a+b+c+d
     *  - Folder name:  /a/b/c/d
     * 
     * 2) File names for snippets must have the programming language that is defined for. 
     *    Script will not verify the type or the structure of the language used in a template, the language is simply
     *    an orgnization way to group the templates.
     * 
     * examples of filenames:
     *  - FileName.cpp.xml, FileName.java.xml, FileName.php.xml
     *  - ModuleController.java.xml, ModuleController.functions.php.xml, ModuleController.attributes.php.xml 
     * 
     * 3) Every filename for template(s) must have a package, void package are not valid.
     * 
     * example:
     *  - packageName: system.functions
     *  system/functions/HeavyFunctions.php.xml
     *  system/functions/HeavyFunctions.java.xml
     *  general/Main.cpp.xml
     *  general/Main.php.xml
     * 
     * 4) All languages defined must have the same templates defined.
     * 
     * This rule means that IN TOTAL all the templates defined on files must be equivalent between languages.
     * 
     * example:
     *  - Language defined: php, java
     *  - package/example/AllTemplatesForPhp.php.xml
     *      Template1
     *      Template2
     *      Template3
     *      TemplateN
     *  - package/example/Part1ForJava.java.xml
     *      Template1
     *      TemplateN
     *  - package/example/Part2ForJava.java.xml
     *      Template2
     *      Template3
     * 
     * As you can see php and java has the same templates defined. 
     * Note: script doesn't check templates content equivalence between them or 
     * language used inside the templates, that is total responsibility of the developer. 
     * 
     * 5) You can use separated files for defined templates in a package and different languages.
     * 
     * As defined above in the 4) topic you get:
     * 
     * example:
     *  - Language defined: php, java
     *  - package/example/AllTemplatesForPhp.php.xml
     *  - package/example/Part1ForJava.java.xml
     *  - package/example/Part2ForJava.java.xml
     * 
     * 6) The filename is irrelevant for define the templates
     * Filename for templates no matter, the important is the content of the template files.
     * 
     * Each file must be signed with the package name and the language
     * 
     * package/example/MyTemplatesForPhp.php.xml
     * <snippets package="package.example" language="php"> ... </snippets>
     * 
     * This means that the file MyTemplateForPhp.php.xml is located in the folder /package/example 
     * and the language "php" is the same defined inside the filename *.php.*, filename no matter.
     * 
     * Example for different filename, for other language but the same package:
     * 
     * package/example/File1.cpp.xml 
     *      <snippets package="package.example" language="cpp"> ... </snippets>
     * 
     * package/example/File2.cpp.xml
     *      <snippets package="package.example" language="cpp"> ... </snippets>
     * 
     * 7) All templates defined between languages must be equivalent in name and count.
     * 
     * 8) Folder for packages can be named as partial part of the full package name or with directories combination.
     * 
     * Example if the package name is: a+b+c+d
     * 
     * you can create the folder of this package in many ways like
     * a/b/c/d - Something here is for a+b+c+d package 
     * a+b/c+d - Something here is for c+d part of a+b+c+d
     * a+b+c/d - Something here is for d part of the package name a+b+c+d
     * a/b+c/d - Somethng here is for d part (again) of the package name a+b+c+d
     * a/b+c+d - Something here is for b+c+d part of the package name a+b+c+d
     * a/b/c+d - Something here is for c+d part of the package name a+b+c+d
     * a+b     - Something here is for a+b part of the package a+b+c+d, but it is package a+b too
     * a/b      - Something here is for b part of the package a+b and the package a+b+c+d,
     *           this is the package a+b too
     */
    public function make( $expressionStr=null )
    {
        $package = new Package();
        $package->basePath = $this->mainPath;
        $package->setName( 
            "com.java.project.controllers.interfaces"
        );

        $this->addPackage( $package );
        $package->setName( 
            "com.java.project.controllers.impl"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.java.project.services.impl"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.java.project.services.interfaces"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.java.project.repositories.interfaces"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.java.project.repositories.impl"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.java.project"
        );
        $this->addPackage( $package );


        $package->setName( 
            "com.ibm.infraestructure"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.ibm.infraestructure.code"
        );
        $this->addPackage( $package );

        $package->setName( 
            "com.ibm.infraestructure.replica"
        );
        $this->addPackage( $package );

    }

  /*  public function validatePackagesSignatures()
    {
        foreach ($this->packages as $package) {
            $package->scanFiles();            
        }
    }*/

    public function scanPackages()
    {
        $processed = array();

        $allPackageFolders = rglob( $this->mainPath . _bslash() . "*" );


        foreach ($allPackageFolders as $path) {

                $extensionIsValid = false;

                $pathinfo = pathinfo( $path );

                if (isset(  $pathinfo['extension'] )) {
                    $filenameForScan = $pathinfo['filename'] . '.'  . $pathinfo['extension'];

                    $extensionIsValid = $this->isValidFileExtension( $pathinfo['extension'] );
                }


                $packageTemp = $this->getPackageNameFromPath( $path );  
                
                if (!$this->packageExistsByName( $packageTemp )) {

                    $newPackage = new Package();
                    $newPackage->name = $packageTemp;
                    $newPackage->basePath = $this->mainPath;
                    $newPackage->setPackagePath( str_replace( ".", _bslash(), $newPackage->name ) );
                    $this->addPackage( $newPackage );
                }

                if (!isset( $processed[$packageTemp] ) && 
                    $packageTemp !== null && $packageTemp !== "" &&
                    isset( $this->packages[$packageTemp] )) {      
                    $this->packages[$packageTemp]->scanFiles();
                    $processed[$packageTemp] = $packageTemp;
                }


        }
    }

    public function loadTemplates()
    {
        foreach ($this->packages as $keyPackage => $package) {
            $files = glob( $package->getFullPath() . _bslash() . '*' );
            foreach ($files as $file) {

                if (!is_dir( $file )) {
                    $do = new TokenString();
                    $do->packageName = $package->name;
                    $do->snippetsXMLFile = $file;
                    $do->loadSnippets();
                    //$do->generateClasses( $this->outputPath . _bslash() . $package->getNameAsPath() );
                    //TokenString::$snippets = array();
                }
            }
           // print endl();
        }  
        
    }

    public function loadAndGenerateClasses()
    {
        $this->generateClasses( $this->outputPath  );                
    }

    public function isValidFileExtension( $extension )
    {
        return $extension === 'xml';
    }

    public function getPackageNameFromPath( $path )
    {
        $pathinfo = pathinfo( $path ); 

        $result = null;
        if (isset( $pathinfo['extension']) &&
            $this->isValidFileExtension( $pathinfo['extension'] )) {
            $filenameReplace = $pathinfo['filename'] . '.' . $pathinfo['extension'];

            $path = str_replace(  $filenameReplace, "", $path  );
        }
        
        $result = str_replace( $this->mainPath, "", $path );
        $result = ( str_replace( _bslash(), '.', trim( $result, _bslash() ) ) );
        

         
        return strtolower( $result );
    }

    public function getPackageNameFromPath2( $path )
    {
        $pathinfo = pathinfo( $path ); 

        $result = null;
        if (isset( $pathinfo['extension'])) {
            return $path; 
        }
        else {
            $result = str_replace( $this->mainPath, "", $path );
            $result = ( str_replace( _bslash(), '.', trim( $result, _bslash() ) ) );
        }

        return $result;
    }
}


?>
<!doctype html>
<html>
    <head>
        <style type="text/css">
            body {
                background-color:#660033;
                color:#eee;
            }
        </style>
    </head>
    <body>
        <xmp>
<?php


$snippetsManager = new SnippetsManager();

$snippetsManager->mainPath = getcwd() . _bslash() . "pruebas";

$snippetsManager->outputPath = getcwd() . _bslash() . "system" . _bslash() . "titan";


$snippetsManager->make();

$snippetsManager->scanPackages();
$snippetsManager->loadTemplates();

$snippetsManager->loadAndGenerateClasses();


//print_r( TokenString :: $snippets );
//print_r( $snippetsManager->getListOfPackages() );

/*
use system\europa\com\subpackage\HelloWorld;

$h = new HelloWorld(); 
$h->write();
*/
?></xmp>
    </body>
</html>



