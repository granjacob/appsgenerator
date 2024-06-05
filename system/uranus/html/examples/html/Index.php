<?php

namespace system\uranus\html\examples\html;
use system\jupiter\core\GeneratorClass;
use system\uranus\examples\html\CSSImport;
use system\uranus\examples\html\JavascriptImport;
use system\uranus\examples\html\StylesheetImport;
use system\uranus\examples\html\HelloWorld;
use system\uranus\examples\html\CSSBlock;
use system\uranus\examples\html\HTMLBody;

/* ####################### index : USAGE EXAMPLE ####################### 

	$varindex = new index();

	$varcssImports = new CSSImport();
	$varindex->addCssImportsItem( $varCssImportsItem );

	$varjsImports = new JavascriptImport();
	$varindex->addJsImportsItem( $varJsImportsItem );

	$varstylesheets = new StylesheetImport();
	$varindex->addStylesheetsItem( $varStylesheetsItem );

	$varhelloWorldScript = new HelloWorld();
	$varindex->addHelloWorldScriptItem( $varHelloWorldScriptItem );

	$varcssScripts = new CSSBlock();
	$varindex->addCssScriptsItem( $varCssScriptsItem );

	$varbody = new HTMLBody();
	$varindex->addBodyItem( $varBodyItem );

	$varindex->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class index extends GeneratorClass {

	public $cssImports;

	public $jsImports;

	public $stylesheets;

	public $helloWorldScript;

	public $cssScripts;

	public $body;

public function __construct()

{

		parent :: __construct();

	$this->cssImports =  new CSSImport();

	$this->jsImports =  new JavascriptImport();

	$this->stylesheets =  new StylesheetImport();

	$this->helloWorldScript =  new HelloWorld();

	$this->cssScripts =  new CSSBlock();

	$this->body =  new HTMLBody();

}

	public function setCssImports( CSSImport $cssImports)
{

		 $this->cssImports = $cssImports;
return $this; 
}

	public function setJsImports( JavascriptImport $jsImports)
{

		 $this->jsImports = $jsImports;
return $this; 
}

	public function setStylesheets( StylesheetImport $stylesheets)
{

		 $this->stylesheets = $stylesheets;
return $this; 
}

	public function setHelloWorldScript( HelloWorld $helloWorldScript)
{

		 $this->helloWorldScript = $helloWorldScript;
return $this; 
}

	public function setCssScripts( CSSBlock $cssScripts)
{

		 $this->cssScripts = $cssScripts;
return $this; 
}

	public function setBody( HTMLBody $body)
{

		 $this->body = $body;
return $this; 
}

	public function getCssImports()
{

		return $this->cssImports;
}

	public function getJsImports()
{

		return $this->jsImports;
}

	public function getStylesheets()
{

		return $this->stylesheets;
}

	public function getHelloWorldScript()
{

		return $this->helloWorldScript;
}

	public function getCssScripts()
{

		return $this->cssScripts;
}

	public function getBody()
{

		return $this->body;
}

	public function addCssImportsItem( CSSImport $item )
{

		$this->cssImports->append( clone $item);
return $this; 
}

	public function addJsImportsItem( JavascriptImport $item )
{

		$this->jsImports->append( clone $item);
return $this; 
}

	public function addStylesheetsItem( StylesheetImport $item )
{

		$this->stylesheets->append( clone $item);
return $this; 
}

	public function addHelloWorldScriptItem( HelloWorld $item )
{

		$this->helloWorldScript->append( clone $item);
return $this; 
}

	public function addCssScriptsItem( CSSBlock $item )
{

		$this->cssScripts->append( clone $item);
return $this; 
}

	public function addBodyItem( HTMLBody $item )
{

		$this->body->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<!doctype html>";
$output .= "<html>";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->cssImports, CSSImport::class );

$output .= "";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->jsImports, JavascriptImport::class );

$output .= "";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->stylesheets, StylesheetImport::class );

$output .= "";
$output .= "    <head>";
$output .= "        ";		
$output .= $this->writeArrayObject( $this->helloWorldScript, HelloWorld::class );

$output .= "";
$output .= "        ";		
$output .= $this->writeArrayObject( $this->cssScripts, CSSBlock::class );

$output .= "";
$output .= "    </head>";
$output .= "    <body>";
$output .= "        ";		
$output .= $this->writeArrayObject( $this->body, HTMLBody::class );

$output .= "";
$output .= "    </body>";
$output .= "</html>";
 return $output; }

 } 


?>

