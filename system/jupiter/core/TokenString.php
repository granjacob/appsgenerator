<?php

namespace system\jupiter\core;

use DOMDocument;


class TokenString
{

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


    public function catchDefExpr($expressionStr, $offset, $def)
    {
        return substr($expressionStr, $offset, strlen($def));
    }

    public function loadSnippets($filename = null)
    {
        if ($filename === null) {
            $filename = $this->snippetsXMLFile;
        }

        $xml = new DOMDocument();

        $xml->load($filename);

        $snippets = $xml->getElementsByTagName('snippet');

        foreach ($snippets as $snippet) {
            $newSnippet = new Snippet();
            $newSnippet->name = $snippet->attributes['name']->value;
            $newSnippet->content = trim($snippet->nodeValue);
            TokenString::$snippets[$snippet->getAttribute('name')] = $newSnippet;
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
        $var->id = $id;
        $offset = $posEnd - 1;

        return $var;
    }

    public function addSingleToken(&$tokensArray, &$content, &$id)
    {
        if (strlen($content) > 0) {
            $newSingleToken = new SingleToken($content);
            $newSingleToken->id = $id;
            $id++;
            array_push($tokensArray, $newSingleToken);
        }
        $content = "";
    }

    public function isValidDigitForVariableName($chr)
    {
        if (ctype_alnum($chr) || $chr == '_' || $chr == '-')
            return true;
        return false;
    }

    public function logSyntaxError($msg, $expressionStr, $currentIndex)
    {
        print '<strong>Syntax error:</strong> ' . $msg . "<br/>\n";
        print '<strong>Check></strong> "' . substr($expressionStr, max(0, $currentIndex - 8), min(strlen($expressionStr) - $currentIndex, 16)) . '", index: ' . $currentIndex . "<br/>\n";
    }

    public function collectVariables($tokenObj = null, $variableTypes = array(TokenString::class), $returnAsType = VariableToken::class, $sameLevel = false, $distinct = false)
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


                if (get_class($token) != $returnAsType) {
                    $var = new $returnAsType();
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

    public function collectVariablesDistinct($tokenObj = null, $variableTypes = array(TokenString::class), $returnAsType = VariableToken::class)
    {
        return $this->collectVariables($tokenObj, $variableTypes, $returnAsType, false, true);
    }

    public function collectVariablesSameLevel($tokenObj = null, $variableTypes = array(TokenString::class), $returnAsType = VariableToken::class)
    {
        return $this->collectVariables($tokenObj, $variableTypes, $returnAsType, true);
    }

    public function validateExpression($expressionStr = null)
    {
        global $defaultConditionals;
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

        for ($i = 0; $i < strlen($expressionStr); $i++) {
            $evalExpr_varDefOpen = $this->catchDefExpr($expressionStr, $i, VAR_DEF_OPEN);
            $evalExpr_optDefOpen = $this->catchDefExpr($expressionStr, $i, OPT_DEF_OPEN);

            $evalExpr_varDefClose = $this->catchDefExpr($expressionStr, $i, VAR_DEF_CLOSE);
            $evalExpr_optDefClose = $this->catchDefExpr($expressionStr, $i, OPT_DEF_CLOSE);

            $evalExpr_typeDefOpen = $this->catchDefExpr($expressionStr, $i, TYPE_DEF_OPEN);
            $evalExpr_typeDefClose = $this->catchDefExpr($expressionStr, $i, TYPE_DEF_CLOSE);


            $evalExpr_condDefOpen = $this->catchDefExpr($expressionStr, $i, COND_DEF_OPEN);
            $evalExpr_condDefClose = $this->catchDefExpr($expressionStr, $i, COND_DEF_CLOSE);


            if ($evalExpr_condDefOpen === COND_DEF_OPEN) {

                $i += strlen(COND_DEF_OPEN);
                $conditionalTokenContent = "";
                while (
                    (($evalExpr_condDefClose = $this->catchDefExpr($expressionStr, $i, COND_DEF_CLOSE)) !== COND_DEF_CLOSE) &&
                    $i < strlen($expressionStr)
                ) {
                    $conditionalTokenContent .= $expressionStr[$i];
                    $i++;
                }

                if ($evalExpr_condDefClose !== COND_DEF_CLOSE) {
                    $this->logSyntaxError('ConditionalToken is not correctly defined.', $expressionStr, $i);
                    return false;
                }

                $hasConditional = false;
                $hasExpression = false;
                foreach ($defaultConditionals as $conditionalKey) {
                    if (substr($conditionalTokenContent, 0, $len = strlen($conditionalKey)) === $conditionalKey) {

                        if ($len < $lenFinalContent = strlen($conditionalTokenContent)) {
                            $hasExpression = true;
                        }

                        $varConditionalToken = new ConditionalToken();
                        $varConditionalToken->conditionalExpression = $conditionalKey;
                        $varConditionalToken->content = substr($conditionalTokenContent, $len, strlen($conditionalTokenContent) - $len);
                      
                        $hasConditional = true;
                        break;
                    }
                }

                if (!$hasConditional || ($hasConditional && !$hasExpression)) {
                    $this->logSyntaxError('ConditionalToken has not a valid conditional expression.', $expressionStr, $i);
                    return false;
                }



                $i += strlen(COND_DEF_CLOSE) - 1;
                continue;
            }


            // variable definition
            if ($evalExpr_varDefOpen === VAR_DEF_OPEN && $countValidationVar == 0 && $countValidationType == 0) {
                $countValidationVar++;
                $i += strlen(VAR_DEF_OPEN) - 1;
                continue;
            }

            // variable definition close
            if ($evalExpr_varDefClose === VAR_DEF_CLOSE && $countValidationVar == 1 && $countValidationType == 0) {
                if ($currentVariableLength == 0) {
                    $this->logSyntaxError('Variable definition cannot have an empty name.', $expressionStr, $i);

                    return false;   // --> variable doesn't have name
                }

                $currentVariableName = "";
                $currentVariableLength = 0;
                $countValidationVar--;
                $i += strlen(VAR_DEF_CLOSE) - 1;
                continue;
            }


            // type definition
            if ($evalExpr_typeDefOpen === TYPE_DEF_OPEN && $countValidationVar == 1 && $countValidationType == 0) {
                $countValidationType++;
                $i += strlen(TYPE_DEF_OPEN) - 1;
                continue;
            }
            if ($evalExpr_typeDefClose === TYPE_DEF_CLOSE && $countValidationVar == 1 && $countValidationType == 1) {
                if ($currentTypeLength == 0) {
                    $this->logSyntaxError('Type definition cannot have an empty name.', $expressionStr, $i);

                    return false;   // --> variable doesn't have name
                }

                $currentTypeName = "";
                $currentTypeLength = 0;
                $countValidationType--;
                $i += strlen(TYPE_DEF_CLOSE) - 1;
                continue;
            }

            if (!$this->isValidDigitForVariableName($expressionStr[$i]) && $countValidationVar == 1 && $countValidationType == 1) {
                print $currentTypeName . "<br/>\n";
                $this->logSyntaxError('Variable type specified not valid.', $expressionStr, $i);
                return false;
            } else
                if ($countValidationType == 1) {
                    $currentTypeName .= $expressionStr[$i];
                    $currentTypeLength++;
                }

            // cannot give a name to a variable incorrectly
            if (!$this->isValidDigitForVariableName($expressionStr[$i]) && $countValidationVar == 1 && $countValidationType == 0) {
                $this->logSyntaxError('Variable name not valid.', $expressionStr, $i);
                return false;
            } else
                if ($countValidationVar == 1 && $countValidationType == 0) {
                    $currentVariableName .= $expressionStr[$i];

                    $currentVariableLength++;
                }

            // optional section definition
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN && $countValidationVar == 0) {
                $countValidationOpt++;
                $i += strlen(OPT_DEF_OPEN) - 1;
                continue;
            }

            // fail optional section definition inside a variable
            if ($evalExpr_optDefOpen === OPT_DEF_OPEN && $countValidationVar == 1) {
                $this->logSyntaxError('Cannot open an optional definition (' . OPT_DEF_OPEN . ') inside a variable.', $expressionStr, $i);

                return false;
            }

            // fail
            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && $countValidationOpt > 0 && $countValidationVar == 0) {
                $countValidationOpt--;
                $i += strlen(OPT_DEF_CLOSE) - 1;
                continue;
            }

            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && ($countValidationOpt == 0 || $countValidationVar == 1)) {
                $this->logSyntaxError('Syntax error: Cannot close an optional section "' . OPT_DEF_CLOSE . '" without open it before.', $expressionStr, $i);

                return false;
            }

        }

