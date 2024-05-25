<?php

namespace system\jupiter\core;

use Codeception\Util\Template;
use DOMDocument;

use ArrayObject;

use Exception;


abstract class TokenString extends ArrayObject
{

    public abstract static function analyze(&$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken );


    public $baseWherePath;
    public $mainPackageWherePath;

    public static int $nextId = 0;

    public $packageName;

    public $namespace;

    public $id;
    public $name;

    public $fullNameReference;
    public $content;
    public $value;

    public $posStart;
    public $posEnd;

    public $tokens;

    public $type;

    public $nativeType;

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


    public function catchDefExpr($expressionStr, $offset, $def)
    {
        return substr($expressionStr, $offset, strlen($def));
    }

    public function isXMLFile( $filename )
    {
        $pathinfo = pathinffo( $filename );
        if ($pathinfo['extension'] == "xml") {
            return true;
        }
        return false;
    }


    public function isConeFileContentValid( &$content )
    {
        return false;
    }

    public function parseSeedFileAsSnippet( &$fileContent )
    {

    }

    public function parseXMLFileAsSnippets( &$fileContent )
    {

    }

    public function isXMLFileContentValid( $filename )
    {

    }

    public function addSnippet( Snippet $newSnippet )
    {
        if (!isset( TokenString::$snippets[$newSnippet->getSnippetNameWithPackage()] )) {
            TokenString::$snippets[$newSnippet->getSnippetNameWithPackage()] = $newSnippet;
        }
        else {
            throw new Exception(
                "Duplicated template names are not allowed in the same package. 
                        Please verify the file '" . $this->snippetsXMLFile .
                "' with package '" . $newSnippet->packageName .
                "'. Template with name '"
                . $newSnippet->name . "' is defined more than one time." );
            exit;
        }
    }

    public function  loadSnippets($filename = null)
    {
        if ($filename === null) {
            $filename = $this->snippetsXMLFile;
        }

        $snippets = null;

        if ($this->isXMLFile( $filename )) {


            $xml = new DOMDocument();

            $xml->load($filename);
            if (!$xml->schemaValidate( 'xmldefs\snippets.xsd') ||
                !$xml->schemaValidate( 'xmldefs\snippet.xsd')) {
                throw new Exception( "The XML template file '" . $filename .
                    "' is wrong defined.");
            }

            if (!TemplateFileValidator::isXMLFileValidSigned(
                $xml, $filename, $this->mainPackageWherePath )) {
                throw new Exception(
                    "The XML template file '" . $filename .
                    "' is not valid signed.");
            }

            $snippets = null;
            $packageName = null;

            $snippetsTag = $xml->getElementsByTagName('snippets');
            $snippets = $xml->getElementsByTagName('snippet');


            if (count( $snippetsTag ) === 0) {
                $packageName = $snippets[0]->getAttribute('package');
            }
            else {
                $packageName = $snippetsTag[0]->getAttribute('package');
            }


            if ($snippets->length > 0) {
                foreach ($snippets as $snippet) {
                    $newSnippet = new Snippet();
                    $newSnippet->name = $snippet->getAttribute('name');


                    $newSnippet->snippetName = $snippet->getAttribute('name');
                    $newSnippet->packageName = trim($packageName);
                    $newSnippet->content = trim($snippet->nodeValue);

                    $this->addSnippet( $newSnippet );

                }
            }

        }
        else
        if (TemplateFileValidator :: isSeedFile( $filename )) {
            if (TemplateFileValidator :: isSeedFileValidSigned( $filename, $this->mainPackageWherePath )) {
                $seedFile = new SeedFile( $filename, $this->mainPackageWherePath );
                $snippet = $seedFile->getAsSnippet();
                $this->addSnippet( $snippet );
            }
        }
        else {
            throw new Exception("Wrong file!");
        }

    }


