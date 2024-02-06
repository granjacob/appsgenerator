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

    }
