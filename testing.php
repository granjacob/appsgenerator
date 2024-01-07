
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





class SingleToken extends TokenString {

    public function __construct( $content )
    {
        parent :: __construct();
        $this->content = $content;
    }

}

class VariableToken extends TokenString {

    public function __construct()
    {
        parent :: __construct();
    }

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

    public $snippetsXMLFile;

    public $snippets;

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
            $this->snippets[$snippet->getAttribute('name')] = $newSnippet;
        }
    }


    public function buildExpressionDefinition( 
        $expressionStr, &$offset, $defOpen, $defClose, $exprClass, $id  )
    {
        $posStart = $offset;
        $posEnd = strpos( $expressionStr, $defClose, $offset ) + strlen( $defClose );
        $varName = substr( $expressionStr, $posStart  + strlen( $defOpen ), $posEnd - $posStart - strlen( $defClose ) - strlen( $defOpen ) );
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

    public function make( $expressionStr=null )
    {
        
        if ($expressionStr === null)
            $expressionStr = $this->content;
        $k = 0;
        $var = null;
        $singleToken = "";
        print 'Strlen($expressionStr)= ' . strlen( $expressionStr ) . '!!!' ;
        for ($i = 0; $i < strlen( $expressionStr ); $i++) {
            print "\n<$i : CONTINUANDO>\n";
            $evalExpr_varDefOpen = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_OPEN );

            $evalExpr_varDefClose = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_CLOSE );
            $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_CLOSE );

            if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {
                print "\n<encontre VAR_DEF_OPEN>\n";

                $var = $this->buildExpressionDefinition( 
                    $expressionStr, $i, 
                    VAR_DEF_OPEN, 
                    VAR_DEF_CLOSE, 
                    VariableToken::class, $k );
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
                        print "\n<$j : encontre opt_def_open>\n";
                        $qOptOpenCount++;
                        $j++;
                    }
                    else 
                    if ($evalExpr_optDefClose === OPT_DEF_CLOSE) {
                        
                        print '$i = ' . $i . ', $j = ' . $j . "\n";
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
                            $j++;
                            break;
                        }
                        
                        $j++;
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
 

$input =  "AAA[[FIRST_VARIABLE{{:nombreVar:}}[[{{:otra_variable_inside:}}]]]][[A]]X[[B]]XX[[C]]XXX[[Desta es una prueba]]Y{{:variable:}},Q{{:variable:}},M{{:variable:}},ZZ{{:variable:}},TT{{:variable:}}QQ[[que tienes {{:variable:}} que me encanta [[quizas sabes algo]]]]RRRRR{{:permite:}}ZZZZcambiar cada uno de susQ{{:valores:}}YYYYvamos a ver si funcionaTTT{{:ojala:}}RRRR{{:funcione:}},JJJJ[[extends {{:welcome_to_the_jungle:}}]]QQW{{:porque:}},FGFSnecesito avanzar enERRE{{:esto:}} [[[[{{:esto_es_una_variable:}}]] un opcional juntos [[extends {{:asdasd:}}]]]] otra prueba es [[[[[[esta es una super prueba{{:welcome:}}]]]]]]";
print $input;
$do = new TokenString();
$do->snippetsXMLFile = "archivoejemplo.xml";
$do->loadSnippets();
$do->content = $input;
$do->make();
print_r( $do->tokens );
exit;

class VariableDefinition {
    public $id;
    public $pos_start;
    public $pos_end;

    public $name; 

    public $content;

    public $variables;

    public $optionals;

    public function __construct()
    {
        $this->variables = array();
        $this->optionals = array(); 
    }

    public function hasvariables()
    {
        return count( $this->variables ) > 0;
    }

    public function hasOptionals()
    {
        return count( $this->optionals ) > 0;
    }

    public function makeVar( $name )
    {
        return VAR_DEF_OPEN . $name . VAR_DEF_CLOSE;
    }

    // Catch definition expression
    public function catchDefExpr( $expressionStr, $offset, $def )
    {
        return substr( $expressionStr, $offset, strlen( $def ) );
    }

    



