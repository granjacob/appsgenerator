<?php
error_reporting(E_ALL);

define( 'VAR_DEF_OPEN','{{:' );
define( 'VAR_DEF_CLOSE',':}}' );
define( 'OPT_DEF_OPEN','[[' );
define( 'OPT_DEF_CLOSE',']]' );


class Parser {

    public $filenameDefinition;
    public $language;
    public $snippets;

    public function __construct( $language=null, $filenameDefinition=null )
    {
        $this->language = $language;
        $this->filenameDefinition = $filenameDefinition;
        $this->snippets = array();  
        $this->loadSnippets();
    }

    public function loadSnippets( $filename=null )
    {
        if ( $filename === null ) {
            $filename = $this->filenameDefinition;
        }
                
        $xml = new DOMDocument();
       
        $xml->load($filename);

        $snippets = $xml->getElementsByTagName('snippet' );

        foreach ($snippets as $snippet) {
            $this->snippets[$snippet->getAttribute('name')] = $snippet->nodeValue;
        }

        print_r( $this->snippets );
    }

    public function writeExpression( $expressionName, $lang=null, $expressionParameters=null )
    {
        $jsonObject = json_decode( $expressionParameters );
        print $jsonObject; exit;
        $finalExpression = $this->snippets[ $expressionName ];
        foreach ($jsonObject as $key =>  $value) {
            $finalExpression = str_replace( $this->makeVar( $key), $value, $finalExpression );
        }
        print $finalExpression;
    }

    private function makeVar( $name )
    {
        return VAR_DEF_OPEN . $name . VAR_DEF_CLOSE;
    }

}

$parser = new Parser( "php", "archivoejemplo.xml" );

$parser->writeExpression(
    "class", 'php',
    '
    [
        {
            "class" :
            {
                "class_name":"NombreClase",
                "methods" : [
                    { 
                        "method_name" : "exampleFunc1",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                            { "name" : "param3", "value" : "val3" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc2",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc3",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc4",
                        "method_parameters" : []
                    },
                ]
            }
        },
        {
            "class" :
            {
                "class_name":"NombreClase",
                "methods" : [
                    { 
                        "method_name" : "exampleFunc1",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                            { "name" : "param3", "value" : "val3" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc2",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc3",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc4",
                        "method_parameters" : []
                    },
                ]
            }
        },
        {
            "class" :
            {
                "class_name":"NombreClase",
                "methods" : [
                    { 
                        "method_name" : "exampleFunc1",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                            { "name" : "param3", "value" : "val3" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc2",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" },
                            { "name" : "param2", "value" : "val2" },
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc3",
                        "method_parameters" : [
                            { "name" : "param1", "value" : "val1" }
                        ]
                    },
                    { 
                        "method_name" : "exampleFunc4",
                        "method_parameters" : []
                    },
                ]
            }
        },
    ]
    ' );

//$parser->writeExpression("class", '{"a":"b"}' );

?>