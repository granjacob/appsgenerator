<?php

require("core.php");


$s = new \system\files\JavaFile();

$s->php_open();
//$s->declare_namespace("ProjectName");
//echo "namespace $ProjectName;";


//$s->declare_string_var( 'nombreVariable', 'Hola mundo!' );

/*$s->create_function(
    'NombreFuncion',
    'a,b,c',
    $s->return_value( $s->reference_var('a')) );*/

//$s->declare_function("nombreFuncion", "a,b,c" );
$s->create_function("testFunc"); $s->function_parameters(
    $s->__reference_var( "a" ) . ',' .
    $s->__reference_var( "b" )
);
$s->begin_function();
    $s->return_expression( $s->__reference_var("a") . '+' . $s->__reference_var("b") );
$s->end_function();

$s->declare_class( "BaseClass" );
$s->begin_class();
$s->public_attribute( "String", "nombre" );
$s->public_attribute( "String", "telefono" );
$s->public_attribute( "String", "numeroIdentificacion" );
$s->public_attribute( "Integer", "nroAfiliados" );
$s->public_attribute( "Double", "saldo" );

$s->public_attribute   ( "String", "nombre" )->
                    ___( "String", "telefono" )->
                    ___( "String", "numeroIdentificacion" )->
                    ___( "Integer", "nroAfiliados" )->
                    ___( "Double", "saldo" );

$s->end_class();

$s->declare_class( "ClassName" ); $s->extends_class( "BaseClass");
$s->begin_class();
    $s->public_method("methodName"); $s->method_parameters(
            $s->__method_parameter( "String",  "a" ) . "," .
            $s->__method_parameter( "Integer", "b" ) . "," .
            $s->__method_parameter( "Double",  "c" ) );
    $s->begin_method();
        $s->return_expression("null");
    $s->end_method();
$s->end_class();

$s->endTyping();

// echo "\$nombreVariable = 'Hola mundo!';";

// echo "\$nombreVariable = 'Hola mundo!';";

$s->declare_array( "array", "a,b,c,d,e" );
// echo "\$array = array(a,b,c,d,e);";
$s->php_close();

echo $s->getFileContent();

/*
$s->phpOpenTag();

echo $s->getFileContent();
*/
?>