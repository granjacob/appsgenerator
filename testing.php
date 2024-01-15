
<!doctype html>
<html>
    <head>
        <style type="text/css">
        body {
            background-color:#222;
            color:#00eeff;
        }
        </style>
    </head>
    <body>

<?php


error_reporting(E_ALL);

define( 'VAR_DEF_OPEN','{{:' );
define( 'VAR_DEF_CLOSE',':}}' );
define( 'OPT_DEF_OPEN','[[' );
define( 'OPT_DEF_CLOSE',']]' );
define( 'TYPE_DEF_OPEN', '(' );
define( 'TYPE_DEF_CLOSE', ')' );



class SingleToken extends TokenString {

    public function __construct( $content )
    {
        parent :: __construct();
        $this->content = $content;
    }

    public function make(  $expressionStr=null )
    {
        $this->value = $this->content;
    }

}

class VariableToken extends TokenString {

    public function __construct()
    {
        parent :: __construct();
    }
    public function make(  $expressionStr=null )
    {
        $this->value = $this->jsonParameters[$this->name];
    }

}


class CompoundVariableToken extends TokenString {


    public function __construct()
    {
        parent :: __construct();
    }
 /*   public function make(  $expressionStr=null )
    {
        $this->value = $this->jsonParameters[$this->name];
    }*/

}

class OptionalToken extends TokenString {
    
    public function __construct()
    {
        parent :: __construct();
    }

}

class Snippet extends TokenString {

    public function __construct()
    {
        parent :: __construct();
    }
}


class TokenString  {

    public $id;
	public $name;
	public $content;
	public $value;

	public $posStart;
	public $posEnd;

    public $tokens;

    public $type;

    public $jsonParameters;

    public $jsonStructure;

    public $snippetsXMLFile;

    public static $snippets;

    public $snippetName;

    public function __construct()
    {
        $this->tokens = array();
    }   


    public function catchDefExpr( $expressionStr, $offset, $def )
    {
        return substr( $expressionStr, $offset, strlen( $def ) );
    }

    public function loadSnippets( $filename=null )
    {
        if ( $filename === null ) {
            $filename = $this->snippetsXMLFile;
        }
                
        $xml = new DOMDocument();
       
        $xml->load($filename);

        $snippets = $xml->getElementsByTagName('snippet' );

        foreach ($snippets as $snippet) {
            $newSnippet = new Snippet();
            $newSnippet->content = $snippet->nodeValue;
            TokenString :: $snippets[$snippet->getAttribute('name')] = $newSnippet;
        }
    }


    public function buildExpressionDefinition( 
        $expressionStr, &$offset, $defOpen, $defClose, $exprClass, $id  )
    {
        $posStart = $offset;
        
        $posEnd = strpos( 
            $expressionStr, 
            $defClose, 
            $offset ) + strlen( $defClose );

        $varName = substr( 
                $expressionStr, 
                $posStart  + strlen( $defOpen ), 
                $posEnd - $posStart - strlen( $defClose ) - strlen( $defOpen ) );
        
        $var = new $exprClass();
        $var->posStart = $posStart;
        $var->posEnd = $posEnd;
        $var->name = $varName;
        $var->id = $id;
        $offset = $posEnd - 1;
        
        return $var;
    }

    public function addSingleToken( &$tokensArray, &$content, &$id )
    {
        if (strlen( $content ) > 0) {
            $newSingleToken = new SingleToken( $content );
            $newSingleToken->id = $id;
            $id++;
            array_push( $tokensArray, $newSingleToken );   
        }
        $content = "";
    }

    public function isValidDigitForVariableName( $chr )
    {
        if (ctype_alnum( $chr ) || $chr == '_' || $chr == '-')
            return true;
        return false;
    }

    public function logSyntaxError( $msg, $expressionStr, $currentIndex )
    {
        print '<strong>Syntax error:</strong> ' . $msg . "<br/>\r\n";
        print '<strong>Check></strong> "' . substr( $expressionStr, max(0, $currentIndex - 8), min( strlen( $expressionStr ) - $currentIndex , 16 ) ) . '", index: ' . $currentIndex . "<br/>\r\n";
    }

