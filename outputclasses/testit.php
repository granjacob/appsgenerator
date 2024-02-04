<?php
/*
require("SpringControllerMethodDynamic.php");

$xyzName = "xyz";

$varSpringControllerMethodDynamic = new SpringControllerMethodDynamic();

$varSpringControllerMethodDynamic->setMappingAnnotation("GetMapping");

$varSpringControllerMethodDynamic->setPathVariableService("service");

$varSpringControllerMethodDynamic->setPathVariableTo($xyzName);

$varSpringControllerMethodDynamic->setPathVariableJungle("jungle");

$varSpringControllerMethodDynamic->setAccessModifier("public");

$varSpringControllerMethodDynamic->setReturnType("String");

$varSpringControllerMethodDynamic->setContollerMethodName("doThis");

$varPathVariableParameter = new PathVariableParameter();

$varPathVariableParameter->setPathVariableName("service");
$varSpringControllerMethodDynamic->addParameterItem( $varPathVariableParameter );

$varPathVariableParameter = new PathVariableParameter();
$varPathVariableParameter->setPathVariableName($xyzName);
$varSpringControllerMethodDynamic->addParameterItem( $varPathVariableParameter );

$varPathVariableParameter = new PathVariableParameter();
$varPathVariableParameter->setPathVariableName("jungle");
$varSpringControllerMethodDynamic->addParameterItem( $varPathVariableParameter );

//$varSpringControllerMethodDynamic->setControllerMethodBody('return "hola";');

$varSpringControllerMethodDynamic->write();

exit;*/

require_once("SpringBootController.php");

$varSpringBootController = new SpringBootController();

$varSpringBootController->setPackageName("packageName");

$varSpringBootController->setControllerClassName("MyController");

//$varServices = new SpringAutowiredService();

$varSpringAutowiredService = new SpringAutowiredService();

$varSpringAutowiredService->setAccessModifier("public");

$varSpringAutowiredService->setServiceType("String");

$varSpringAutowiredService->setServiceName("helloWorld");
$varSpringBootController->addServicesItem($varSpringAutowiredService);

$varSpringAutowiredService->setServiceName("var1");
$varSpringBootController->addServicesItem($varSpringAutowiredService);

$varSpringAutowiredService->setServiceName("var2");
$varSpringBootController->addServicesItem($varSpringAutowiredService);

$varSpringAutowiredService->setServiceName("serviceX");
$varSpringBootController->addServicesItem($varSpringAutowiredService);

//$varMethods = new SpringControllerMethod();

$varSpringControllerMethod = new SpringControllerMethod();

$varSpringControllerMethod->setMappingAnnotation("GetMapping");

$varSpringControllerMethod->setControllerPath("/setPath/helloworld/{pathVariableName}");

$varSpringControllerMethod->setAccessModifier("public");

$varSpringControllerMethod->setReturnType("String");

$varSpringControllerMethod->setControllerMethodName("getHelloWorld");

//$varparameters = new SpringBootMethodParameter();
$varSpringBootMethodParameter = new SpringBootMethodParameter();

$varSpringBootMethodParameter->setParameterAnnotation('PathVariable("pathVariableName")');

$varSpringBootMethodParameter->setParameterType("String");

$varSpringBootMethodParameter->setParameterName("param");

$varSpringControllerMethod->addParametersItem($varSpringBootMethodParameter);



$varSpringControllerMethod->setMethodBody('return "ExampleReturnString";');

$varSpringBootController->addMethodsItem($varSpringControllerMethod);
/*
$varRepositories = new SpringControllerMethod();
$varSpringBootController->addRepositoriesItem($varSpringControllerMethod);

$varOtherThings = new SpringControllerMethod();
$varSpringBootController->addOtherThingsItem($varSpringControllerMethod);

$varMoreThings = new SpringControllerMethod();
$varSpringBootController->addMoreThingsItem($varSpringControllerMethod);

$varAndMoreThings = new SpringControllerMethod();
$varSpringBootController->addAndMoreThingsItem($varSpringControllerMethod);

$varWithMoreThings = new SpringControllerMethod();
$varSpringBootController->addWithMoreThingsItem($varSpringControllerMethod);*/

$varSpringBootController->write(array());

?>