    public function buildExpressionDefinition(
        $expressionStr,
        &$offset,
        $defOpen,
        $defClose,
        $exprClass,
        $id
    ) {
        $posStart = $offset;

        $posEnd = strpos(
            $expressionStr,
            $defClose,
            $offset
        ) + strlen($defClose);

        $varName = substr(
            $expressionStr,
            $posStart + strlen($defOpen),
            $posEnd - $posStart - strlen($defClose) - strlen($defOpen)
        );

        $var = new $exprClass();
        $var->posStart = $posStart;
        $var->posEnd = $posEnd;
        $var->name = $varName;
        $var->packageName = 'UNKNOWN';  // ---
        $var->id = $id;
        $offset = $posEnd - 1;

        return $var;
    }

    public static function getNextId()
    {
        TokenString :: $nextId++;
        return TokenString :: $nextId;        
    }

    public function addSingleToken(&$tokensArray, &$content )
    {
        if (strlen($content) > 0) {
            $newSingleToken = new SingleToken($content);
            $newSingleToken->id = TokenString :: getNextId();
            //$id++;
            
            array_push($tokensArray, $newSingleToken);
        }
        $content = "";
    }

    

    public function logSyntaxError($msg, $expressionStr, $currentIndex)
    {
        print '<strong>Syntax error:</strong> ' . $msg . "<br/>\n";
        print '<strong>Check></strong> "'
            . substr(
                $expressionStr,
                max(0, $currentIndex - 8),
                min(strlen($expressionStr) - $currentIndex, 16)

            )
            . '", index: '
            . $currentIndex . "<br/>\n";
        exit;
    }

    public function collectVariables(
        $tokenObj = null,
        $variableTypes = array(TokenString::class),
        $returnAsType = VariableToken::class,
        $sameLevel = false,
        $distinct = false )
    {
        if ($tokenObj == null)
            $tokenObj = $this;
        $addedVariables = array();
        $variables = array();
        foreach ($tokenObj->tokens as $token) {
            if (
                (is_array($variableTypes) && in_array(get_class($token), $variableTypes)) ||
                !is_array($variableTypes) && get_class($token) === $variableTypes
            ) {
                if (in_array($token->name, $addedVariables) && $distinct !== false) {
                    continue;
                }
                array_push($addedVariables, $token->name);


                if (get_class($token) !== $returnAsType) {
                    $var = new $returnAsType();
                    $var->packageName = $token->packageName;   // ---
                    $var->name = $token->name;
                    $var->content = $token->content;
                    $var->fullNameReference = $token->fullNameReference;
                    $var->id = $token->id;
                    $var->snippetName = $token->snippetName;
                    array_push($variables, $var);
                } else {

                    array_push($variables, $token);
                }




            } else
                if (!$sameLevel) {
                    $collected = $this->collectVariables($token, $variableTypes, $returnAsType, $sameLevel, $distinct);



                    foreach ($collected as $variableCollected) {
                        if (in_array($variableCollected->name, $addedVariables) && $distinct !== false) {
                            continue;
                        }
                        array_push($addedVariables, $variableCollected->name);
                        array_push($variables, $variableCollected);
                    }
                }
        }
        //print_r( $addedVariables );
        return $variables;
    }

    public function collectVariablesDistinct(
        $tokenObj = null, $variableTypes = array(TokenString::class), $returnAsType = VariableToken::class)
    {
        return $this->collectVariables($tokenObj, $variableTypes, $returnAsType, false, true);
    }

    public function collectVariablesSameLevel(
        $tokenObj = null, $variableTypes = array(TokenString::class), $returnAsType = VariableToken::class)
    {
        return $this->collectVariables($tokenObj, $variableTypes, $returnAsType, true);
    }



    public function clean()
    {
        $this->tokens = array();
        foreach (TokenString::$snippets as $snippet) {
            $snippet->variablesDefined = array();
        }
    }

    public function getSnippetNameWithPackage()
    {

        return $this->packageName . '.' . $this->snippetName;
    }

