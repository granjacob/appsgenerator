<?php

require_once( "core.php" );


use \system\jupiter\core\TemplateFileValidator;

//$filename = getcwd() . _bslash() . "xmldefs" . _bslash() . "snippets.xml";
$baseWorkingPath = getcwd() . _bslash() . "samplepackages" . _bslash();
$filename = $baseWorkingPath . "com\\java\\sample2\\Template.java.seed";

if (TemplateFileValidator :: isSeedFile( $filename )) {
    print 'Is valid named seed file ' . $filename . endl();
}
else {
    print 'Not valid seed file ' . $filename . endl();
}
//TemplateFileValidator :: isValidTemplateFile( $filename );

if (TemplateFileValidator :: isSeedFileValidSigned(
    $filename,
    $baseWorkingPath)) {
    print 'is valid signed...';
}
else {
    print 'not valiwwwd...';
};




?>