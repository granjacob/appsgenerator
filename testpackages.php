<?php

require_once("core.php");

use system\jupiter\core\Snippet;

class Package extends ArrayObject {
    public $name;

    public $snippets;

    public function __construct()
    {
        parent :: __construct();
        $this->snippets = new Snippet();
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

    public function validPackage( $packageName )
    {
        return true;
    }

    /**
     * $packageName format must be in the following format:
     * 
     * a.b.c 
     * example.one.and.you
     */
    public function addPackage( $packageName )
    {
        if ($this->validPackage( $packageName )) {
            $this->packagesNames[$packageName] = $packageName;
        }
    }

    public  function removePackage( $packageName )
    {
        if (isset( $this->packagesNames[$packageName] )) {
            unset( $this->packagesNames[$packageName] );
        }
    }

    /**
     * This method validates that the mainPath defined has a valid structure an definition of objetcs.
     * 
     * Rules:
     * 
     * 1) A package is defined with nested folders.
     *  example:
     *  - packageName a.b.c.d
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
     */
    public function preloadValidate()
    {

    }
}

$snippetsManager = new SnippetsManager();

$snippetsManager->$mainPath = getcwd() . _bslash() . "projects";

print $snippetsManager->mainPath . endl();




