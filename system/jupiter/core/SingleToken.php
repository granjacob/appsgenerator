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

}