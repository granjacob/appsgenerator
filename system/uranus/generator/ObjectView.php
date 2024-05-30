<?php

namespace system\uranus\generator;
use system\jupiter\core\GeneratorClass;

/* ####################### ObjectView : USAGE EXAMPLE ####################### 

	$varObjectView = new ObjectView();

	$varObjectView->setTitle("ObjectView_title_EXAMPLE");

	$varObjectView->setDescription("ObjectView_description_EXAMPLE");

	$varObjectView->setUrl("ObjectView_url_EXAMPLE");

	$varObjectView->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ObjectView extends GeneratorClass {

	public $title;

	public $description;

	public $url;

public function __construct()

{

		parent :: __construct();

	$this->title =  null;

	$this->description =  null;

	$this->url =  null;

}

	public function setTitle(  $title)
{

		 $this->title = $title;
return $this; 
}

	public function setDescription(  $description)
{

		 $this->description = $description;
return $this; 
}

	public function setUrl(  $url)
{

		 $this->url = $url;
return $this; 
}

	public function getTitle()
{

		return $this->title;
}

	public function getDescription()
{

		return $this->description;
}

	public function getUrl()
{

		return $this->url;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<div>";
$output .= "            <h1>{$this->title}</h1>";
$output .= "            <p>{$this->description}</p>";
$output .= "            <a href="{$this->url}">{$this->url}</a>";
$output .= "        </div>";
 return $output; }

 } 


?>