    public function extractVars( $expressionStr=null, $currentVar=null )
    {
        if ($expressionStr === null)
            $expressionStr = $this->content;
        $k = 0;
        $var = null;
        for ($i = 0; $i < strlen( $expressionStr ); $i++) {
            $evalExpr_varDefOpen = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_OPEN );
            if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {
                $var = $this->buildExpressionDefinition( 
                    $expressionStr, $i, 
                    VAR_DEF_OPEN, 
                    VAR_DEF_CLOSE, 
                    VariableDefinition::class, $k );
                $k++;
                array_push( $this->variables, $var );
            }
            else 
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                $qOptOpenCount = 0;
                for ($j = $i; $j < strlen( $expressionStr ); $j++) {
                    $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $j, OPT_DEF_CLOSE ); 
                    $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $j, OPT_DEF_OPEN ); 
                    if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                        $j++;
                        $qOptOpenCount++;
                    }
                    else 
                    if ($evalExpr_optDefClose === OPT_DEF_CLOSE) {
              
                        $qOptOpenCount--;
                    
                        if ($qOptOpenCount === 0) {
         
                            $optExpr = new VariableDefinition();
                            $optExpr->content = substr( 
                                $expressionStr, 
                                $i + strlen( OPT_DEF_OPEN ), 
                                $j - $i - strlen( OPT_DEF_CLOSE )
                                );
                            $optExpr->pos_start = $i;
                            $optExpr->pos_end = $j;
            
                            $k++;
                            $optExpr->extractVars( $optExpr->content );
                            array_push( $this->optionals, $optExpr );
                            break;
                        }
                        
                        $j++;
                    }
                }
                $i = $j;
            }
        }

    }
}
/*
class OptionalExpressionDefinition extends VariableDefinition {
    public $variables;
    public $optionals;

    public function __construct()    {
        parent::__construct();
        $this->variables = array();
        $this->optionals = array();
    }
}*/

class Parser extends VariableDefinition {

    public $filenameDefinition;
    public $language;
    public $snippets;

    public function __construct( $language=null, $filenameDefinition=null )
    {
        parent::__construct();
        $this->language = $language;
        $this->filenameDefinition = $filenameDefinition;
        $this->snippets = array();  
        $this->loadSnippets();
    }

    public function loadSnippets( $filename=null )
    {
        if ( $filename === null ) {
            $filename = $this->filenameDefinition;
        }
                
        $xml = new DOMDocument();
       
        $xml->load($filename);

        $snippets = $xml->getElementsByTagName('snippet' );

        foreach ($snippets as $snippet) {
            $this->snippets[$snippet->getAttribute('name')] = $snippet->nodeValue;
        }

    
    }

    public function setExpressionParameters( $expressionParameters )
    {
        $resultArray = json_decode( $expressionParameters, true );
    }


    public function next()
    {

    }

    
    public function make($expressionName=null, $lang=null, $expressionParameters=null)
    {
        if ($expressionParameters !== null)
            $resultArray = json_decode( $expressionParameters, true );
        
        $finalExpression = $this->content;
        $this->extractVars();

        for ($i = 0; $i < strlen( $finalExpression ); $i++) {
            $evalExpr_varDefOpen = $this->catchDefExpr( $finalExpression, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $finalExpression, $i, OPT_DEF_OPEN );
            if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {

            }
            else {
                $finalExpression .= $this->content[$i];
            }
        }

        foreach ($this->optionals as $optExpr) {
            if (!$optExpr->hasVariables()) {
                $finalExpression = substr_replace( $finalExpression, $optExpr->content, $optExpr->pos_start, $optExpr->pos_end - $optExpr->pos_start );
            }
        }

        print $finalExpression;
    }

    public function writeExpression( $expressionName, $lang=null, $expressionParameters=null )
    {
        $this->make( $expressionName, $lang, $expressionParameters );

     /*   $resultArray = json_decode( $expressionParameters, true );

        $finalExpression = $this->snippets[$expressionName];


  

        foreach ($resultArray as $key => $item) {
            foreach ($resultArray[$key] as $qkey => $qvalue) {

                if (!is_array( $qvalue )) {
                    $finalExpression = str_replace(
                        $this->makeVar( $qkey), $qvalue, $finalExpression );
                  
                }
                else {
                    foreach ($qvalue as $subkey => $subvalue) {
                        $finalExpression = str_replace(
                            $this->makeVar( $subkey), $subvalue, $finalExpression );
                    }
                }
            }
            print $finalExpression;
        }*/
    }




}

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