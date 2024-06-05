<?php

namespace system\uranus\html\examples\html;
use system\jupiter\core\GeneratorClass;
use system\uranus\examples\html\HTMLTagAttribute;
use system\uranus\examples\html\TableHeader;
use system\uranus\examples\html\TableBody;
use system\uranus\examples\html\TableFooter;

/* ####################### HTMLTable : USAGE EXAMPLE ####################### 

	$varHTMLTable = new HTMLTable();

	$vartableAttributes = new HTMLTagAttribute();
	$varHTMLTable->addTableAttributesItem( $varTableAttributesItem );

	$varheaders = new TableHeader();
	$varHTMLTable->addHeadersItem( $varHeadersItem );

	$varbodys = new TableBody();
	$varHTMLTable->addBodysItem( $varBodysItem );

	$varfooters = new TableFooter();
	$varHTMLTable->addFootersItem( $varFootersItem );

	$varHTMLTable->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class HTMLTable extends GeneratorClass {

	public $tableAttributes;

	public $headers;

	public $bodys;

	public $footers;

public function __construct()

{

		parent :: __construct();

	$this->tableAttributes =  new HTMLTagAttribute();

	$this->headers =  new TableHeader();

	$this->bodys =  new TableBody();

	$this->footers =  new TableFooter();

}

	public function setTableAttributes( HTMLTagAttribute $tableAttributes)
{

		 $this->tableAttributes = $tableAttributes;
return $this; 
}

	public function setHeaders( TableHeader $headers)
{

		 $this->headers = $headers;
return $this; 
}

	public function setBodys( TableBody $bodys)
{

		 $this->bodys = $bodys;
return $this; 
}

	public function setFooters( TableFooter $footers)
{

		 $this->footers = $footers;
return $this; 
}

	public function getTableAttributes()
{

		return $this->tableAttributes;
}

	public function getHeaders()
{

		return $this->headers;
}

	public function getBodys()
{

		return $this->bodys;
}

	public function getFooters()
{

		return $this->footers;
}

	public function addTableAttributesItem( HTMLTagAttribute $item )
{

		$this->tableAttributes->append( clone $item);
return $this; 
}

	public function addHeadersItem( TableHeader $item )
{

		$this->headers->append( clone $item);
return $this; 
}

	public function addBodysItem( TableBody $item )
{

		$this->bodys->append( clone $item);
return $this; 
}

	public function addFootersItem( TableFooter $item )
{

		$this->footers->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<table  ";		
$output .= $this->writeArrayObject( $this->tableAttributes, HTMLTagAttribute::class );

$output .= ">";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->headers, TableHeader::class );

$output .= "";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->bodys, TableBody::class );

$output .= "";
$output .= "    ";		
$output .= $this->writeArrayObject( $this->footers, TableFooter::class );

$output .= "";
$output .= "</table>";
 return $output; }

 } 


?>

