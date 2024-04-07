<?php

namespace system\jupiter\core;

class ConditionalToken extends OptionalToken
{

    public function __construct()
    {
        parent::__construct();
    }

    public static function analyze( &$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken )
    {
        global $defaultConditionals;

        $evalExpr_condDefOpen = catchDefExpr($expressionStr, $i, COND_DEF_OPEN);
        $evalExpr_condDefClose = catchDefExpr($expressionStr, $i, COND_DEF_CLOSE);

        if ($result = ($evalExpr_condDefOpen === COND_DEF_OPEN)) {
            $i += strlen(COND_DEF_OPEN);
            $conditionalTokenContent = "";

            while (
                (($evalExpr_condDefClose = $token->catchDefExpr($expressionStr, $i, COND_DEF_CLOSE)) !== COND_DEF_CLOSE) &&
                $i < strlen($expressionStr)
            ) {
                $conditionalTokenContent .= $expressionStr[$i];
                $i++;
            }

            $conditionalKey = "";

            foreach ($defaultConditionals as $conditionalKey) {
                if (substr($conditionalTokenContent, 0, $len = strlen($conditionalKey)) === $conditionalKey) {

                    $varConditionalToken = new ConditionalToken();
                    $varConditionalToken->packageName = $token->packageName;
                    $varConditionalToken->conditionalExpression = $conditionalKey;
                    $varConditionalToken->content = substr($conditionalTokenContent, $len, strlen($conditionalTokenContent) - $len);

                    $varConditionalToken->make($varConditionalToken->content);


                    array_push($token->tokens, $varConditionalToken);


                    break;
                }
            }

            $i += strlen(COND_DEF_CLOSE) - 1;
        }
        return $result;
    }
}