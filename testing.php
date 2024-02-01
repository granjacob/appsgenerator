
<?php


function camelize( $str )
{
    $finalStr = "";
    $str = ucwords( $str );
    for ($i = 0; $i < strlen( $str ); $i++) {
        if ($str[$i] !== '-' && $str[$i] !== '_') {
            $finalStr .= $str[$i];
        }
        else {
            if ($i !== (strlen( $str ) - 1)) {
                $str[$i + 1] = ucwords( $str[$i + 1] );        
            }
        }
    }
    return $finalStr;
}

function camelizeAsVariableName( $str )
{
    $temp = camelize( $str );
    $temp[0] = strtolower( $temp[0] );
    return $temp;
}

function camelizeAsMethodName( $str )
{
    return camelizeAsVariableName( $str );
}


//    require("PHPAS.php");
?>
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

define( 'PHP_FILE_OPEN', '<?php' );
define( 'PHP_FILE_CLOSE', '?>' );


define( 'COND_DEF_OPEN', '{?/' );
define( 'COND_DEF_CLOSE', '/?}' );



function endl( $times=1 )
{
    return __rpt( "\n", $times );
}


function __print( $str )
{

    $finalPrint = "";
    $str = str_replace( "\r", "", str_replace( "\"", "\\\"", $str ) );
    $lines = explode( "\n", $str );
    foreach ($lines as $line) {
        $line = ( $line );    
        $finalPrint .= endl() . 'print ' . '"' . $line . '\n";';
    }
    return $finalPrint;
}


function __ln($count, $chr)
{
    $result = '';
    $result .= endl();

    for ($i = 0; $i < $count; $i++)
    {
        $result .= $chr;
    }
    $result .= endl();
    return $result;
}

function __rpt( $chr, $count )
{
    $result = '';
    
    for ($i = 0; $i < $count; $i++)
    {
        $result .= $chr;
    }

    return $result;
}

function _tab( $times=1 )
{
    return __rpt( "\t", $times );
}

function _print( $output )
{
    $finalPrint = "";
    $lines = explode( "\n", $output );
    foreach ($lines as $line) {
        $finalPrint .= endl() . "print '" . $line . "';" ;
    }
    return $finalPrint;
}




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

    public $conditionalExpression;
    
    public function __construct()
    {
        parent :: __construct();
    }

}


class ConditionalToken extends OptionalToken {
    
    public function __construct()
    {
        parent :: __construct();
    }
}

class Snippet extends TokenString {

    public $variablesDefined;   // this is for control the variables names defined in a template/snippet

    public function __construct()
    {
        parent :: __construct();
        $this->variablesDefined = array();
    }

 /*   public function cleanSnippet()
    {
        parent :: clean();
        $this->variablesDefined = array();
    }*/

    public function addVariableName( $varName )
    {
        if (!isset( $this->variablesDefined[$varName])) {
            $this->variablesDefined[$varName] = $varName;
        }        
    /*    else {
            throw new Exception(
                "Cannot add more than one variable with the same name to a snippet/template." . endl() .
            "Please review the snippet/template " . $this->name );
        }*/
    }

    public function removeVariableName( $varName )
    {
        if (isset( $this->variablesDefined[$varName] ))
        {
            unset( $this->variablesDefined[$varName] );
        }
    }
}


class TokenString  {


    protected $defaultConditionals = array(
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


    public $packageName;

    public $id;
	public $name;

    public $fullNameReference;
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

    public static $variableNames = array();

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
            $newSnippet->name = $snippet->attributes['name']->value;
            $newSnippet->content = trim( $snippet->nodeValue );
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
        print '<strong>Syntax error:</strong> ' . $msg . "<br/>\n";
        print '<strong>Check></strong> "' . substr( $expressionStr, max(0, $currentIndex - 8), min( strlen( $expressionStr ) - $currentIndex , 16 ) ) . '", index: ' . $currentIndex . "<br/>\n";
    }

