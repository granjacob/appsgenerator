<?php

namespace system\jupiter\core;

use ArrayObject;
use DOMDocument;
use Exception;


class TemplateFileValidator {

    public static function isXMLFile( $filename )
    {
        $pathinfo = pathinfo( $filename );
        if ($pathinfo['extension'] === "xml") {
            return true;
        }
        return false;
    }

    public static function isMultiTemplateFile( &$xml )
    {
        return $xml->schemaValidate( "xmldefs\snippets.xsd" );
    }

    public static function isSingleTemplateFile( &$xml )
    {
        return $xml->schemaValidate( "xmldefs\snippet.xsd" );
    }

    public static function isSeedFileValidSigned( $filenamePath )
    {

        // Seed file must be named as:
        // /a/b/c/Template.java.seed

        // firstline for the above example is:
        // a.b.c.Template:java
        // /a/b/c=a.b.c
        // Template=Template
        // java=java
        // seed

        $template = file_get_contents( $filenamePath );

        $parts = explode( "\n", $template );

        $firstline = $parts[0];

        // firstline should be:
        // package.Template:language
        // package = directory path
        // Template = filename
        // language = before extension
        // extension = .seed

        return false;
    }


    public static function isMultiTemplateFileValidSigned( &$xml )
    {
        $pathinfo = pathinffo( $filename );

        $baseFilename = $pathinfo['filename'];

        pathinfo( $baseFilename );

        $snippetsTag = $xml->getElementsByTagName('snippets');
        $packageName = $snippetsTag[0]->getAttribute('package');
        $language = $snippetsTag[0]->getAttribute('lang');

    }

/*
    public static function isValidXMLFile( $filename  )
    {
        $xml = new DOMDocument();
        $xml->load($filename);

        if (!$xml->schemaValidate( "xmldefs\snippets.xsd" ))
        {
            return false;   // not valid multitemplate file
        }
        else {
            return self :: isMultiTemplateFileValidSigned( $xml );
        }

        if (!$xml->schemaValidate( "xmldefs\snippet.xsd" )) {
            return false;
        }
        else {

        }
        return true;
    }*/

    public static function isSeedFile( $filename )
    {
        // filename expected = Template.language.seed
        $pathinfo = pathinfo( $filename );
        if ($pathinfo['extension'] == "seed") {
            // basename here must be = Template.language
            $basenameParts = explode( ".", $pathinfo['filename'] );
            if (count( $basenameParts ) == 2)
                return true;
        }
        return false;
    }


    public static function isValidTemplateFile($filename = null)
    {

        $xml = new DOMDocument();

        try {

            if (self::isXMLFile( $filename )) {
                $xml->load($filename);

                if (self::isMultiTemplateFile( $xml ))
                {
                    $result = self::isMultiTemplateFileValidSigned( $xml );
                }
                else
                if (self::isSingleTemplateFile( $xml )) {
                    return self::isSingleTemplateFileValidSigned( $xml );
                }
            }
            else
            if (self::isConeFile( $filename )) {
                return self::isSeedFileValidSigned( $filename );
            }
        }

        catch (Exception) {
            return false;
        }
    /*    print 'filename = ' . $filename . endl();
        $snippets = $xml->getElementsByTagName('snippets');

        $result = false;
        foreach ($snippets as $snippet) {

            $result = ($snippet->getAttribute('package')  === $this->packageName &&
                ($snippet->getAttribute('lang') === $this->language ||
                    $snippet->getAttribute('language') === $this->language));

        }
        return $result;*/

    }
}

?>