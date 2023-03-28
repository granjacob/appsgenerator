<?php

namespace system\files;

class PhpFile extends ScriptFile {


    public function __construct()
    {
        parent :: __construct();

        $this->addTyping("php_open", "<?php " );

        $this->addTyping( "namespace", "namespace " );
        $this->addTyping( "declare_namespace", "namespace %name%;\n" );

        $this->addTyping( "open_brace,begin_function,begin_method", "{" );
        $this->addTyping( "close_brace,end_function,end_method", "}" );
        $this->addTyping( "open_parentheses", "(" );
        $this->addTyping( "close_parentheses", ")" );

        $this->addTyping( "declare_class", "class %class_name%");
        $this->addTyping( "begin_class,begin_interface", "{" );
        $this->addTyping( "end_class,end_interface", "}" );

        $this->addTyping( "kwd_extends", "extends" );

        $this->addTyping( "implements_interface", "implements %interface_name%" );
        $this->addTyping( "extends_class,extends_from,extends", " extends %class_name% " );

        $this->addTyping( "private_attribute", "private %attribute_name%;");
        $this->addTyping( "public_attribute", "public %attribute_name%;");
        $this->addTyping( "protected_attribute", "protected %attribute_name%;");

        $this->addTyping( "public_method", "public function %method_name%" );
        $this->addTyping( "private_method", "private function %method_name%" );
        $this->addTyping( "protected_method", "protected function %method_name%" );

        $this->addTyping( "class_attribute", "%access_modifier% %attribute_name%;\n");
        $this->addTyping( "php_instruction", "%instruction%;" );
        $this->addTyping( "declare_function", "function %function_name%( %method_parameters% )\n" );
        $this->addTyping( "create_function", "function %function_name%" );
        $this->addTyping( "function_parameters,method_parameters", "(%parameters%)");
        $this->addTyping( "reference_var", "\$%var%" );
        $this->addTyping( "method_parameter", "%type% \$%var%" );

        $this->addTyping( "whitespace"," ");
        $this->addTyping( "dollar_symbol", "\$");
        $this->addTyping(
            "create_function2",
            "@declare_function@{\n %function_body% \n}\n " );

        $this->addTyping( "return_value,return_expression", "return %param1%;\n" );
        $this->addTyping( "kwd_return", "return" );
        $this->addTyping( "for_loop", "for (%vars%; %condition%; %increment%) {\n %for_body% \n}\n" );
        $this->addTyping( "while_loop", "while (%condition%) {\n %while_body% \n}\n" );
        $this->addTyping( "declare_variable", "\$%variable_name% = %value%;");
        $this->addTyping( "declare_string_var", "\$%variable_name% = '%value%';");
        $this->addTyping( "declare_array", "\$%array_name% = array( %array_items% );");

        $this->addTyping("php_close", "?>\n" );
        $this->addTyping( "semicolon,end_instruction", ";" );
        $this->addTyping( "sample", "test this %word%.");


    }



}

?>