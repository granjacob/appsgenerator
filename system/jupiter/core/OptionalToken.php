<?php

namespace system\jupiter\core;

class OptionalToken extends TokenString
{

    public $conditionalExpression;

    public function __construct()
    {
        parent::__construct();
    }

    public static function analyze(&$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken )
    {
        $evalExpr_optDefOpen = catchDefExpr($expressionStr, $i, OPT_DEF_OPEN);
        $evalExpr_optDefClose = catchDefExpr($expressionStr, $i, OPT_DEF_CLOSE);
        
        if ($result = ($evalExpr_optDefOpen === OPT_DEF_OPEN)) {
            $qOptOpenCount = 0;
            for ($j = $i; $j < strlen($expressionStr); $j++) {
                $evalExpr_optDefClose = $token->catchDefExpr($expressionStr, $j, OPT_DEF_CLOSE);
                $evalExpr_optDefOpen = $token->catchDefExpr($expressionStr, $j, OPT_DEF_OPEN);
                if ($evalExpr_optDefOpen === OPT_DEF_OPEN) {
                    $qOptOpenCount++;
                    $j += strlen(OPT_DEF_OPEN) - 1;
                }
                else
                if ($evalExpr_optDefClose === OPT_DEF_CLOSE) {

                    $qOptOpenCount--;

                    if ($qOptOpenCount === 0) {

                        $optExpr = new OptionalToken();
                        $optExpr->packageName = $token->packageName;     // package name
                        $optExpr->content = substr(
                            $expressionStr,
                            $i + strlen(OPT_DEF_OPEN),
                            $j - $i - strlen(OPT_DEF_CLOSE)
                        );
                        $optExpr->posStart = $i;
                        $optExpr->posEnd = $j + strlen(OPT_DEF_CLOSE) - 1;


                        $optExpr->make($optExpr->content);
                        $addSingleToken = true;

                        $token->addSingleToken($token->tokens, $singleToken, OptionalToken :: getNextId() );

                        $variables = $optExpr->collectVariablesSameLevel(
                            null,
                            CompoundVariableToken::class,
                            CompoundVariableToken::class );

                        $conditionalExpression = "";
                        foreach ($variables as $variable) {
                            $conditionalExpression .=
                                ' ($token->' . $variable->name . ' !== null && ' .
                                '$token->' . $variable->name . '->count() > 0) &&';
                        }

                        $optExpr->conditionalExpression =
                            str_replace("&&", "&&\n", trim($conditionalExpression, "& "));

                        array_push($token->tokens, $optExpr);
                        $j += strlen(OPT_DEF_CLOSE) - 1;
                        break;
                    }

                    $j += strlen(OPT_DEF_CLOSE) - 1;
                }
            }
            $i = $j;
        }

        return $result;
    }

}