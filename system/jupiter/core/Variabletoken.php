<?php

namespace system\jupiter\core;


class VariableToken extends TokenString
    {

        public function __construct()
        {
            parent::__construct();
        }
        public function make($expressionStr = null)
        {
            $this->value = $this->jsonParameters[$this->name];
        }

        public static function analyze(&$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken)
        {
            
            $evalExpr_varDefOpen = catchDefExpr($expressionStr, $i, VAR_DEF_OPEN);
            if ($result = ($evalExpr_varDefOpen === VAR_DEF_OPEN)) {
                print 'Processing ' . $token->name . endl();
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
                $expr = preg_match_all("/\(([a-z|A-Z|0-9|\-|\_|\.]*)\)([a-z|A-Z|0-9|\-|\_]*)/", $varName, $matches);

                print_r( $expr ); 

                $snippetName = null;
                $variableName = $varName;

                if (is_array($matches[1]) && count($matches[1]) == 1)
                    $snippetName = $matches[1][0];
                if (is_array($matches[2]) && count($matches[2]) == 1) {
                    $variableName = $matches[2][0];
                } /*else {
                    $variableName = $varName;
                }*/


                $nativeTypes = array('int', 'string', 'Date');

                if ($hasNativeType = in_array($snippetName, $nativeTypes)) {
                    $exprClass = VariableToken::class;
                }

                //TokenString::$snippets[$this->snippetName]->addVariableName($variableName);
                else
                    if ($snippetName !== null && $variableName !== null) {
                        $exprClass = CompoundVariableToken::class;
                    }


                $var = new $exprClass();
                $var->posStart = $posStart;
                $var->posEnd = $posEnd;
                $var->name = $variableName;
                //$var->packageName = "kjdlasjdaklsds"; // ---
                $var->fullNameReference = $fullNameReference;

                if ($hasNativeType) {
                    $var->nativeType = $snippetName;
                }

                if (get_class($var) === CompoundVariableToken::class) {
                    print 'SnippetName = ' . $snippetName . endl();
                    $var->packageName = getPackageOfDataType($snippetName);

                    if ($var->packageName === "" || $var->packageName === null) {
                        print 'Es nulooooooooooooooooo';
                        print ' With package name = ' . $token->packageName;


                        /*   if ($snippetName === "PrintMyData") {
                            print_r( $this );
                               exit;
                           }*/
                        $var->packageName = $token->packageName;
                    }

                    print '/**/packageName = ' . $var->packageName . endl();

                    $var->snippetName = getDataTypeOfPackage($snippetName);
                    print '/**/snippetName = ' . $var->snippetName . endl();

                    $var->make();
                }
                $var->id = TokenString :: getNextId();


                $i = $posEnd - 1;


                $addSingleToken = true;
                $token->addSingleToken($token->tokens, $singleToken);
                array_push($token->tokens, $var);
            }

            return $result;
        }

        

}
