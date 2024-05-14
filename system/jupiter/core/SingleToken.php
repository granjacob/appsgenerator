<?php


namespace system\jupiter\core;


class SingleToken extends TokenString
{

    public function __construct($content)
    {
        parent::__construct();
        $this->content = $content;
    }

    public function make($expressionStr = null)
    {
        $this->value = $this->content;
    }

    public static function analyze( &$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken )
    {
        $singleToken = $singleToken . $expressionStr[$i];

        if (($i == strlen($expressionStr) - 1) && strlen($singleToken) > 0) {
            $token->addSingleToken($token->tokens, $singleToken );
        }

    }


}

