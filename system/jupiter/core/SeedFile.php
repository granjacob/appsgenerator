<?php

namespace system\jupiter\core;

use \system\jupiter\core\TemplateFileValidator;

use Exception;

class SeedFile {

    private $baseWorkingPath;
    private $fullpath;
    private $package;
    private $name;

    private $language;

    private $content;


    public function __construct( $filename, $baseWorkingPath )
    {
        if ($filename !== null) {
            $this->loadFile( $filename, $baseWorkingPath );
        }
    }

    public function loadFile( $filename, $baseWorkingPath )
    {
        $this->fullpath = $filename;
        $this->baseWorkingPath = $baseWorkingPath;
        $fullcontent = file_get_contents( $filename );


        $lines = explode( "\n", $fullcontent );


        if (count( $lines ) === 0)
            throw new Exception("The file '" . $filename . "' seems to be empty.");

        $lines[0] = str_replace( "\r", "", $lines[0] );

        $signature = $lines[0];

        if (TemplateFileValidator::isSeedFileValidSigned( $filename, $baseWorkingPath, $signature ))
        {
            $signatureParts = explode( ":", $signature );
            $this->language = $signatureParts[1];
            $template = $signatureParts[0];

            $templateParts = explode( ".", $template );

            $this->name = $templateParts[count( $templateParts ) - 1];
            unset( $templateParts[count( $templateParts ) - 1] );
            $this->package = implode( ".", $templateParts );

            unset( $lines[0] );
            $this->content = implode( "\n", $lines );

        }
    }

    public function getAsSnippet()
    {
        $newSnippet = new \system\jupiter\core\Snippet();
        $newSnippet->name = $this->name;
        $newSnippet->snippetName = $this->name;
        $newSnippet->packageName = $this->package;
        $newSnippet->content = $this->content;
        return $newSnippet;
    }

}

?>