    public function validateExpression( $expressionStr=null )
    {
        if ($expressionStr === null)
            $expressionStr = $this->content;

        $isValid = true;

        $countValidationVar = 0;
        $countValidationType = 0;
        $countValidationOpt = 0;
        $currentVariableLength = 0;
        $currentTypeLength = 0;

        $currentVariableName = "";
        $currentTypeName = "";

        for ($i = 0; $i < strlen( $expressionStr ); $i++) {
            $evalExpr_varDefOpen = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_OPEN );

            $evalExpr_varDefClose = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_CLOSE );
            $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_CLOSE );

            $evalExpr_typeDefOpen = $this->catchDefExpr( $expressionStr, $i, TYPE_DEF_OPEN );
            $evalExpr_typeDefClose = $this->catchDefExpr( $expressionStr, $i, TYPE_DEF_CLOSE );

            
            // variable definition
            if ($evalExpr_varDefOpen === VAR_DEF_OPEN && $countValidationVar == 0 && $countValidationType == 0) {
                $countValidationVar++;
                $i += strlen( VAR_DEF_OPEN ) - 1;
                continue;
            }

            // variable definition close
            if ($evalExpr_varDefClose === VAR_DEF_CLOSE && $countValidationVar == 1 && $countValidationType == 0) {
                if ($currentVariableLength == 0) { 
                    $this->logSyntaxError( 'Variable definition cannot have an empty name.', $expressionStr, $i );

                    return false;   // --> variable doesn't have name
                }

                $currentVariableName = "";
                $currentVariableLength = 0;
                $countValidationVar--;
                $i += strlen( VAR_DEF_CLOSE ) - 1;
                continue;
            }


            // type definition
            if ($evalExpr_typeDefOpen === TYPE_DEF_OPEN && $countValidationVar == 1 && $countValidationType == 0) {
                $countValidationType++;
                $i += strlen( TYPE_DEF_OPEN ) - 1;
                continue;
            }
            if ($evalExpr_typeDefClose === TYPE_DEF_CLOSE && $countValidationVar == 1 && $countValidationType == 1) {
                if ($currentTypeLength == 0) { 
                    $this->logSyntaxError( 'Type definition cannot have an empty name.', $expressionStr, $i );

                    return false;   // --> variable doesn't have name
                }

                $currentTypeName = "";
                $currentTypeLength = 0;
                $countValidationType--;
                $i += strlen( TYPE_DEF_CLOSE ) - 1;
                continue;
            }

            if (!$this->isValidDigitForVariableName($expressionStr[$i]) && $countValidationVar == 1 && $countValidationType == 1) {
                print $currentTypeName . "<br/>\r\n";
                $this->logSyntaxError( 'Variable type specified not valid.', $expressionStr, $i );
                return false;
            }
            else 
            if ($countValidationType == 1) {
                $currentTypeName .= $expressionStr[$i];
                $currentTypeLength++;
            }

            // cannot give a name to a variable incorrectly
            if (!$this->isValidDigitForVariableName($expressionStr[$i]) && $countValidationVar == 1 && $countValidationType == 0) {
                $this->logSyntaxError( 'Variable name not valid.', $expressionStr, $i );
                return false;
            }
            else 
            if ($countValidationVar == 1 && $countValidationType == 0) {
                $currentVariableName .= $expressionStr[$i];

                $currentVariableLength++;
            }

            // optional section definition
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN && $countValidationVar == 0) {
                $countValidationOpt++;
                $i += strlen( OPT_DEF_OPEN ) - 1;
                continue;
            }
            
            // fail optional section definition inside a variable
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN && $countValidationVar == 1) {
                $this->logSyntaxError( 'Cannot open an optional definition (' . OPT_DEF_OPEN . ') inside a variable.', $expressionStr, $i );

                return false;
            }

            // fail
            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && $countValidationOpt > 0 && $countValidationVar == 0) {
                $countValidationOpt--;
                $i += strlen( OPT_DEF_CLOSE ) - 1;
                continue;
            }

            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && ($countValidationOpt == 0 || $countValidationVar == 1)) {
                $this->logSyntaxError( 'Syntax error: Cannot close an optional section "' . OPT_DEF_CLOSE . '" without open it before.', $expressionStr, $i );

                return false;
            }

        }

        if ($countValidationVar == 0 && 
            $countValidationOpt == 0 &&
            $countValidationType == 0 && 
            $currentVariableLength == 0) {
            return true;
        }
        else 
        {
            if ($countValidationVar !== 0) {
                print '<strong>Check></strong>Some variable definition is wrong.';
                exit;
            }

            
            if ($countValidationType !== 0) {
                print '<strong>Check></strong>Some variable type is wrong.';
                exit;
            }

            if ($countValidationOpt !== 0) {
                print '<strong>Check></strong>Some optional expression is not correctly defined.';
                exit;
            }

        }

        print $countValidationVar . " : " . $countValidationOpt . " : " . $currentVariableLength . "<br/>";
        
        return false;

    }

    public function make( $expressionStr=null )
    {
        $jsonStructure = "{}";

        if ($this->snippetName != null) {
            $this->content = TokenString::$snippets[$this->snippetName]->content;
        }
        
        if ($expressionStr === null)
            $expressionStr = $this->content;

        if (!$this->validateExpression( $expressionStr )) {
            return false;
        }


        

        $k = 0;
        $var = null;
        $singleToken = "";
        for ($i = 0; $i < strlen( $expressionStr ); $i++) {
            $evalExpr_varDefOpen = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_OPEN );

            $evalExpr_varDefClose = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_CLOSE );
            $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_CLOSE );

            if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {

           /*     $var = $this->buildExpressionDefinition( 
                    $expressionStr, $i, 
                    VAR_DEF_OPEN, 
                    VAR_DEF_CLOSE, 
                    VariableToken::class, $k );*/


                    $posStart = $i;
        
                    $posEnd = strpos( 
                        $expressionStr, 
                        VAR_DEF_CLOSE, 
                        $i ) + strlen( VAR_DEF_CLOSE );
            
                    $varName = substr( 
                            $expressionStr, 
                            $posStart  + strlen( VAR_DEF_OPEN ), 
                            $posEnd - $posStart - strlen( VAR_DEF_CLOSE ) - strlen( VAR_DEF_CLOSE ) );

                    $exprClass =   VariableToken::class;      


                    $matches = array();
                    $expr = preg_match_all( "/\(([a-z|A-Z|0-9|\-|\_]*)\)([a-z|A-Z|0-9|\-|\_]*)/", $varName, $matches );
                    
                    $snippetName = null;
                    $variableName = $varName;

                    if (is_array( $matches[1] ) && count( $matches[1] ) == 1)
                        $snippetName = $matches[1][0];
                    if (is_array( $matches[2] ) && count( $matches[2] ) == 1) {                    
                        $variableName = $matches[2][0];
                    }
                    else {
                        $variableName = $varName;
                    }

                    if ($snippetName !== null && $variableName !== null) {
                        $exprClass = CompoundVariableToken::class;                        
                    }

                    
                    $var = new $exprClass();
                    $var->posStart = $posStart;
                    $var->posEnd = $posEnd;
                    $var->name = $variableName;
                    if (get_class( $var ) == CompoundVariableToken::class) {
                        $var->snippetName = $snippetName;
                        $var->make();
                    }
                    $var->id = $k;


                    $i = $posEnd - 1;


                $k++;

                
                $this->addSingleToken( $this->tokens, $singleToken, $k );
                array_push( $this->tokens, $var );
            }
            else 
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                $qOptOpenCount = 0;
                for ($j = $i; $j < strlen( $expressionStr ); $j++) {
                    $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $j, OPT_DEF_CLOSE ); 
                    $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $j, OPT_DEF_OPEN ); 
                    if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                        $qOptOpenCount++;
                        $j += strlen( OPT_DEF_OPEN ) - 1;
                    }
                    else 
                    if ($evalExpr_optDefClose === OPT_DEF_CLOSE) {
                        
                        $qOptOpenCount--;
                    
                        if ($qOptOpenCount === 0) {
                           
                            $optExpr = new OptionalToken();
                            $optExpr->content = substr( 
                                $expressionStr, 
                                $i + strlen( OPT_DEF_OPEN ), 
                                $j - $i - strlen( OPT_DEF_CLOSE )
                                );
                            $optExpr->posStart = $i;
                            $optExpr->posEnd = $j + strlen( OPT_DEF_CLOSE ) - 1;
            
                            $k++;
                            $optExpr->make( $optExpr->content );
                            $this->addSingleToken( $this->tokens, $singleToken, $k );
                           
                            array_push( $this->tokens, $optExpr );
                            $j += strlen( OPT_DEF_CLOSE ) - 1;
                            break;
                        }
                        
                        $j += strlen( OPT_DEF_CLOSE ) - 1;
                    }
                }
                $i = $j;
            }
            else {
                $singleToken = $singleToken . $expressionStr[$i];
            }
        }
    } 
}
 

