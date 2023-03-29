<?php

namespace system\files;

class ScriptFile extends File {



    private $tabControl;
    private $autoIndent;
    private $tabAsSpaces;
    private $tabLength;

    private $typings;

    private $typingLevel;
    private $innerValue;

    private $lastTypingExecuted;



    public function __construct()
    {
        $this->typingLevel = 0;
        $this->innerValue = false;
        $this->lastTypingExecuted = null;

    }


    public function addTyping( $name, $value )
    {
        $keys = explode(",", $name );
        foreach ($keys as $keyName) {
            if (isset($this->typings[$keyName]))
                throw new Exception("Typing already exists...");
            else
                $this->typings[$keyName] = $value;
        }
        return true;
    }

    public function getTyping( $name )
    {
        if (isset( $this->typings[$name] ))
            return $this->typings[$name];
    }
    public function typingExists( $name )
    {
        return isset( $this->typings[$name] );
    }


    public function __call( $method, $args )
    {

        if (method_exists( $this, $method )) {
           return call_array_user_func( array( $this, $method ), $args );
        }
        else {
            $this->innerValue = false;
            $typingName = $method;

            if ($method === "___") {
                $typingName = $this->lastTypingExecuted;
               /* return call_array_user_func(
                    array( $this, $this->lastTypingExecuted ), $args );*/
            }
            else
            if (strpos( $method, "__" ) === 0) {
                $this->innerValue = true;
                $typingName = substr( $method, 2, strlen( $method ) - 2  );
            }

            if ($this->typingExists($typingName)) {
                $this->lastTypingExecuted = $typingName;
                return $this->typeToFileContent($typingName, $args);
            }

        }

    }

    public function typeToFileContent( $typingName, $args, $level=0 )
    {
        $typing = $this->getTyping($typingName);

        $string  = $typing;
        $variables = array();
        preg_match_all ( "~%(\w+)%(.*?)(?=%\w+%|$)~s", $string, $variables);

        $references = array();
        preg_match_all ( "~@(\w+)@(.*?)(?=@\w+@|$)~s", $string, $references);

        $finalTyping = $typing;
        foreach ($references[1] as $key => $reference) {
            $finalTyping = str_replace(
                '@' . $reference . '@',
                $this->typeToFileContent( $reference, null, 1 ), $finalTyping );
        }

        if (is_array( $variables )) {
            foreach ($variables[1] as $index => $key) {
                if (is_array( $args ) && isset( $args[$index] ))
                    $finalTyping = str_replace('%' . $key . '%', $args[$index], $finalTyping);
            }

            if (!$this->innerValue)
                $this->fileContent .= $finalTyping;
            else
                return $finalTyping;
        }

        return $this;

        //return ($finalTyping == null ? "" : $finalTyping);

    }


    public function isTypingFile( $method )
    {
        return isset( $this->typings, $method );
    }


    public function doAutoTab()
    {
        if ($this->autoIndent)
            $this->doTab();
    }

    public function doTab()
    {
        $this->tabControl++;
    }

    public function backTab()
    {
        $this->tabControl--;
    }

    public function getTabControlled()
    {
        return str_repeat( PHPFile::tab(), $this->tabControl );
    }

    /**
     * @return mixed
     */
    public function getTabControl()
    {
        return $this->tabControl;
    }

    /**
     * @param mixed $tabControl
     */
    public function setTabControl($tabControl): void
    {
        $this->tabControl = $tabControl;
    }

    /**
     * @return mixed
     */
    public function getAutoIndent()
    {
        return $this->autoIndent;
    }

    /**
     * @param mixed $autoIndent
     */
    public function setAutoIndent($autoIndent): void
    {
        $this->autoIndent = $autoIndent;
    }


    /**
     * @return mixed
     */
    public function getTabAsSpaces()
    {
        return $this->tabAsSpaces;
    }

