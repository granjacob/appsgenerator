<?php


error_reporting(E_ALL);

define( 'VAR_DEF_OPEN','{{:' );
define( 'VAR_DEF_CLOSE',':}}' );
define( 'OPT_DEF_OPEN','[[' );
define( 'OPT_DEF_CLOSE',']]' );

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

    public function makeVar( $name )
    {
        return VAR_DEF_OPEN . $name . VAR_DEF_CLOSE;
    }

    // Catch definition expression
    public function catchDefExpr( $expressionStr, $offset, $def )
    {
        return substr( $expressionStr, $offset, strlen( $def ) );
    }

    
    public function buildExpressionDefinition( 
        $expressionStr, &$offset, $defOpen, $defClose, $exprClass, $id  )
    {
        $posStart = $offset;
        $posEnd = strpos( $expressionStr, $defClose, $offset ) + strlen( $defClose );
        $varName = substr( $expressionStr, $posStart  + strlen( $defOpen ), $posEnd - $posStart - strlen( $defClose ) - strlen( $defOpen ) );
        $var = new $exprClass();
        $var->pos_start = $posStart;
        $var->pos_end = $posEnd;
        $var->name = $varName;
        $var->id = $id;
        $i = $posEnd + strlen( $defClose );
        return $var;
    }
    public function extractVars( $expressionStr=null, $currentVar=null )
    {
        if ($expressionStr === null)
            $expressionStr = $this->content;
        $matches = array();
        $k = 0;
        $var = null;
        echo $expressionStr;
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

        print_r( (array) $this );
        return $matches;
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

    public function writeExpression( $expressionName, $lang=null, $expressionParameters=null )
    {
        $resultArray = json_decode( $expressionParameters, true );

        $finalExpression = $this->snippets[$expressionName];

        $vars = $this->extractVars( $finalExpression );

        print_r( $vars );
        exit;

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
        }
    }




}

$parser = new Parser( "php", "archivoejemplo.xml" );
$parser->extractVars("[[esta es una prueba]] {{:variable:}} [[que tienes {{:variable:}} que me encanta [[quizas sabes algo]]]] {{:permite:}} cambiar cada uno de sus {{:valores:}} 
vamos a ver si funciona {{:ojala:}} {{:funcione:}}, [[extends {{:welcome_to_the_jungle:}}]] {{:porque:}}, necesito avanzar en {{:esto:}} [[[[{{:esto_es_una_variable:}}]] un opcional juntos [[extends {{:asdasd:}}]]]]
otra prueba es [[[[[[esta es una super prueba{{:welcome:}}]]]]]]
");
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