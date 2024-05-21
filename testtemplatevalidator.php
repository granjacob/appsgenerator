<?php

require_once( "core.php" );


use \system\jupiter\core\TemplateFileValidator;

//$filename = getcwd() . _bslash() . "xmldefs" . _bslash() . "snippets.xml";
$filename = getcwd() . _bslash() . "example.php.seed";

if (TemplateFileValidator :: isSeedFile( $filename )) {
    print 'Is valid named seed file ' . $filename . endl();
}
else {
    print 'Not valid seed file ' . $filename . endl();

}
//TemplateFileValidator :: isValidTemplateFile( $filename );

if (TemplateFileValidator :: isSeedFileValidSigned(
    "D:\\Windows\\com\\java\\src\\impl\\Template.java.seed",
    "D:\\Windows\\")) {
    print 'is valid signed...';
}
else {
    print 'not valiwwwd...';
};




?>