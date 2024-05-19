<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;
use system\uranus\generator\MethodParameter;

/* ####################### ClassMethod : USAGE EXAMPLE ####################### 

	$varClassMethod = new ClassMethod();

	$varClassMethod->setMethodName("ClassMethod_methodName_EXAMPLE");

	$varparameters = new MethodParameter();
	$varClassMethod->addParametersItem( $varParametersItem );

	$varClassMethod->setMethodBody("ClassMethod_methodBody_EXAMPLE");

	$varClassMethod->write();

    ####################### USAGE EXAMPLE ####################### **/

class ClassMethod extends GeneratorClass
{

    public $methodName;

    public $parameters;

    public $methodBody;

    public function __construct()

    {

        parent:: __construct();

        $this->methodName = null;

        $this->parameters = new MethodParameter();

        $this->methodBody = null;

    }

    public function setMethodName($methodName)
    {

        $this->methodName = $methodName;
        return $this;
    }

    public function setParameters(MethodParameter $parameters)
    {

        $this->parameters = $parameters;
        return $this;
    }

    public function setMethodBody($methodBody)
    {

        $this->methodBody = $methodBody;
        return $this;
    }

    public function getMethodName()
    {

        return $this->methodName;
    }

    public function getParameters()
    {

        return $this->parameters;
    }

    public function getMethodBody()
    {

        return $this->methodBody;
    }

    public function addParametersItem(MethodParameter $item)
    {

        $this->parameters->append(clone $item);
        return $this;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "public function {$this->methodName}( ";
        if (($this->verifyOptionalExpression($this->parameters))) {


            $output .= $this->writeArrayObject($this->parameters, MethodParameter::class);

            $output .= "";

        }

        $output .= ")";
        $output .= "            {";
        $output .= "                {$this->methodBody}";
        $output .= "            }";
        return $output;
    }

}


?>

