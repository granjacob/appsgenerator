<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;
use system\uranus\generator\ObjectView;

/* ####################### ViewHtml : USAGE EXAMPLE ####################### 

	$varViewHtml = new ViewHtml();

	$varelements = new ObjectView();
	$varViewHtml->addElementsItem( $varElementsItem );

	$varViewHtml->write();

    ####################### USAGE EXAMPLE ####################### **/

class ViewHtml extends GeneratorClass
{

    public $elements;

    public function __construct()

    {

        parent:: __construct();

        $this->elements = new ObjectView();

    }

    public function setElements(ObjectView $elements)
    {

        $this->elements = $elements;
        return $this;
    }

    public function getElements()
    {

        return $this->elements;
    }

    public function addElementsItem(ObjectView $item)
    {

        $this->elements->append(clone $item);
        return $this;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= $this->writeArrayObject($this->elements, ObjectView::class);

        $output .= "";
        return $output;
    }

}


?>

