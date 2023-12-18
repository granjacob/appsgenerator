<?php

function newline() {
    echo "\n";
}

function dollarsym() { return '$'; }
function equalsym() { return '='; }
function s_equalsym() { return ' ' . equalsym() . ' '; }
function spacesym() { return ' '; }
function commasym() { return ','; }
function semicolonsym() { return ';'; }
function quoted_value( $value ) {
    return '"' . $value . '"';
}

function variable_declaration( $name, $value ) {
    echo dollarsym() . $name . s_equalsym() . $value . semicolonsym() . newline();
}

class ExpressionWriter {
    public $lang;
    public $expressionOutputDefinition;

    public function __construct( $lang  ) 
    {
        $this->lang = $lang;
        $this->expressionOutputDefinition = $expressionOutputDefinition;
    }

    public function loadLang( $lang=null )
    {

    }

    public function write( $assocValues=null )
    {
        echo $this->expressionOutputDefinition;
    }


    public function writeFor( $language, $assocValues )
    {
        
    }
}


$test = new ExpressionWriter();
$test->writeFor('php', array( 'name' => 'variableA', 'value' => '1990' ) );

class VariableDeclaration extends ExpressionWriter {
    public $name;
    public $value;

    function __construct($expressionOutputDefinition) {
        parent :: __construct( "{name} = {value}" );
    }
}

class PHPVariableDeclaration extends VariableDeclaration {
    function __construct($expressionOutputDefinition) {
        parent :: __construct( dollarsym() . "{name} = {value};" );
    }
}

class AngularVariableDeclaration extends VariableDeclaration {
    function __construct($expressionOutputDefinition) {
        parent :: __construct( dollarsym() . "scope.{name} = {value};" );
    }
}

$newvar = new VariableDeclaration();
$newvar->name = 'hola'; 
$newvar->value = quoted_value('mundo');
$newvar->write();

$newvar->name = 'valor'; 
$newvar->value = 0;
$newvar->write();

$newvar = new PHPVariableDeclaration();
$newvar->name = 'hola'; 
$newvar->value = quoted_value('mundo');
$newvar->write();

$newvar->name = 'valor'; 
$newvar->value = 0;
$newvar->write();

$newvar = new AngularVariableDeclaration();
$newvar->name = 'hola'; 
$newvar->value = quoted_value('mundo');
$newvar->write();

$newvar->name = 'valor'; 
$newvar->value = 0;
$newvar->write();
//variable_declaration( "hola", quoted_value( "mundo" ) );
//variable_declaration( "valor", "0" );

?>