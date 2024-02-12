<?php

require_once("core.php");

use system\jupiter\core\Snippet;

class Package extends ArrayObject {

    public $basePath;

    public $name;

    public $snippets;

    protected $packagePath;

    public function __construct()
    {
        parent :: __construct();
        $this->snippets = new Snippet();
    }

    public function getFullPath()
    {
        return $this->basePath . _bslash() . $this->packagePath;
    }

    public function setName( $packageName )
    {
        $this->name = $packageName;
        $parts = explode( '.', $packageName );
        $this->packagePath = implode( _bslash(), $parts  );       
        print 'Package name ' . $this->name . endl();
        print 'Package path ' . $this->basePath . endl();
        print 'Package fullpath ' . $this->getFullPath() . endl();         
    }

    public function getName()
    {
        return $this->name;
    }

    protected function make()
    {

    }
}



class SnippetsManager extends Snippet {
    public string $mainPath;

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
    public function addPackage( $package )
    {
        if (!$this->packageExists( $package )) {
            $this->packages[$package->name] = clone $package;
        }
        else {
            throw new Exception("Package already exists.");
        }
    }

    public  function removePackage( $packageName )
    {
        if (isset( $this->packagesNames[$packageName] )) {
            unset( $this->packages[$packageName] );
        }
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

    }
}





$snippetsManager = new SnippetsManager();

$snippetsManager->mainPath = getcwd() . _bslash() . "projects";

print $snippetsManager->mainPath . endl();

$snippetsManager->make();






