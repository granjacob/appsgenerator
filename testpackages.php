<?php



require_once( "core.php" );


use system\jupiter\core\Snippet;
use system\jupiter\core\TokenString;
use system\jupiter\core\SnippetsManager;


?>
<!doctype html>
<html>
    <head>
        <style type="text/css">
            body {
                background-color:#aaa;
                color:black;
            }
        </style>
    </head>
    <body>
        
<?php


$snippetsManager = new SnippetsManager();

$snippetsManager->mainPath = getcwd() . _bslash() . "ganimedes";

$snippetsManager->outputPath = getcwd() . _bslash() . "system" . _bslash() . "uranus";


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
?>
    </body>
</html>



