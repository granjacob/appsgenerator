<?php

namespace system\jupiter\core;


class Snippet extends TokenString
    {

        public $language;
        public $variablesDefined;   // this is for control the variables names defined in a template/snippet
    
        public function __construct()
        {
            parent::__construct();
            $this->variablesDefined = array();
        }


        public function addVariableName($varName)
        {
            if (!isset($this->variablesDefined[$varName])) {
                $this->variablesDefined[$varName] = $varName;
            }
            /*    else {
                    throw new Exception(
                        "Cannot add more than one variable with the same name to a snippet/template." . endl() .
                    "Please review the snippet/template " . $this->name );
                }*/
        }

        public function removeVariableName($varName)
        {
            if (isset($this->variablesDefined[$varName])) {
                unset($this->variablesDefined[$varName]);
            }
        }
        /**
         *
         * @param mixed $token
         * @param mixed $expressionStr
         * @param mixed $i
         */
        public static function analyze(&$token, $expressionStr, &$i, bool &$addSingleToken, string &$singleToken) {
        }
    
   
}