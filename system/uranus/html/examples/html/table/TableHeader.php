<?php

namespace system\uranus\html\examples\html\table;
use system\jupiter\core\GeneratorClass;
use system\uranus\examples\html\table\HTMLTagAttribute;
use system\uranus\examples\html\table\TableColumn;

/* ####################### TableHeader : USAGE EXAMPLE ####################### 

	$varTableHeader = new TableHeader();

	$varattributes = new HTMLTagAttribute();
	$varTableHeader->addAttributesItem( $varAttributesItem );

	$varcolumns = new TableColumn();
	$varTableHeader->addColumnsItem( $varColumnsItem );

	$varTableHeader->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class TableHeader extends GeneratorClass {

	public $attributes;

	public $columns;

public function __construct()

{

		parent :: __construct();

	$this->attributes =  new HTMLTagAttribute();

	$this->columns =  new TableColumn();

}

	public function setAttributes( HTMLTagAttribute $attributes)
{

		 $this->attributes = $attributes;
return $this; 
}

	public function setColumns( TableColumn $columns)
{

		 $this->columns = $columns;
return $this; 
}

	public function getAttributes()
{

		return $this->attributes;
}

	public function getColumns()
{

		return $this->columns;
}

	public function addAttributesItem( HTMLTagAttribute $item )
{

		$this->attributes->append( clone $item);
return $this; 
}

	public function addColumnsItem( TableColumn $item )
{

		$this->columns->append( clone $item);
return $this; 
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<thead ";		
$output .= $this->writeArrayObject( $this->attributes, HTMLTagAttribute::class );

$output .= ">";
$output .= "    <tr  ";		
$output .= $this->writeArrayObject( $this->attributes, HTMLTagAttribute::class );

$output .= ">";
$output .= "        ";		
$output .= $this->writeArrayObject( $this->columns, TableColumn::class );

$output .= "";
$output .= "    </tr>";
$output .= "</thead>";
 return $output; }

 } 


?>

