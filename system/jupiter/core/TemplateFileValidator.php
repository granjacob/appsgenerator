<?php

namespace system\jupiter\core;

use ArrayObject;
use DOMDocument;
use Exception;


class TemplateFileValidator {

    public static function isXMLFile( $filename )
    {
        $pathinfo = pathinfo( $filename );
        return $pathinfo['extension'] === "xml";
    }

    public static function isMultiTemplateFile( &$xml )
    {
        return $xml->schemaValidate( "xmldefs\snippets.xsd" );
    }

    public static function isSingleTemplateFile( &$xml )
    {
        return $xml->schemaValidate( "xmldefs\snippet.xsd" );
    }

    public static function isValidSigned( &$xml, $filenamePath, $baseWorkingPath, $signature=null  )
    {
        if ($xml != null || TemplateFileValidator::isXMLFile( $filenamePath ))
            return TemplateFileValidator::isXMLFileValidSigned( $xml, $filenamePath, $baseWorkingPath );
        return TemplateFileValidator::isSeedFileValidSigned( $filenamePath, $baseWorkingPath );
    }

    public static function isXMLFileValidSigned(
        &$xml, $filenamePath, $baseWorkingPath, $signature=null )
    {
        if (!file_exists( $filenamePath )) {
            throw new Exception ("File doesn't exists '" . $filenamePath . "'");
            exit;
        }

        if ($xml === null) {
            $xml = new DOMDocument();
            $xml->load( $filenamePath );
        }

        $defaultSeedFileExtension = "seed";

        $filenamePath = str_replace( '/', "\\", $filenamePath );
        $baseWorkingPath = trim( str_replace( '/', "\\", $baseWorkingPath ), "\\" );


        $pathinfo = pathinfo( $filenamePath );

        $filenamePath = IO_ltrim_string( $filenamePath, $baseWorkingPath, 1 );
        $packagePathExpected = trim( IO_rtrim_string( $filenamePath, $pathinfo['basename'], 1 ), _bslash() );

        $filenameParts = explode( ".", $pathinfo['filename'] );

        if (count( $filenameParts ) !== 2)
            return false;

        $templateNameExpected = $filenameParts[0];
        $languageExpected = $filenameParts[1];
        $packageExpected = str_replace( _bslash(), '.', $packagePathExpected );



        $packageName = null;
        $language = null;

        $snippetsTag = $xml->getElementsByTagName('snippets');
        $snippets = $xml->getElementsByTagName('snippet');

        if (count( $snippetsTag ) === 0) {
            $packageName = $snippets[0]->getAttribute('package');
            $language = $snippets[0]->getAttribute('language');
            $templateName = $snippets[0]->getAttribute('name');
            return $packageName === $packageExpected &&
                    $language === $languageExpected &&
                    $templateName === $templateNameExpected;
        }
        else {
            $packageName = $snippetsTag[0]->getAttribute('package');
            $language = $snippetsTag[0]->getAttribute('language');
            return $packageName === $packageExpected &&
                $language === $languageExpected;
        }


        return false;
        // multitemplate
        // package = path, language = .lang
        // <snippets package="{packageName}" lang="{lang}">

        // singletemplate
        // package = path, language = .lang, name = filename
        // <snippet package="{package}" language="{language}" name="{name}">
       // $snippetsTag = $xml->getElementsByTagName('snippets');
        //print 'Welcome...';
        //$packageName = $snippetsTag[0]->getAttribute('package');

    }

    public static function isSeedFileValidSigned( $filenamePath, $baseWorkingPath, $signature=null )
    {
        $defaultSeedFileExtension = "seed";

        $filenamePath = str_replace( '/', "\\", $filenamePath );
        if ($baseWorkingPath !== null)
            $baseWorkingPath = trim( str_replace( '/', "\\", $baseWorkingPath ), "\\" );
        else
            $baseWorkingPath = "";
        // $baseWorkingPath mas be in the first path of the $filenamePath

        // Seed file must be named as:
        // /a/b/c/Template.java.seed

        // firstline for the above example is:
        // a.b.c.Template:java
        // /a/b/c=a.b.c
        // Template=Template
        // java=java
        // seed

        // if signature is present validates only the signature not the content of the file

        $fileContent = null;
        if ($signature == null)
            $fileContent = str_replace( "\r", "", file_get_contents( $filenamePath ) );
        else
            $fileContent = $signature;

        $parts = explode( "\n", $fileContent );

        $firstline = $parts[0];

        $partsFirstline = explode( ":", $firstline );

        if (count( $partsFirstline ) !== 2)
            return false;

        $packagePlusTemplateName = $partsFirstline[0]; // Pptn
        $partsPptn = explode( ".", $packagePlusTemplateName );

        if (count( $partsPptn ) < 2)
            return false;

        $indexTemplateName = count( $partsPptn ) - 1;
        $templateName = $partsPptn[$indexTemplateName]; // from file
        unset( $partsPptn[$indexTemplateName] );

        $packageAsPath = implode( _bslash(), $partsPptn );

        $language = $partsFirstline[1];

        $pathinfo = pathinfo( $filenamePath );

        $filenamePath = IO_ltrim_string( $filenamePath, $baseWorkingPath, 1 );
        $packagePathExpected = trim( IO_rtrim_string( $filenamePath, $pathinfo['basename'], 1 ), _bslash() );

        $filenameParts = explode( ".", $pathinfo['filename'] );

        if (count( $filenameParts ) !== 2)
            return false;

        $templateNameExpected = $filenameParts[0];
        $languageExpected = $filenameParts[1];

        return  (count( $parts ) > 1 || ($signature != null && count( $parts ) === 1)) &&
                ($packageAsPath === $packagePathExpected) &&
                ($language === $languageExpected) &&
                ($templateName === $templateNameExpected) &&
                (strlen( $templateName ) > 0) &&
                (strlen( $language ) > 0) &&
                ($defaultSeedFileExtension === $pathinfo['extension']);


        // firstline should be:
        // package.Template:language
        // package = directory path
        // Template = filename
        // language = before extension
        // extension = .seed


    }


    public static function isMultiTemplateFileValidSigned( &$xml )
    {
        $pathinfo = pathinfo( $filename );

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

        if (self::isXMLFile( $filename ) || self::isSeedFile( $filename )) {
            return true;
        }

        return false;
    }
}

?>