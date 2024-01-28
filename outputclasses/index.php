<?php

require_once( "SpringBootMain.php" );
require_once( "SpringControllerMethod.php" );

require_once( "SpringBootController.php" );

$test = new SpringBootMain();

$test->setPackageName( "HelloWorld" );
$test->setApplicationMainClass( "MainSpringApp" );
$test->write();


$cnt = new SpringBootController();


$spm = new SpringControllerMethod();

$spm->setControllerMethodName( "helloWorld" );
$spm->setControllerPath("/doHelloWorld" );
$spm->setMappingAnnotation( "GetMapping" );
$cnt->addMethodsItem( $spm );

$spm->setControllerMethodName( "otherMethod" );
$spm->setControllerPath("/otherPath" );
$cnt->addMethodsItem( $spm );

$spm->setControllerMethodName( "otherMethod" );
$spm->setControllerPath("/otherPath2" );
$cnt->addMethodsItem( $spm );

$cnt->write();

?>