    public function collectVariables( $tokenObj=null, $variableTypes=array(TokenString::class), $returnAsType=VariableToken::class, $sameLevel=false, $distinct=false )
    {
        if ($tokenObj == null)
            $tokenObj = $this;
        $addedVariables = array();
        $variables = array();
        foreach ($tokenObj->tokens as $token) {            
            if ((is_array( $variableTypes ) && in_array( get_class( $token ), $variableTypes )) ||
                !is_array( $variableTypes ) && get_class( $token ) === $variableTypes) {
                if (in_array( $token->name, $addedVariables ) && $distinct !== false) {
                    continue;
                }
                array_push( $addedVariables, $token->name );
                print 'successfully ADDED ' . $token->name . endl();

                if (get_class( $token ) != $returnAsType) {
                    $var = new $returnAsType();
                    $var->name = $token->name;
                    $var->content = $token->content;
                    $var->fullNameReference = $token->fullNameReference;
                    $var->id = $token->id;
                    $var->snippetName = $token->snippetName;
                    array_push( $variables, $var );
                }
                else {
                   
                    array_push( $variables, $token );            
                }

                

                
            }
            else 
            if (!$sameLevel) {
                $collected = $this->collectVariables( $token, $variableTypes, $returnAsType, $sameLevel, $distinct );
                
 

                foreach ($collected as $variableCollected) {
                    if (in_array( $variableCollected->name, $addedVariables ) && $distinct !== false) {
                        continue;
                    }
                    else {
                        print 'No se agrega collected->name = "' . $variableCollected->name . '"' . endl(); 
                    }
                    array_push( $addedVariables, $variableCollected->name );
                    array_push( $variables, $variableCollected );
                }
            }
        }
        //print_r( $addedVariables );
        return $variables;
    }

    public function collectVariablesDistinct( $tokenObj=null, $variableTypes=array(TokenString::class), $returnAsType=VariableToken::class )
    {
        return $this->collectVariables(  $tokenObj, $variableTypes, $returnAsType, false, true );
    }

