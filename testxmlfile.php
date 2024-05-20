<?php

require_once( "core.php" );

$dom = new DOMDocument;
$dom->load('snippets.xml');
if ($dom->validate()) {
    echo "This document is valid!\n";
}
?>