<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;
use system\uranus\generator\ClassAttribute;

/* ####################### ClassDef : USAGE EXAMPLE ####################### 

	$varClassDef = new ClassDef();

	$varClassDef->setNamespace("ClassDef_namespace_EXAMPLE");

	$varClassDef->setName("ClassDef_name_EXAMPLE");

	$varClassDef->setExtensionClass("ClassDef_extensionClass_EXAMPLE");

	$varattributes = new ClassAttribute();
	$varClassDef->addAttributesItem( $varAttributesItem );

	$varClassDef->write();

    ####################### USAGE EXAMPLE ####################### **/

class ClassDef extends GeneratorClass
{

    public $namespace;

    public $name;

    public $extensionClass;

    public $attributes;

    public function __construct()

    {

        parent:: __construct();

        $this->namespace = null;

        $this->name = null;

        $this->extensionClass = null;

        $this->attributes = new ClassAttribute();

    }

    public function setNamespace($namespace)
    {

        $this->namespace = $namespace;
        return $this;
    }

    public function setName($name)
    {

        $this->name = $name;
        return $this;
    }

    public function setExtensionClass($extensionClass)
    {

        $this->extensionClass = $extensionClass;
        return $this;
    }

    public function setAttributes(ClassAttribute $attributes)
    {

        $this->attributes = $attributes;
        return $this;
    }

    public function getNamespace()
    {

        return $this->namespace;
    }

    public function getName()
    {

        return $this->name;
    }

    public function getExtensionClass()
    {

        return $this->extensionClass;
    }

    public function getAttributes()
    {

        return $this->attributes;
    }

    public function addAttributesItem(ClassAttribute $item)
    {

        $this->attributes->append(clone $item);
        return $this;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "<?php\n";
        $output .= "\n";
        $output .= "            namespace {$this->namespace};\n";
        $output .= "            class {$this->name} \n";
        if (($this->extensionClass !== null &&
            $this->extensionClass->count() > 0)) {


            $output .= "extends {$this->extensionClass}\n";

        }

        $output .= " {\n";
        $output .= "                \n";
        $output .= "                \n";
        $output .= $this->writeArrayObject($this->attributes, ClassAttribute::class);

        $output .= "\n";
        $output .= "\n";
        $output .= "                \n";
        $output .= $this->writeArrayObject($this->attributes, ClassGetter::class);

        $output .= "\n";
        $output .= "\n";
        $output .= "                \n";
        $output .= $this->writeArrayObject($this->attributes, ClassSetter::class);

        $output .= "\n";
        $output .= "\n";
        $output .= "            }\n";
        $output .= "\n";
        $output .= "            ?>\n";
        return $output;
    }

}


?>

