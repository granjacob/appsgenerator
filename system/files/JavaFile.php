<?php

namespace system\files;

class JavaFile extends ScriptFile {

    public function __construct()
    {
        parent :: __construct();

        $this->addTyping("kwd_import", "import" );

        $this->addTyping( "kwd_namespace", "namespace" );
        $this->addTyping( "declare_namespace", "namespace %name%" );

        $this->addTyping( "open_brace,begin_function,begin_method", "{" );
        $this->addTyping( "close_brace,end_function,end_method", "}" );
        $this->addTyping( "open_parentheses", "(" );
        $this->addTyping( "close_parentheses", ")" );

        $this->addTyping( "declare_class", "public class %class_name%");
        $this->addTyping( "begin_class,begin_interface,begin_namespace", "{" );
        $this->addTyping( "end_class,end_interface,end_namespace", "}" );

        $this->addTyping( "kwd_extends", "extends" );

        $this->addTyping( "implements_interface", "implements %interface_name%" );
        $this->addTyping( "extends_class,extends_from,extends", " extends %class_name% " );

        $this->addTyping( "private_attribute", "private %type% %attribute_name%;");
        $this->addTyping( "public_attribute", "public %type% %attribute_name%;");
        $this->addTyping( "protected_attribute", "protected %type% %attribute_name%;");

        $this->addTyping( "public_method", "public %type% %method_name%" );
        $this->addTyping( "private_method", "private %type% %method_name%" );
        $this->addTyping( "protected_method", "protected %type% %method_name%" );

        $this->addTyping( "class_attribute", "%access_modifier% %attribute_name%;\n");
        $this->addTyping( "declare_function", "%access_modifier% %type% %function_name%( %method_parameters% )\n" );
        $this->addTyping( "create_function", "%access_modifier% %type% %function_name%" );
        $this->addTyping( "function_parameters,method_parameters", "(%parameters%)");
        $this->addTyping( "reference_var", "\$%var%" );
        $this->addTyping( "method_parameter", "%type% \$%var%" );

        $this->addTyping( "whitespace"," ");
        $this->addTyping( "dollar_symbol", "\$");
        $this->addTyping(
            "create_function2",
            "@declare_function@ {\n %function_body% \n}\n " );

        $this->addTyping( "return_value,return_expression", "return %param1%;\n" );
        $this->addTyping( "kwd_return", "return" );
        $this->addTyping( "for_loop", "for (%vars%; %condition%; %increment%) {\n %for_body% \n}\n" );
        $this->addTyping( "while_loop", "while (%condition%) {\n %while_body% \n}\n" );
        $this->addTyping( "declare_variable", "\$%variable_name% = %value%;");
        $this->addTyping( "declare_string_var", "\$%variable_name% = '%value%';");
        $this->addTyping( "declare_array", "\$%array_name% = array( %array_items% );");

        $this->addTyping( "semicolon,end_instruction", ";" );
        $this->addTyping( "sample", "test this %word%.");


    }


}

?>