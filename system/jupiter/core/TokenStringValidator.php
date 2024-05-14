<?php

namespace system\jupiter\core;

use system\jupiter\core\ConditionalToken;

class TokenStringValidator {


    public static function validateExpression($expressionStr = null)
    {
        global $defaultConditionals;


        $isValid = true;

        $countValidationVar = 0;
        $countValidationType = 0;
        $countValidationOpt = 0;
        $currentVariableLength = 0;
        $currentTypeLength = 0;


        for ($i = 0; $i < strlen($expressionStr); $i++) {
            $evalExpr_varDefOpen = catchDefExpr($expressionStr, $i, VAR_DEF_OPEN);
            $evalExpr_optDefOpen = catchDefExpr($expressionStr, $i, OPT_DEF_OPEN);

            $evalExpr_varDefClose = catchDefExpr($expressionStr, $i, VAR_DEF_CLOSE);
            $evalExpr_optDefClose = catchDefExpr($expressionStr, $i, OPT_DEF_CLOSE);

            $evalExpr_typeDefOpen = catchDefExpr($expressionStr, $i, TYPE_DEF_OPEN);
            $evalExpr_typeDefClose = catchDefExpr($expressionStr, $i, TYPE_DEF_CLOSE);


            $evalExpr_condDefOpen = catchDefExpr($expressionStr, $i, COND_DEF_OPEN);
            $evalExpr_condDefClose = catchDefExpr($expressionStr, $i, COND_DEF_CLOSE);


            if ($evalExpr_condDefOpen === COND_DEF_OPEN) {

                $i += strlen(COND_DEF_OPEN);
                $conditionalTokenContent = "";
                while ((($evalExpr_condDefClose =
                            catchDefExpr($expressionStr, $i, COND_DEF_CLOSE)) !== COND_DEF_CLOSE) &&
                    $i < strlen($expressionStr)
                ) {
                    $conditionalTokenContent .= $expressionStr[$i];
                    $i++;
                }

                if ($evalExpr_condDefClose !== COND_DEF_CLOSE) {
                    logSyntaxError('ConditionalToken is not correctly defined.', $expressionStr, $i);
                    return false;
                }

                $hasConditional = false;
                $hasExpression = false;
                foreach ($defaultConditionals as $conditionalKey) {
                    if (substr($conditionalTokenContent, 0, $len = strlen($conditionalKey)) === $conditionalKey) {

                        if ($len < $lenFinalContent = strlen($conditionalTokenContent)) {
                            $hasExpression = true;
                        }

                        $hasConditional = true;
                        break;
                    }
                }

                if (!$hasConditional || ($hasConditional && !$hasExpression)) {
                    logSyntaxError(
                        'ConditionalToken has not a valid conditional expression.',
                        $expressionStr, $i
                    );
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
                    logSyntaxError('Variable definition cannot have an empty name.', $expressionStr, $i);

                    return false;   // --> variable doesn't have name
                }

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
                    logSyntaxError('Type definition cannot have an empty name.', $expressionStr, $i);

                    return false;   // --> variable doesn't have name
                }

                $currentTypeLength = 0;
                $countValidationType--;
                $i += strlen(TYPE_DEF_CLOSE) - 1;
                continue;
            }

            if (!isValidDigitForVariableName($expressionStr[$i]) &&
                $countValidationVar == 1 &&
                $countValidationType == 1) {

                logSyntaxError('Variable type specified not valid.', $expressionStr, $i);

                return false;
            } else
                if ($countValidationType == 1) {
                    $currentTypeLength++;
                }

            // cannot give a name to a variable incorrectly
            if (!isValidDigitForVariableName($expressionStr[$i]) &&
                $countValidationVar == 1 &&
                $countValidationType == 0) {

                logSyntaxError('Variable name not valid.', $expressionStr, $i);

                return false;
            } else
                if ($countValidationVar == 1 && $countValidationType == 0) {
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
                logSyntaxError(
                    'Cannot open an optional definition (' . OPT_DEF_OPEN . ') inside a variable.',
                    $expressionStr,
                    $i
                );

                return false;
            }

            // fail
            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && $countValidationOpt > 0 && $countValidationVar == 0) {
                $countValidationOpt--;
                $i += strlen(OPT_DEF_CLOSE) - 1;
                continue;
            }

            if ($evalExpr_optDefClose === OPT_DEF_CLOSE && ($countValidationOpt == 0 || $countValidationVar == 1)) {
                logSyntaxError(
                    'Syntax error: Cannot close an optional section "'
                    . OPT_DEF_CLOSE . '" without open it before.',
                    $expressionStr, $i
                );

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

        return false;

    }


}