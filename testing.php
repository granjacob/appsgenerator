<?php

require_once( "core.php" );


use system\jupiter\core\TokenString;
//    require("PHPAS.php");
?>
<!doctype html>
<html>

<head>
    <style type="text/css">
        body {
            background-color: #222;
            color: #00eeff;
        }
    </style>
</head>

<body>

    <?php



    $do = new TokenString();
    $do->snippetsXMLFile = "archivoejemplo.xml";
    $do->loadSnippets();
    //$do->content = $input;
    $do->snippetName = 'TestForConditionalToken';
    /*//$do->data = $json;*/
    $result = $do->make();


    //print_r( $do );
    


    //print $autoStyle->loadString($do->generateClass()) ."\n";
    

    print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
    print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
    print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
    print '<xmp>';

    $do->generateClasses();
    // print_r( $do );
    print '</xmp>';




    ?>

</body>

</html>