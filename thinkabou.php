<?php


$text = "texto cualquiera con {{::}} mas texto con {{:(ClassName)VariableName:}} mas variables {{:hola:}} and maybe this too {{:skdskj:}}";


function toRegex( $str )
{
    $ret = "";
    for ($i = 0; $i < strlen( $str ); $i++) {
        $ret .= "\\" . $str[$i];
    }
    return $ret;
}

function makeRegex( $regex )
{
    return "/" . $regex . "/";
}

$variableRegex = "([a-zA-Z_$][a-zA-Z_0-9]*)";
$classnameRegex = $variableRegex;
$variableOpen =

$regexVariable = makeRegex(

    toRegex( "{{:" ) . "(" .
    toRegex( "(" ) . $classnameRegex . toRegex( ")" ) . ")*" .  $variableRegex .
    toRegex( ":}}" ) );

print $regexVariable;

$matches = array();

$expr = preg_match_all($regexVariable, $text, $matches, PREG_OFFSET_CAPTURE);

print_r( $matches );