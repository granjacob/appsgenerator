<?php

namespace system\uranus\generator;

use system\jupiter\core\GeneratorClass;

/* ####################### ClassR : USAGE EXAMPLE ####################### 

	$varClassR = new ClassR();

	$varClassR->write();

    ####################### USAGE EXAMPLE ####################### **/

class ClassR extends GeneratorClass
{

    public function __construct()

    {

        parent:: __construct();

    }

    public function write()
    {

        $this->validateData();

        print "class T {\n";
        print "\n";
        print "            }\n";
    }

}


?>

