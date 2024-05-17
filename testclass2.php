<?php


require_once( "core.php" );

use system\uranus\generator\ClassDef;
use system\uranus\generator\ClassAttribute;
use system\uranus\generator\ObjectView;
use system\uranus\generator\ViewHtml;

$varClass = new ClassDef();

$varClass->setNamespace("ceres");

$varClass->setName("Empresa");

//$varClass->setExtensionClass(null);

$varClassAttribute = new ClassAttribute();

$varClassAttribute->setAccessModifier("public");

$varClassAttribute->setName("id");
$varClass->addAttributesItem( $varClassAttribute );

$varClassAttribute->setName("nombre");
$varClass->addAttributesItem( $varClassAttribute );

$varClassAttribute->setName("direccion");

$varClassAttribute->setName("telefono");
$varClass->addAttributesItem( $varClassAttribute );

$varClassAttribute->setName("attributo2");
$varClass->addAttributesItem( $varClassAttribute );

$varClassAttribute->setName("attributo3");
$varClass->addAttributesItem( $varClassAttribute );

$varClassAttribute->setName("attributo4");
$varClass->addAttributesItem( $varClassAttribute );


//print $varClass->write();

//print $varClass->getCreateTableSQL();



$varViewHtml = new ViewHtml();



$varObjectView = new ObjectView();

$varObjectView->setTitle("ObjectView_title_EXAMPLE");

$varObjectView->setDescription("ObjectView_description_EXAMPLE");

$varObjectView->setUrl("ObjectView_url_EXAMPLE");

$varViewHtml->addElementsItem( $varObjectView );

$varViewHtml->addElementsItem( $varObjectView );

$varViewHtml->addElementsItem( $varObjectView );

$varViewHtml->addElementsItem( $varObjectView );

$varViewHtml->addElementsItem( $varObjectView );


file_put_contents( "prueba.html", $varViewHtml->write() );


class ObjectViewCustom extends Objectview {

    public

}