<?php

libxml_use_internal_errors(TRUE);

$xml = new DOMDocument();
$xml->validateOnParse = true;
$xml->load( "shiporder.xml" );
if ($xml->validate()) {
    print 'is is valid...';
}
else {
    print 'Not valid!';
}

var_dump(libxml_get_errors());


?>