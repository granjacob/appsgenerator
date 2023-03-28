<?php

function funcCall( $param )
{
    return "Hello world! $param";
}


echo funcCall( funcCall( funcCall("START" ) ) . "hola mundo!" );



?>