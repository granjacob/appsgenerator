<?php


function IO_print_r( $object )
{
    echo "<xmp>";
    print_r( $object );
    echo "</xmp>";
}

function IO_xmpString( $text )
{
    echo "<xmp>";
    echo $text;
    echo "</xmp>";
}

function IO_printLine( $string=null )
{
    echo $string. "<br/>";
}

function IO_boldString( $string )
{
    return "<strong>" . $string . "</strong>";
}

function IO_toCamelCase($string, $capitalizeFirstCharacter = false)
{

    $str = str_replace(' ', '', ucwords(
        str_replace( '_', ' ',
            str_replace('-', ' ', strtolower(trim($string)))
        )
    ));

    if (!$capitalizeFirstCharacter) {
        $str[0] = strtolower($str[0]);
    }

    return $str;
}

function IO_toMethodName( $string )
{
    return IO_toCamelCase( $string );
}

function IO_toClassName( $string )
{
    return IO_toCamelCase( $string, true );
}

function IO_toFunctionName( $string )
{
    return IO_toCamelCase( $string );
}

function IO_toVariableName( $string )
{
    return IO_toCamelCase( $string );
}

spl_autoload_register(function ($class_name) {
    $filePath = strtolower( getcwd() . "\\" . $class_name . ".php" );
    include( $filePath  );
});


function exceptions_error_handler( $exception ) {
    IO_printLine( IO_boldString("File: ") . $exception->getFile() );
    IO_printLine( IO_boldString("Line: ") . $exception->getLine() );
    IO_printLine( IO_boldString("Error code: "). $exception->getCode() );
    IO_printLine();
    IO_printLine(
        IO_boldString("Exception occurred: " ) .
        ($exception instanceof \system\exception\SystemException ?
            $exception->getExceptionMessage() :
            $exception->getMessage())
    );

}

set_exception_handler('exceptions_error_handler');

?>