<?php

namespace system\uranus\html\examples\html;
use system\jupiter\core\GeneratorClass;

/* ####################### AImage : USAGE EXAMPLE ####################### 

	$varAImage = new AImage();

	$varAImage->setImageLink("AImage_imageLink_EXAMPLE");

	$varAImage->setHeight("AImage_height_EXAMPLE");

	$varAImage->setImageSrc("AImage_imageSrc_EXAMPLE");

	$varAImage->setImageAlt("AImage_imageAlt_EXAMPLE");

	$varAImage->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class AImage extends GeneratorClass {

	public $imageLink;

	public $height;

	public $imageSrc;

	public $imageAlt;

public function __construct()

{

		parent :: __construct();

	$this->imageLink =  null;

	$this->height =  null;

	$this->imageSrc =  null;

	$this->imageAlt =  null;

}

	public function setImageLink(  $imageLink)
{

		 $this->imageLink = $imageLink;
return $this; 
}

	public function setHeight(  $height)
{

		 $this->height = $height;
return $this; 
}

	public function setImageSrc(  $imageSrc)
{

		 $this->imageSrc = $imageSrc;
return $this; 
}

	public function setImageAlt(  $imageAlt)
{

		 $this->imageAlt = $imageAlt;
return $this; 
}

	public function getImageLink()
{

		return $this->imageLink;
}

	public function getHeight()
{

		return $this->height;
}

	public function getImageSrc()
{

		return $this->imageSrc;
}

	public function getImageAlt()
{

		return $this->imageAlt;
}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "<a href="{$this->imageLink}">";
$output .= "      <img itemprop="image" style="height: {$this->height};" src="{$this->imageSrc}" alt="{$this->imageAlt}">";
$output .= "    </a>";
 return $output; }

 } 


?>