$input =  "AAA[[FIRST_VARIABLE{{:nombreVar:}}[[{{:otra_variable_inside:}}]]]][[A]]X[[B]]XX[[C]]XXX[[Desta es una prueba]]Y{{:variable:}},Q{{:variable:}},M{{:variable:}},ZZ{{:variable:}},TT{{:variable:}}QQ[[que tienes {{:variable:}} que me encanta [[quizas sabes algo]]]]RRRRR{{:permite:}}ZZZZcambiar cada uno de susQ{{:valores:}}YYYYvamos a ver si funcionaTTT{{:ojala:}}RRRR{{:funcione:}},JJJJ[[extends {{:welcome_to_the_jungle:}}]]QQW{{:porque:}},FGFSnecesito avanzar enERRE{{:esto:}} [[[[{{:esto_es_una_variable:}}]] un opcional juntos [[extends {{:asdasd:}}]]]] otra prueba es [[[[[[esta es una super prueba{{:welcome:}}]]]]]]

El software permite administrar los {{:empleados:}} de la {{:empresa:}}, para dichos empleados se guardan los siguientes valores {{:id:}}
";

$input = "
public class {{:class_name:}} [[extends {{:class_name_extends:}}]] {
    {{:(class_constructor)constructor:}}
    {{:(class_attribute)attributes:}}
    {{:(class_method)methods:}}
}
";


