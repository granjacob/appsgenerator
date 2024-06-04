<?php

namespace system\uranus\java\java\defs;

use system\jupiter\core\GeneratorClass;
use system\uranus\java\defs\ClassAttribute;
use system\uranus\java\defs\JavaConstructor;
use system\uranus\java\defs\JavaMethod;

/* ####################### JavaClass : USAGE EXAMPLE ####################### 

	$varJavaClass = new JavaClass();

	$varJavaClass->setAccessModifier("JavaClass_accessModifier_EXAMPLE");

	$varJavaClass->setClassName("JavaClass_ClassName_EXAMPLE");

	$varJavaClass->setParentClass("JavaClass_parentClass_EXAMPLE");

	$varJavaClass->setImplementsClassList("JavaClass_implementsClassList_EXAMPLE");

	$varattributes = new ClassAttribute();
	$varJavaClass->addAttributesItem( $varAttributesItem );

	$varconstructor = new JavaConstructor();
	$varJavaClass->addConstructorItem( $varConstructorItem );

	$varmethods = new JavaMethod();
	$varJavaClass->addMethodsItem( $varMethodsItem );

	$varJavaClass->write();

    ####################### USAGE EXAMPLE ####################### **/

class JavaClass extends GeneratorClass
{

    public $accessModifier;

    public $ClassName;

    public $parentClass;

    public $implementsClassList;

    public $attributes;

    public $constructor;

    public $methods;

    public function __construct()

    {

        parent:: __construct();

        $this->accessModifier = null;

        $this->ClassName = null;

        $this->parentClass = null;

        $this->implementsClassList = null;

        $this->attributes = new ClassAttribute();

        $this->constructor = new JavaConstructor();

        $this->methods = new JavaMethod();

    }

    public function setAccessModifier($accessModifier)
    {

        $this->accessModifier = $accessModifier;
        return $this;
    }

    public function setClassName($ClassName)
    {

        $this->ClassName = $ClassName;
        return $this;
    }

    public function setParentClass($parentClass)
    {

        $this->parentClass = $parentClass;
        return $this;
    }

    public function setImplementsClassList($implementsClassList)
    {

        $this->implementsClassList = $implementsClassList;
        return $this;
    }

    public function setAttributes(ClassAttribute $attributes)
    {

        $this->attributes = $attributes;
        return $this;
    }

    public function setConstructor(JavaConstructor $constructor)
    {

        $this->constructor = $constructor;
        return $this;
    }

    public function setMethods(JavaMethod $methods)
    {

        $this->methods = $methods;
        return $this;
    }

    public function getAccessModifier()
    {

        return $this->accessModifier;
    }

    public function getClassName()
    {

        return $this->ClassName;
    }

    public function getParentClass()
    {

        return $this->parentClass;
    }

    public function getImplementsClassList()
    {

        return $this->implementsClassList;
    }

    public function getAttributes()
    {

        return $this->attributes;
    }

    public function getConstructor()
    {

        return $this->constructor;
    }

    public function getMethods()
    {

        return $this->methods;
    }

    public function addAttributesItem(ClassAttribute $item)
    {

        $this->attributes->append(clone $item);
        return $this;
    }

    public function addConstructorItem(JavaConstructor $item)
    {

        $this->constructor->append(clone $item);
        return $this;
    }

    public function addMethodsItem(JavaMethod $item)
    {

        $this->methods->append(clone $item);
        return $this;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "{$this->accessModifier}";
        $output .= " class {$this->ClassName} ";
        if (($this->verifyOptionalExpression($this->parentClass))) {


            $output .= "extends {$this->parentClass}";

        }

        $output .= " ";
        if (($this->verifyOptionalExpression($this->implementsClassList))) {


            $output .= "implements {$this->implementsClassList}";

        }

        $output .= "";
        $output .= "{";
        $output .= "    ";
        $output .= $this->writeArrayObject($this->attributes, ClassAttribute::class);

        $output .= "";
        $output .= "";
        $output .= "    ";
        $output .= $this->writeArrayObject($this->constructor, JavaConstructor::class);

        $output .= "";
        $output .= "";
        $output .= "    ";
        $output .= $this->writeArrayObject($this->methods, JavaMethod::class);

        $output .= "s";
        $output .= "";
        $output .= "    ";
        $output .= $this->writeArrayObject($this->attributes, GetterMethod::class);

        $output .= "";
        $output .= "";
        $output .= "    ";
        $output .= $this->writeArrayObject($this->attributes, SetterMethod::class);

        $output .= "";
        $output .= "}";
        return $output;
    }

}


?>