    public function collectVariablesSameLevel( $tokenObj=null, $variableTypes=array(TokenString::class), $returnAsType=VariableToken::class )
    {
        return $this->collectVariables( $tokenObj, $variableTypes, $returnAsType, true );
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

            
            $evalExpr_condDefOpen = $this->catchDefExpr( $expressionStr, $i, COND_DEF_OPEN );
            $evalExpr_condDefClose = $this->catchDefExpr( $expressionStr, $i, COND_DEF_CLOSE );


            if ($evalExpr_varDefOpen === COND_DEF_OPEN) {
                print 'COND_DEF_OPEN at ' . $i . endl(); 
                $i += strlen( COND_DEF_OPEN );
                $conditionalTokenContent = "";
                while ((($evalExpr_condDefClose = $this->catchDefExpr( $expressionStr, $i, COND_DEF_CLOSE )) !== COND_DEF_CLOSE) &&
                    $i  < strlen( $expressionStr )) {
                    $conditionalTokenContent .= $expressionStr[$i];
                    $i++;
                }
                print 'After collecting $conditionalTokenContent=' . $conditionalTokenContent . endl();

                if ($evalExpr_condDefClose !== COND_DEF_CLOSE) {
                    $this->logSyntaxError( 'ConditionalToken is not correctly defined.', $expressionStr, $i );
                    return false;
                }

                $hasConditional = false;
                $hasExpression = false;
                foreach ($this->defaultConditionals as $conditionalKey) {
                    if (substr( $conditionalTokenContent, 0, $len = strlen( $conditionalKey )) === $conditionalKey) {
                        if ($len < strlen( $conditionalTokenContent ) - 1) {
                            $hasExpression = true;
                        }  
                        /*for ($i = $offset; $i < strlen( $conditionalTokenContent); $i++) {
                            $varConditionalToken = new ConditionalToken();
                            $varConditionalToken->conditionalExpression = $conditionalKey;
                            $varConditionalToken->content = $conditioalTokenContent;
                            
                        }*/             
                        $hasConditional = true;
                        break;           
                    }
                }

                if (!$hasConditional || ($hasConditional && !$hasExpression)) {
                    $this->logSyntaxError( 'ConditionalToken has not a valid conditional expression.', $expressionStr, $i );
                    return false;
                }



                $i += strlen( COND_DEF_CLOSE ) - 1;
                continue;
            }

            
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
                print $currentTypeName . "<br/>\n";
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

    public function clean()
    {
        $this->tokens = array();    
        foreach (TokenString::$snippets as $snippet) {
            $snippet->variablesDefined = array();
        }    
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

        $expressionStr = trim( $expressionStr );
        

        static $k = 0;
        $var = null;
        $singleToken = "";

        $addSingleToken = false;

        for ($i = 0; $i < strlen( $expressionStr ); $i++) {

            $addSingleToken = false;

            $evalExpr_varDefOpen = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_OPEN );
            $evalExpr_optDefOpen = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_OPEN );
            $evalExpr_varDefClose = $this->catchDefExpr( $expressionStr, $i, VAR_DEF_CLOSE );
            $evalExpr_optDefClose = $this->catchDefExpr( $expressionStr, $i, OPT_DEF_CLOSE );

            if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {

                    $posStart = $i;
        
                    $posEnd = strpos( 
                        $expressionStr, 
                        VAR_DEF_CLOSE, 
                        $i ) + strlen( VAR_DEF_CLOSE );
            
                    $varName = substr( 
                            $expressionStr, 
                            $posStart  + strlen( VAR_DEF_OPEN ), 
                            $posEnd - $posStart - strlen( VAR_DEF_CLOSE ) - strlen( VAR_DEF_CLOSE ) );
                    $fullNameReference = VAR_DEF_OPEN . $varName . VAR_DEF_CLOSE;
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

                    //TokenString::$snippets[$this->snippetName]->addVariableName($variableName);

                    if ($snippetName !== null && $variableName !== null) {
                        $exprClass = CompoundVariableToken::class;                        
                    }

                    
                    $var = new $exprClass();
                    $var->posStart = $posStart;
                    $var->posEnd = $posEnd;
                    $var->name = $variableName;
                    $var->fullNameReference = $fullNameReference;
                    if (get_class( $var ) == CompoundVariableToken::class) {
                        $var->snippetName = $snippetName;
                        $var->make();
                    }
                    $var->id = $k;


                    $i = $posEnd - 1;
                    
                    $k++;
                    
                $addSingleToken = true;
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
                            $addSingleToken = true;

                            $this->addSingleToken( $this->tokens, $singleToken, $k );
                           
                            $variables = $optExpr->collectVariablesSameLevel( null, CompoundVariableToken::class, CompoundVariableToken::class );
                            
                            $conditionalExpression = "";
                            foreach ($variables as $variable) {
                                $conditionalExpression .= 
                                    ' ($this->' . $variable->name . ' !== null && ' . 
                                    '$this->' . $variable->name . '->count() > 0) &&';                                                                
                            }

                            $optExpr->conditionalExpression = str_replace( "&&", "&&\n", trim( $conditionalExpression, "& " ) );

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



            if (($i == strlen( $expressionStr ) - 1) && strlen( $singleToken ) > 0) {
                $this->addSingleToken( $this->tokens, $singleToken, $k );
            }
        }
    } 

    public function makeSingleToken( TokenString $tokenString=null )
    {
        $class = get_class( 
            ($tokenString !== null ? $tokenString : $this ) );
    
        switch ($class) {
            case 'SingleToken':
                print $this->content;
                break;
        }
    }

    public function hasTokenOfType( $tokenObj=null, $tokenType=OptionalToken::class )
    {
        if ($tokenObj == null) {
            $tokenObj = $this;
        }

        $variables = array();
        
        foreach ($tokenObj->tokens as $token) {
            $ind = false;
            if  (get_class( $token ) === $tokenType) {
                return true;
            }
            else 
            if (count( $token->tokens ) > 0) {
                $ind = $token->hasOptionalTokens( $token );
                if ($ind) return true;
            }
        }
        return false;

    }

    public function hasOptionalTokens(  $tokenObj=null )
    {
        return $this->hasTokenOfType( $tokenObj, OptionalToken::class );
    }





