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
    print 'Including ' . $filePath;
    include( $filePath  );
});





error_reporting(E_ALL);

define('VAR_DEF_OPEN', '{{:');
define('VAR_DEF_CLOSE', ':}}');
define('OPT_DEF_OPEN', '[[');
define('OPT_DEF_CLOSE', ']]');
define('TYPE_DEF_OPEN', '(');
define('TYPE_DEF_CLOSE', ')');

define('PHP_FILE_OPEN', '<?php');
define('PHP_FILE_CLOSE', '?>');


define('COND_DEF_OPEN', '~(?');
define('COND_DEF_CLOSE', '?)~');



function camelize($str)
{
    $finalStr = "";
    $str = ucwords($str);
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] !== '-' && $str[$i] !== '_') {
            $finalStr .= $str[$i];
        } else {
            if ($i !== (strlen($str) - 1)) {
                $str[$i + 1] = ucwords($str[$i + 1]);
            }
        }
    }
    return $finalStr;
}

function camelizeAsVariableName($str)
{
    $temp = camelize($str);
    $temp[0] = strtolower($temp[0]);
    return $temp;
}

function camelizeAsMethodName($str)
{
    return camelizeAsVariableName($str);
}



function endl($times = 1)
{
    return __rpt("\n", $times);
}


function __print($str)
{

    $finalPrint = "";
    $str = str_replace("\r", "", str_replace("\"", "\\\"", $str));
    $lines = explode("\n", $str);
    foreach ($lines as $line) {
        $line = ($line);
        $finalPrint .= endl() . 'print ' . '"' . $line . '\n";';
    }
    return $finalPrint;
}


function __ln($count, $chr)
{
    $result = '';
    $result .= endl();

    for ($i = 0; $i < $count; $i++) {
        $result .= $chr;
    }
    $result .= endl();
    return $result;
}

function __rpt($chr, $count)
{
    $result = '';

    for ($i = 0; $i < $count; $i++) {
        $result .= $chr;
    }

    return $result;
}

function _tab($times = 1)
{
    return __rpt("\t", $times);
}

function _print($output)
{
    $finalPrint = "";
    $lines = explode("\n", $output);
    foreach ($lines as $line) {
        $finalPrint .= endl() . "print '" . $line . "';";
    }
    return $finalPrint;
}


$defaultConditionals = array(
    'notlast',
    'notfirst',
    'notempty',
    'empty',
    'last',
    'first',
    'selected',
    'notselected',
    'disabled',
    'notdisabled',
    'customCondition'
);


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