    /**
     * @param mixed $tabAsSpaces
     */
    public function setTabAsSpaces($tabAsSpaces): void
    {
        $this->tabAsSpaces = $tabAsSpaces;
    }

    /**
     * @return mixed
     */
    public function getTabLength()
    {
        return $this->tabLength;
    }

    /**
     * @param mixed $tabLength
     */
    public function setTabLength($tabLength): void
    {
        $this->tabLength = $tabLength;
    }



    public static function nl()
    {
        return "\r\n";
    }

    public static function tab()
    {
        return "\t";
    }

    public static function thisRef( $member=null )
    {
        return "\$this" . ($member !== null ? "->" . $member : "");
    }

    public static function varRef()
    {
        return "\$";
    }

    public static function returnSomething( $returnValue )
    {
        return "return " . $returnValue . ";" . PHPFile::nl();
    }

    public static function assign( $leftVar, $rightVar )
    {
        return $leftVar . " = " . $rightVar . ";";
    }

    public static function phpOpenTag()
    {
        return "<?php" . PHPFile :: nl();
    }

    public static function phpCloseTag()
    {
        return PHPFile :: nl() . "?>" . PHPFile :: nl();
    }

    public static function getParametersAsString( $parameters=array() )
    {
        $output = "";
        foreach ($parameters as $parameter) {
            $output .= $parameter . ", ";
        }
        trim( $output, ", ");
    }

    public static function getMethodBodyAsString( $body=array() )
    {
        $output = "";
        foreach ($body as $instruction) {
            $output .= $instruction;
        }
        return $output;
    }

    public static function phpNamespace($namespace)
    {
        return "namespace $namespace;" . PHPFile::nl();
    }

    public static function phpDeclareClass($className, $extensionClass=null)
    {
        $extension = ($extensionClass !== null ?
                        " extends $extensionClass " :
                        "" );
        return "class $className $extension {"  . PHPFile::nl();
    }

    public static function phpEndClassDeclaration()
    {
        return "}" . PHPFile::nl();
    }

    public static function phpDeclareAttribute( $attributeName, $accessControl="public" )
    {
        return $accessControl . " \$" . $attributeName . ";" . PHPFile::nl();
    }

    public static function phpPublicAttribute( $attributeName )
    {
        return PHPFile::phpDeclareAttribute( $attributeName );
    }

    public static function phpPrivateAttribute( $attributeName )
    {
        return PHPFile::phpDeclareAttribute( $attributeName, "private" );
    }

    public static function phpProtectedAttribute( $attributeName )
    {
        return PHPFile::phpDeclareAttribute( $attributeName, "protected");
    }

    public static function phpDeclareMethod(
        $methodName, $accessControl="public", $parameters=array(), $body=array() )
    {
        return $accessControl . " function " . $methodName . "(".
            PHPFile :: getParametersAsString( $parameters ) . ")" .
            PHPFile :: nl() . "{" . PHPFile :: nl() .
            PHPFile :: getMethodBodyAsString( $body ) .
            PHPFile :: nl() . "}" . PHPFile :: nl();
    }

    public static function phpPublicMethod(
        $methodName, $parameters=array(), $body=array() )
    {
        return PHPFile::phpDeclareMethod(
            $methodName, "public", $parameters, $body
        );
    }

    public static function phpPrivateMethod(
        $methodName, $parameters=array(), $body=array() )
    {
        return PHPFile::phpDeclareMethod(
            $methodName, "private", $parameters, $body
        );
    }

    public static function phpProtectedMethod(
        $methodName, $parameters=array(), $body=array() )
    {
        return PHPFile::phpDeclareMethod(
            $methodName, "protected", $parameters, $body
        );
    }

    public static function phpDeclareConstructor($parameters=array(), $body=array() )
    {
        return PHPFile::phpDeclareMethod(
            "__construct", "public", $parameters, $body
        );
    }

    public static function phpInstruction( $instruction )
    {
        return $instruction . ";" . PHPFile :: nl();
    }

    public function write()
    {

    }
}

?>