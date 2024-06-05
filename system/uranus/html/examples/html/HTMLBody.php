<?php

namespace system\uranus\html\examples\html;
use system\jupiter\core\GeneratorClass;

/* ####################### HTMLBody : USAGE EXAMPLE ####################### 

	$varHTMLBody = new HTMLBody();

	$varHTMLBody->setHeader("HTMLBody_header_EXAMPLE");

	$varHTMLBody->setBodyContent("HTMLBody_bodyContent_EXAMPLE");

	$varHTMLBody->setFooter("HTMLBody_footer_EXAMPLE");

	$varHTMLBody->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HTMLBody extends GeneratorClass {

	public $header;

	public $bodyContent;

	public $footer;

public function __construct()

{

		parent :: __construct();

	$this->header =  null;

	$this->bodyContent =  null;

	$this->footer =  null;

}

	public function setHeader(  $header)
{

		 $this->header = $header;
return $this; 
}

	public function setBodyContent(  $bodyContent)
{

		 $this->bodyContent = $bodyContent;
return $this; 
}

	public function setFooter(  $footer)
{

		 $this->footer = $footer;
return $this; 
}

	public function getHeader()
{

		return $this->header;
}

	public function getBodyContent()
{

		return $this->bodyContent;
}

	public function getFooter()
{

		return $this->footer;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "{$this->header}";
$output .= "";
$output .= "{$this->bodyContent}";
$output .= "{$this->footer}";
 return $output; }

 } 


?>