        if (
            $countValidationVar == 0 &&
            $countValidationOpt == 0 &&
            $countValidationType == 0 &&
            $currentVariableLength == 0
        ) {
            return true;
        } else {
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

    public function make($expressionStr = null)
    {
        global $defaultConditionals;
        $jsonStructure = "{}";

        if ($this->snippetName != null) {
            $this->content = TokenString::$snippets[$this->snippetName]->content;
        }

        if ($expressionStr === null)
            $expressionStr = $this->content;

        if (!$this->validateExpression($expressionStr)) {
            return false;
        }

        $expressionStr = trim($expressionStr);


        static $k = 0;
        $var = null;
        $singleToken = "";

        $addSingleToken = false;

        for ($i = 0; $i < strlen($expressionStr); $i++) {

            $addSingleToken = false;

            $evalExpr_varDefOpen = $this->catchDefExpr($expressionStr, $i, VAR_DEF_OPEN);
            $evalExpr_optDefOpen = $this->catchDefExpr($expressionStr, $i, OPT_DEF_OPEN);
            $evalExpr_varDefClose = $this->catchDefExpr($expressionStr, $i, VAR_DEF_CLOSE);
            $evalExpr_optDefClose = $this->catchDefExpr($expressionStr, $i, OPT_DEF_CLOSE);

            $evalExpr_varDefClose = $this->catchDefExpr($expressionStr, $i, VAR_DEF_CLOSE);
            $evalExpr_optDefClose = $this->catchDefExpr($expressionStr, $i, OPT_DEF_CLOSE);

            $evalExpr_condDefOpen = $this->catchDefExpr($expressionStr, $i, COND_DEF_OPEN);
            $evalExpr_condDefClose = $this->catchDefExpr($expressionStr, $i, COND_DEF_CLOSE);

            if ($evalExpr_varDefOpen === COND_DEF_OPEN) {
                $i += strlen(COND_DEF_OPEN);
                $conditionalTokenContent = "";

                while (
                    (($evalExpr_condDefClose = $this->catchDefExpr($expressionStr, $i, COND_DEF_CLOSE)) !== COND_DEF_CLOSE) &&
                    $i < strlen($expressionStr)
                ) {
                    $conditionalTokenContent .= $expressionStr[$i];
                    $i++;
                }

                $conditionalKey = "";

                foreach ($defaultConditionals as $conditionalKey) {
                    if (substr($conditionalTokenContent, 0, $len = strlen($conditionalKey)) === $conditionalKey) {

                        $varConditionalToken = new ConditionalToken();
                        $varConditionalToken->conditionalExpression = $conditionalKey;
                        $varConditionalToken->content = substr($conditionalTokenContent, $len, strlen($conditionalTokenContent) - $len);

                        $varConditionalToken->make($varConditionalToken->content);


                        array_push($this->tokens, $varConditionalToken);


                        break;
                    }
                }

                $i += strlen(COND_DEF_CLOSE) - 1;
            } else
                if ($evalExpr_varDefOpen === VAR_DEF_OPEN) {

                    $posStart = $i;

                    $posEnd = strpos(
                        $expressionStr,
                        VAR_DEF_CLOSE,
                        $i
                    ) + strlen(VAR_DEF_CLOSE);

                    $varName = substr(
                        $expressionStr,
                        $posStart + strlen(VAR_DEF_OPEN),
                        $posEnd - $posStart - strlen(VAR_DEF_CLOSE) - strlen(VAR_DEF_CLOSE)
                    );
                    $fullNameReference = VAR_DEF_OPEN . $varName . VAR_DEF_CLOSE;
                    $exprClass = VariableToken::class;


                    $matches = array();
                    $expr = preg_match_all("/\(([a-z|A-Z|0-9|\-|\_]*)\)([a-z|A-Z|0-9|\-|\_]*)/", $varName, $matches);

                    $snippetName = null;
                    $variableName = $varName;

                    if (is_array($matches[1]) && count($matches[1]) == 1)
                        $snippetName = $matches[1][0];
                    if (is_array($matches[2]) && count($matches[2]) == 1) {
                        $variableName = $matches[2][0];
                    } else {
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
                    if (get_class($var) == CompoundVariableToken::class) {
                        $var->snippetName = $snippetName;
                        $var->make();
                    }
                    $var->id = $k;


                    $i = $posEnd - 1;

                    $k++;

                    $addSingleToken = true;
                    $this->addSingleToken($this->tokens, $singleToken, $k);
                    array_push($this->tokens, $var);
                } else
                    if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                        $qOptOpenCount = 0;
                        for ($j = $i; $j < strlen($expressionStr); $j++) {
                            $evalExpr_optDefClose = $this->catchDefExpr($expressionStr, $j, OPT_DEF_CLOSE);
                            $evalExpr_optDefOpen = $this->catchDefExpr($expressionStr, $j, OPT_DEF_OPEN);
                            if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                                $qOptOpenCount++;
                                $j += strlen(OPT_DEF_OPEN) - 1;
                            } else
                                if ($evalExpr_optDefClose === OPT_DEF_CLOSE) {

                                    $qOptOpenCount--;

                                    if ($qOptOpenCount === 0) {

                                        $optExpr = new OptionalToken();
                                        $optExpr->content = substr(
                                            $expressionStr,
                                            $i + strlen(OPT_DEF_OPEN),
                                            $j - $i - strlen(OPT_DEF_CLOSE)
                                        );
                                        $optExpr->posStart = $i;
                                        $optExpr->posEnd = $j + strlen(OPT_DEF_CLOSE) - 1;

                                        $k++;
                                        $optExpr->make($optExpr->content);
                                        $addSingleToken = true;

                                        $this->addSingleToken($this->tokens, $singleToken, $k);

                                        $variables = $optExpr->collectVariablesSameLevel(null, CompoundVariableToken::class, CompoundVariableToken::class);

                                        $conditionalExpression = "";
                                        foreach ($variables as $variable) {
                                            $conditionalExpression .=
                                                ' ($this->' . $variable->name . ' !== null && ' .
                                                '$this->' . $variable->name . '->count() > 0) &&';
                                        }

                                        $optExpr->conditionalExpression = str_replace("&&", "&&\n", trim($conditionalExpression, "& "));

                                        array_push($this->tokens, $optExpr);
                                        $j += strlen(OPT_DEF_CLOSE) - 1;
                                        break;
                                    }

                                    $j += strlen(OPT_DEF_CLOSE) - 1;
                                }
                        }
                        $i = $j;
                    } else {
                        $singleToken = $singleToken . $expressionStr[$i];
                    }



            if (($i == strlen($expressionStr) - 1) && strlen($singleToken) > 0) {
                $this->addSingleToken($this->tokens, $singleToken, $k);
            }
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





    public function generateClass($pToken = null)
    {

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
                    array(VariableToken::class, CompoundVariableToken::class),
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
                    $output .= _tab() . '$var' . $this->snippetName . '->add' . camelize($var->name) . 'Item( $var' . camelize($var->name) . 'Item );' . endl();
                } else {
                    $output .= _tab() . '$var' . $this->snippetName . '->set' . camelize($var->name) . '("' . $sampleData . '");' . endl();
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
                    ($variable->snippetName !== null ? $variable->snippetName . ' ' : '') .
                    '$' . $variable->name . ';' . endl();
            }

            $addedVariables = array();


            // constructor 
            $output .= endl() . 'public function __construct()' . endl();
            $output .= endl() . '{' . endl();
            $output .= endl() . _tab(2) . 'parent :: __construct();' . endl();

            foreach ($variables as $variable) {
                $output .= endl() . _tab() . '$this->' . $variable->name . ' = ' . ($variable->snippetName !== null ? ' new ' . $variable->snippetName . '()' : ' null') . ';' . endl();
            }

            $output .= endl() . '}' . endl();


            // setters
            foreach ($variables as $variable) {
                $output .= endl() . _tab() . 'public function set' . camelize($variable->name) . '( ' . $variable->snippetName . ' $' . $variable->name . ')' . endl() . '{' . endl();
                $output .= endl() . _tab(2) . ' $this->' . $variable->name . ' = $' . $variable->name . ';' . endl() . 'return $this; ' . endl() . '}' . endl();
            }
            // getters
            foreach ($variables as $variable) {
                $output .= endl() . _tab() . 'public function get' . camelize($variable->name) . '()' . endl() . '{' . endl();
                $output .= endl() . _tab(2) . 'return $this->' . $variable->name . ';' . endl() . '}' . endl();
            }
            // adders
            foreach ($variables as $variable) {
                if ($variable->snippetName !== null) {
                    $output .= endl() . _tab() . 'public function add' . camelize($variable->name) . 'Item( ' . $variable->snippetName . ' $item )' . endl() . '{' . endl();
                    $output .= endl() . _tab(2) . '$this->' . $variable->name . '->append( clone $item);' . endl() . 'return $this; ' . endl() . '}' . endl();
                }
            }


            // main write function
            $output .= endl() . _tab() . 'public function write() {' . endl();
            $output .= endl() . _tab() . '$this->validateData();' . endl();

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
            if (get_class($token) === ConditionalToken::class) {

                $output .= __print($outputStack);
                $outputStack = "";
                $conditionalExpressionIndexName = 'condition:' . $token->conditionalExpression;
                $output .= 'if ($this->validateOptions("' . $conditionalExpressionIndexName . '")) { ' .
                    endl() . $token->generateClass($token) . endl() . ' }';
            } else
                if (get_class($token) === OptionalToken::class) {
                    $output .= __print($outputStack);
                    $outputStack = "";
                    $output .= endl() . 'if (' . $token->conditionalExpression . ') {' . endl();
                    $output .= endl() . $token->generateClass($token) . endl();
                    $output .= endl() . '}' . endl();
                } else
                    if (get_class($token) === CompoundVariableToken::class) {
                        $output .= __print($outputStack);
                        $outputStack = "";
                        $output .= _tab(2) . endl() . '$this->writeArrayObject( $this->' . $token->name  . ' );' . endl();
                        /*$output .= _tab(2) . endl() . 'if ($this->' . $token->name . ' !== null) {';
                        $output .= _tab(2) . endl() . '$keys = array_keys( get_object_vars( $this->' . $token->name . ') );';
                        $output .= _tab(2) . endl() . 'foreach ($this->' . $token->name . ' as $key => $item_' . $token->name . ') {' . endl();
                        $output .= _tab(2) . '$item_' . $token->name . '->options = $this->getOptionsArray( $keys, $key, $item_' . $token->name . ' );';
                      */
                      
                        /*  $output .= _tab(3) .
                            '$options = array( "condition:notlast" => (end( $keys ) === $key), ' . endl() .
                            '"condition:first" => ($key === $keys[0]),' . endl() .
                            '"condition:notfirst" => ($key !== $keys[0]), ' . endl() .
                            '"condition:disabled" => ($item_' . $token->name . '->disabled === true), ' . endl() .
                            '"condition:notdisabled" => ($item_' . $token->name . '->disabled !== true), ' . endl() .
                            '"condition:selected" => ($item_' . $token->name . '->selected === true), ' . endl() .
                            '"condition:notselected" => ($item_' . $token->name . '->selected !== true), ' . endl() .
                            '"condition:enabled" => ($item_' . $token->name . '->disabled !== true), ' . endl() .
                            '"condition:notenabled" => ($item_' . $token->name . '->disabled === true), ' . endl() .
                            '"condition:last" => ($key === end( $keys )), ' . endl() .
                            ');';*/



                       // $output .= _tab(3) . '$item_' . $token->name . '->write();' . endl();
                       // $output .= _tab(2) . '}}' . endl();

                    } else
                        if (get_class($token) === SingleToken::class) {

                            if (is_object($nextToken) && get_class($nextToken) === VariableToken::class) {
                                $ignoreNextToken = true;
                                $outputStack .= ($token->content . '{$this->' . $nextToken->name . '}');
                            } else {
                                $outputStack .= ($token->content);
                            }

                        } else if (get_class($token) === VariableToken::class) {
                            $output .= __print('{$this->' . $token->name . '}');
                        }
        }

        if ($outputStack !== null) {
            $output .= __print($outputStack);
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
        print 'Snippets quantity ' . count(TokenString::$snippets) . endl();
        $this->collectVariables(null, array(CompoundVariableToken::class), VariableToken::class);

        foreach (TokenString::$snippets as $snippet) {

            $this->snippetName = $snippet->name;
            $this->clean();
            $this->make();
            $output = $this->generateClass();
            file_put_contents("outputclasses/" . camelize($this->snippetName) . ".php", $output);
            print __ln(100, '%');
        }
    }
}