    public function make($expressionStr = null)
    {

        global $defaultConditionals;
        $jsonStructure = "{}";

        if ($this->snippetName != null) {
            $this->content = TokenString::$snippets[$this->getSnippetNameWithPackage()]->content;
        }

        if ($expressionStr === null)
            $expressionStr = $this->content;

        if (!TokenStringValidator :: validateExpression($expressionStr)) {
            return false;
        }

        $expressionStr = trim($expressionStr);


        static $k = 0;
        $var = null;
        $singleToken = "";

        $addSingleToken = false;

        for ($i = 0; $i < strlen($expressionStr); $i++) {

            $addSingleToken = false;
            
            if (ConditionalToken :: analyze( $this, $expressionStr, $i,  $addSingleToken,  $singleToken )) continue;
            if (VariableToken ::    analyze( $this, $expressionStr, $i,  $addSingleToken,  $singleToken )) continue;
            if (OptionalToken ::    analyze( $this, $expressionStr, $i,  $addSingleToken,  $singleToken )) continue;
            SingleToken ::      analyze( $this, $expressionStr, $i,  $addSingleToken,  $singleToken );
        }
    }

    public function makeSingleToken(TokenString $tokenString = null)
    {
        $class = get_class(
            ($tokenString !== null ? $tokenString : $this)
        );

        switch ($class) {
            case 'SingleToken':
                print $this->content;
                break;
        }
    }

    public function hasTokenOfType($tokenObj = null, $tokenType = OptionalToken::class)
    {
        if ($tokenObj == null) {
            $tokenObj = $this;
        }

        $variables = array();

        foreach ($tokenObj->tokens as $token) {
            $ind = false;
            if (get_class($token) === $tokenType) {
                return true;
            } else
                if (count($token->tokens) > 0) {
                    $ind = $token->hasOptionalTokens($token);
                    if ($ind)
                        return true;
                }
        }
        return false;

    }

    public function hasOptionalTokens($tokenObj = null)
    {
        return $this->hasTokenOfType($tokenObj, OptionalToken::class);
    }


    public function genereateClassUsageCode( &$pToken, &$output, &$variables )
    {
        if ($pToken === null )
        {
            $pToken = $this;
        }
        
        $output .= endl()
            . "/* ####################### "
            . $pToken->snippetName
            . " : USAGE EXAMPLE ####################### "
            . endl();

        $output .= endl() . _tab()
            . '$var' . $pToken->snippetName . ' = new '
            . $pToken->snippetName . '();'
            . endl();

        foreach ($variables as $var) {
            $output .= endl();

            $sampleData = $pToken->snippetName . '_' . $var->name . '_EXAMPLE';

            if ($var->snippetName !== null) {
                $output .= _tab()
                    . '$var' . $var->name
                    . ' = new ' . $var->snippetName . '();'
                    . endl();

                $output .= _tab()
                    . '$var' . $pToken->snippetName
                    . '->add' . camelize($var->name)
                    . 'Item( $var' . camelize($var->name) . 'Item );'
                    . endl();

            } else {
                $output .= _tab()
                    . '$var' . $pToken->snippetName
                    . '->set' . camelize($var->name) . '("' . $sampleData . '");'
                    . endl();
            }
        }

        $output .= endl() . _tab() . '$var' . $pToken->snippetName . '->write();' . endl();

        $output .= endl() . "    ####################### USAGE EXAMPLE ####################### **/ " . endl();       
    }