    public function generateClass( $pToken=null )
    {
        if ($pToken === null) {
            print 'Generating class for ' . $this->snippetName . endl();

        }
        $output = "";

        $fileBegins = $pToken === null;

        if ($fileBegins) {
            $output .= endl() . PHP_FILE_OPEN . endl(2);
            $output .= 'require_once( "GeneratorClass.php" );' . endl();
           // $output .= ' require_once( "core.php" );' . endl();

        }

        if ($pToken === null) {
            $pToken = $this;
        }

        $variables = array();
        
        if ($fileBegins) {
            $variables = 
                $this->collectVariablesDistinct( 
                    $pToken, 
                    array( VariableToken::class, CompoundVariableToken::class ), 
                    VariableToken::class 
                );
            
        }

        $uniqueSnippets = array();

        if ($fileBegins) {
            foreach ($variables as $variable) {
                $uniqueSnippets[$variable->snippetName] = $variable->snippetName;
            }
        }

        // requires
        if ($fileBegins) {
            foreach ($uniqueSnippets as $fileName) {
               
                if ($fileName !== null) {
                    $output .= 'require_once( "' . $fileName . '.php" );';
                    $output .= endl();
                }
            }
        }

        // comment with usage example
        if ($fileBegins) {
            $output .= endl() . "/* ####################### " . $this->snippetName . " : USAGE EXAMPLE ####################### " . endl();

            $output .= endl() . _tab() . '$var' . $this->snippetName . ' = new ' . $this->snippetName . '();' . endl();

            foreach ($variables as $var) {
                $output .= endl();

                $sampleData = $this->snippetName . '_' . $var->name . '_EXAMPLE';

                if ($var->snippetName !== null) {
                    $output .= _tab() . '$var' . $var->name . ' = new ' . $var->snippetName . '();' . endl();
                    $output .= _tab() .  '$var' . $this->snippetName . '->add' . camelize( $var->name  ) . 'Item( $var' .  camelize( $var->name  ) . 'Item );' . endl();
                }
                else {
                    $output .= _tab() .  '$var' . $this->snippetName . '->set' . camelize( $var->name ) . '("' . $sampleData . '");' . endl();
                }
            }

            $output .= endl() . _tab() . '$var' . $this->snippetName . '->write();' . endl();

            $output .= endl() . "    ####################### USAGE EXAMPLE ####################### **/ " . endl();

        }

        if ($fileBegins) {
            $output .= endl() . 'class ' . $this->snippetName . ' extends GeneratorClass {' . endl();
        }

        if ($fileBegins) {
      
            // attributes of class
            foreach ($variables as $variable) {
                $output .= endl() . _tab() . 
                    'protected ' . 
                    ($variable->snippetName !== null ? $variable->snippetName  . ' ':'') . 
                    '$' . $variable->name . ';' . endl();
            }

            $addedVariables = array();


            // constructor 
            $output .= endl()  . 'public function __construct()' . endl();
            $output .= endl()  . '{' . endl();
            $output .= endl()  . _tab(2) . 'parent :: __construct();' . endl();

            foreach ($variables as $variable) {
                $output .= endl() . _tab() . '$this->' . $variable->name . ' = ' . ($variable->snippetName !== null ? ' new ' . $variable->snippetName . '()' : ' null') . ';' . endl();
            }

            $output .= endl()  . '}' . endl();

            
            // setters
            foreach ($variables as $variable) {
                $output .= endl() . _tab() . 'public function set' . camelize( $variable->name ) . '( ' . $variable->snippetName . ' $' . $variable->name . ')' . endl() . '{' . endl();
                $output .= endl() . _tab(2) . ' $this->' . $variable->name . ' = $' . $variable->name  . ';' . endl() .  'return $this; ' . endl() . '}' . endl();
            }
            // getters
            foreach ($variables as $variable) {
                $output .= endl() . _tab() . 'public function get' . camelize( $variable->name ) . '()' . endl() . '{' . endl();
                $output .= endl() . _tab(2) . 'return $this->' . $variable->name . ';' . endl() . '}' . endl();
            }
            // adders
            foreach ($variables as $variable) {
                if ($variable->snippetName !== null) {
                    $output .= endl() . _tab() . 'public function add' . camelize( $variable->name ) . 'Item( ' . $variable->snippetName . ' $item )' . endl() . '{' . endl();
                    $output .= endl() . _tab(2) . '$this->' . $variable->name . '->append($item);' . endl() . 'return $this; ' . endl() . '}' . endl();
                }
            }


            // main write function
            $output .= endl() . _tab() . 'public function write() {' . endl();
            $output .= endl() . _tab() . '$this->validateData();' . endl();

        }   

        $outputStack = "";

        $ignoreNextToken = false;
        while ($token = current($pToken->tokens) ) {
            $nextToken = next($pToken->tokens);

            if ($token->content  !== null) {
                $token->content = str_replace( "\r", "", $token->content );
            }
        //foreach ($pToken->tokens as $token) {
            if ($ignoreNextToken) {
                $ignoreNextToken = false;
                continue;
            }
            if (get_class( $token ) === OptionalToken::class) {
                $output .= __print( $outputStack );
                $outputStack = "";
                $output .= endl() . 'if (' . $token->conditionalExpression . ') {' . endl();
                $output .= endl() . $token->generateClass( $token ) . endl();
                $output .= endl() . '}' . endl();
            }
            else
            if (get_class( $token ) === CompoundVariableToken::class) {
                $output .= __print( $outputStack );
                $outputStack = "";
                $output .= _tab(2) . endl() . 'if ($this->' . $token->name . ' !== null) {';
                $output .= _tab(2) . endl() . 'foreach ($this->' . $token->name . ' as $item_' . $token->name . ') {' . endl();
                $output .= _tab(3) . '$item_' . $token->name . '->write();' . endl();
                $output .= _tab(2) . '}}' . endl();

            }
            else if (get_class( $token ) === SingleToken::class ) {
                
                if (is_object( $nextToken ) && get_class( $nextToken ) === VariableToken::class) {
                    $ignoreNextToken = true;
                    $outputStack .= ( $token->content . '{$this->' . $nextToken->name . '}' );
                }
                else {
                    $outputStack .= ( $token->content );
                }

            } 

            else if (get_class( $token ) === VariableToken::class ) {
                $output .= __print( '{$this->' . $token->name . '}' );
            } 
        }

        if ($outputStack !== null) {
            $output .= __print( $outputStack );
            $outputStack = "";
        }
        

        

        if ($fileBegins) {
            $output .= endl() . '}' . endl();
            $output .= endl() . ' } ' . endl();
            $output .= endl(2) . PHP_FILE_CLOSE . endl(2);
        }
        return $output;
    }