$json = "{'id1':{
    'type':'class',
    'variables': {
        'name':
    }
}";

$do = new TokenString();
$do->snippetsXMLFile = "archivoejemplo.xml";
$do->loadSnippets();
$do->content = $input;
//$do->data = $json;
$do->make();
/*
if ($do->validateExpression()) {
    print 'The entered expression is valid.<br/>';
}
else {
    print 'The entered expression is not valid.<br/>';

}
*/
print_r( $do->tokens );
exit;


$parser = new Parser( "php", "archivoejemplo.xml" );
$parser->content = "[[optional1]] [[optional2]] [[optional3]] [[esta es una prueba]] {{:variable:}}, {{:variable:}}, {{:variable:}}, {{:variable:}}, {{:variable:}} [[que tienes {{:variable:}} que me encanta [[quizas sabes algo]]]] {{:permite:}} cambiar cada uno de sus {{:valores:}} 
vamos a ver si funciona {{:ojala:}} {{:funcione:}}, [[extends {{:welcome_to_the_jungle:}}]] {{:porque:}}, necesito avanzar en {{:esto:}} [[[[{{:esto_es_una_variable:}}]] un opcional juntos [[extends {{:asdasd:}}]]]]
otra prueba es [[[[[[esta es una super prueba{{:welcome:}}]]]]]]
";
$parser->make(null, null, '{}');


print_r( (array) $parser );
exit;
$parser->writeExpression(
    "class", 'php',
    '{
        "id1234" :
        {
            "class_name":"NombreClase",
            "name" :"ereee",
            "methods" : [
                { 
                    "method_name" : "exampleFunc1",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" },
                        { "name" : "param3", "value" : "val3" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc2",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc3",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc4",
                    "method_parameters" : []
                }
            ]
        }
        ,
        
        "id12342" :
        {
            "class_name":"NombreClase",
            "methods" : [
                { 
                    "method_name" : "exampleFunc1",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" },
                        { "name" : "param3", "value" : "val3" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc2",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc3",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc4",
                    "method_parameters" : []
                }
            ]
        }
        ,
        
        "id12343" :
        {
            "class_name":"NombreClase",
            "methods" : [
                { 
                    "method_name" : "exampleFunc1",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" },
                        { "name" : "param3", "value" : "val3" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc2",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" },
                        { "name" : "param2", "value" : "val2" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc3",
                    "method_parameters" : [
                        { "name" : "param1", "value" : "val1" }
                    ]
                },
                { 
                    "method_name" : "exampleFunc4",
                    "method_parameters" : []
                }
            ]
        }
    }

    ' );

//$parser->writeExpression("class", '{"a":"b"}' );




?>

</body>
</html>