    public function generateClass($pToken = null, $usePath = null)
    {

        if ($usePath !== null)
            $usePath = str_replace(getcwd(), "", $usePath);
        $output = "";

        $fileBegins = $pToken === null;

        if ($pToken === null) {
            $pToken = $this;
        }


        if ($fileBegins) {
            $output .= PHP_FILE_OPEN . endl(2);

            $output .= 'namespace ' . $pToken->namespace . ';';
            //$output .= 'require_once( "' . $fileName . '.php" );';
            $output .= endl();

            $output .= 'use system\jupiter\core\GeneratorClass;' . endl();
            //$output .= 'require_once( "GeneratorClass.php" );' . endl();
            // $output .= ' require_once( "core.php" );' . endl();

        }



        $variables = array();

        if ($fileBegins) {
            $variables =
                $this->collectVariablesDistinct(
                    $pToken,
                    array(VariableToken::class, CompoundVariableToken::class),
                    VariableToken::class
                );

              //  print IO_xmp_print_r( $variables );
        }

        $uniqueSnippets = array();

        if ($fileBegins) {
            foreach ($variables as $variable) {
                $uniqueSnippets[$variable->packageName . ':' . $variable->snippetName] = $variable;
            }
        }



        // requires
        if ($fileBegins) {
            foreach ($uniqueSnippets as $fileName) {
                print_r( $fileName );
                if ($fileName !== null && $fileName->snippetName !== null) {

                    $output .= 'use '
                        . trim( $usePath, '\\' )
                        . _bslash() . getPackageNameAsPath( $fileName->packageName )
                        . _bslash() . $fileName->snippetName . ';';
                    //$output .= 'require_once( "' . $fileName . '.php" );';
                    $output .= endl();
                }
            }
            
        }

        // comment with usage example
        if ($fileBegins) {

            $this->genereateClassUsageCode( $pToken, $output, $variables );


        }

        if ($fileBegins) {
            $output .= endl()
                . 'class ' . getDataTypeOfPackage($this->snippetName)
                . ' extends GeneratorClass {' . endl();
        }

        if ($fileBegins) {

            // attributes of class
            foreach ($variables as $variable) {
                $output .= endl() . _tab() .
                    'public ' . /*($variable->nativeType !== null ? ' ' . $variable->nativeType . ' ' : "") .
                    ($variable->snippetName !== null ? $variable->snippetName . ' ' : '') .*/
                    '$' . $variable->name . ';' . endl();
            }

            $addedVariables = array();


            // constructor 
            $output .= endl() . 'public function __construct()' . endl();
            $output .= endl() . '{' . endl();
            $output .= endl() . _tab(2) . 'parent :: __construct();' . endl();

            foreach ($variables as $variable) {
                $output .= endl() . _tab()
                    . '$this->' . $variable->name . ' = '
                    . ($variable->snippetName !== null ?
                        ' new ' . $variable->snippetName . '()' :
                        ' null'
                    )
                    . ';' . endl();
            }

            $output .= endl() . '}' . endl();


            // setters
            foreach ($variables as $variable) {
                $output .= endl() . _tab()
                    . 'public function set' . camelize($variable->name) . '( '
                    . $variable->snippetName . ' $' . $variable->name . ')'
                    . endl() . '{' . endl();

                $output .= endl() . _tab(2)
                    . ' $this->' . $variable->name . ' = $'
                    . $variable->name . ';' . endl()
                    . 'return $this; '
                    . endl() . '}' . endl();
            }
            // getters
            foreach ($variables as $variable) {
                $output .= endl() . _tab()
                    . 'public function get' . camelize($variable->name) . '()'
                    . endl() . '{' . endl();

                $output .= endl() . _tab(2)
                    . 'return $this->' . $variable->name . ';'
                    . endl() . '}' . endl();
            }
            // adders
            foreach ($variables as $variable) {
                if ($variable->snippetName !== null) {
                    $output .= endl() . _tab()
                        . 'public function add' . camelize($variable->name)
                        . 'Item( ' . $variable->snippetName . ' $item )'
                        . endl() . '{' . endl();

                    $output .= endl() . _tab(2)
                        . '$this->' . $variable->name . '->append( clone $item);'
                        . endl()
                        . 'return $this; '
                        . endl() . '}' . endl();
                }
            }


            // main write function
            $output .= endl() . _tab() . 'public function write() {' . endl();
            $output .= endl() . _tab(2) . '$output = ""; ' . endl();
            $output .= endl() . _tab(2) . '$this->validateData();' . endl();

        }

        $outputStack = "";

        $ignoreNextToken = false;

        while ($token = current($pToken->tokens)) {

            // o . o
            $nextToken = next($pToken->tokens);

            if ($token->content !== null) {
                $token->content = str_replace("$", "\\$", $token->content);
                $token->content = str_replace("\r", "", $token->content);
            }
            //foreach ($pToken->tokens as $token) {
            if ($ignoreNextToken) {
                $ignoreNextToken = false;
                continue;
            }

            if (get_class( $token ) !== SingleToken::class && strlen( $outputStack ) > 0) {
                $output .= __print($outputStack);
                $outputStack = "";
            }

            if (get_class($token) === ConditionalToken::class) {

                $conditionalExpressionIndexName = 'condition:' . $token->conditionalExpression;
                $output .= 'if ($this->validateOptions("' . $conditionalExpressionIndexName . '")) { ' .
                    endl() . $token->generateClass($token) . endl() . ' }';
            } 
            else
            if (get_class($token) === OptionalToken::class) {

                $output .= endl() . 'if (' . $token->conditionalExpression . ') {' . endl();
                $output .= endl() . $token->generateClass($token) . endl();
                $output .= endl() . '}' . endl();
            } 
            else
            if (get_class($token) === CompoundVariableToken::class) {

                $output .= _tab(2) . endl()
                    . '$output .= $this->writeArrayObject( $this->'
                    . $token->name . ', ' . $token->snippetName
                    .  '::class );' . endl();


            } 
            else
            if (get_class($token) === SingleToken::class) {

                if (is_object($nextToken) && get_class($nextToken) === VariableToken::class) {
                    $ignoreNextToken = true;
                    $outputStack .= ($token->content . '{$this->' . $nextToken->name . '}');
                } else {
                    $outputStack .= ($token->content);
                }

            } 
            else 
            if (get_class($token) === VariableToken::class) {
                $output .= __print('{$this->' . $token->name . '}');
            }
        }

        if ($outputStack !== null) {
            $output .= __print($outputStack);
            $outputStack = "";
        }




        if ($fileBegins) {
            $output .= endl() . ' return $output; }' . endl();
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
    public function generateClasses($wherePath = null, $snippetsArray = null)
    {
        if ($wherePath === null) {
            $wherePath = $this->outputPath;
        }
        $snippets = array();
        if ($snippetsArray !== null && is_array($snippetsArray)) {
            $snippets = $snippetsArray;
        } else {
            $snippets = TokenString::$snippets;
        }

        //print getcwd() . endl();
        $className = "";
        // print 'Snippets quantity ' . count(TokenString::$snippets) . endl();
        //    $this->collectVariables(null, array(CompoundVariableToken::class), VariableToken::class);

        if (!is_dir($wherePath)) {
            mkdir($wherePath, 0777, true);
        }


        if (is_array($snippets)) {

            foreach ($snippets as $key => $snippet) {


                $snippetWherePath = $wherePath;

                $snippet->baseWherePath = $wherePath;
                $snippet->mainPackageWherePath = 
                    $wherePath . _bslash() . getPackageNameAsPath($snippet->packageName) . _bslash(); 
 

                $snippet->snippetName = $snippet->name;

                $snippet->namespace =
                    trim(str_replace(getcwd(), "", $snippet->mainPackageWherePath  ), '\\');

                $snippet->clean();
                $snippet->make();

                $output = $snippet->generateClass(null, $snippet->baseWherePath );

                if (!is_dir($snippet->mainPackageWherePath)) {
                    mkdir($snippet->mainPackageWherePath, 0777, true);
                }


                file_put_contents(
                    $snippet->mainPackageWherePath .
                    camelize(getDataTypeOfPackage($snippet->snippetName)) . ".php",
                    $output
                );
                //print __ln(100, '%');
            }
        }
    }
}