    /**
     * Generate the classes based on the snippets code.
     *
     * @return void
     */
    public function generateClasses()
    {
        $className = "";
        print 'Snippets quantity ' . count( TokenString :: $snippets ) . endl();
        $this->collectVariables( null, array( CompoundVariableToken::class ), VariableToken::class  );

        foreach (TokenString :: $snippets as $snippet) {

            $this->snippetName = $snippet->name;
            $this->clean();
            $this->make();
            $output = $this->generateClass();
            file_put_contents( "outputclasses/" . camelize( $this->snippetName  ) . ".php", $output );
            print __ln(100,'%' );
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
//$do->content = $input;
$do->snippetName = 'TestForConditionalToken';
/*//$do->data = $json;*/
$result = $do->make();


//print_r( $do );



//print $autoStyle->loadString($do->generateClass()) ."\n";
if ($result) {

    print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
print ' START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START  START ---- START ' . endl();
print '<xmp>';
    print $do->generateClass();
    print '</xmp>';
}
//print $do->generateClass();//generateClasses();
/*
$do->make();
print_r( $do->tokens );
print __ln( 100, '$$$');
foreach ($do->tokens as $token) {
    if (get_class( $token ) === OptionalToken::class ) {
        print 'Collecting variables ... '. endl();
        $variables = $do->collectVariables( $token, CompoundVariableToken::class );
        print_r( $variables );
        print __ln(100, '##' );
    }
}*/
//$do->generateClass();

/*
foreach ($do->tokens as $token) {
    $token->makeSingleToken();
    __ln(100,'-');
}*/

/*
if ($do->validateExpression()) {
    print 'The entered expression is valid.<br/>';
}
else {
    print 'The entered expression is not valid.<br/>';

}
*/
//print_r( $do->tokens );
exit;




?>

</body>
</html>