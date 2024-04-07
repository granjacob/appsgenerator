<?php

namespace system\jupiter\core;

class CompoundVariableToken extends TokenString
{


    public function __construct()
    {
        parent::__construct();
    }
    /*   public function make(  $expressionStr=null )
       {
           $this->value = $this->jsonParameters[$this->name];
       }*/

    /**
     *
     * @param mixed $token
     * @param mixed $expressionStr
     * @param mixed $i
     */
    public static function analyze(&$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken) {
    }
    

}