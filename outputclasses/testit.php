<?php



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

$varSpringBootMethodParameter->setParameterName("param2");

$varSpringControllerMethod->addParametersItem($varSpringBootMethodParameter);

$varSpringBootMethodParameter->setParameterName("param3");

$varSpringControllerMethod->addParametersItem($varSpringBootMethodParameter);

$varSpringControllerMethod->setMethodBody('return "ExampleReturnString";');

$varSpringBootController->addMethodsItem($varSpringControllerMethod);





$varSpringControllerMethodDynamic = new SpringControllerMethodDynamic();

$varSpringControllerMethodDynamic->setMappingAnnotation("PostMapping");

$varSpringControllerMethodDynamic->setPathVariableService("SERVICE");

$varSpringControllerMethodDynamic->setPathVariableTo("TO");

$varSpringControllerMethodDynamic->setPathVariableJungle("NEW_YORK");

$varSpringControllerMethodDynamic->setAccessModifier("private");

$varSpringControllerMethodDynamic->setReturnType("ArrayList<String>");

$varSpringControllerMethodDynamic->setContollerMethodName("doWelcome");



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

$varSpringBootController->addMethodsWithPathVariableItem($varSpringControllerMethodDynamic);

$varSpringBootController->write();

?>