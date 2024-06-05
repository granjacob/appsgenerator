<?php

namespace system\uranus\html\examples\html;

use system\jupiter\core\GeneratorClass;
use system\uranus\examples\html\AImage;

/* ####################### Sample : USAGE EXAMPLE ####################### 

	$varSample = new Sample();

	$varSample->setTitle("Sample_title_EXAMPLE");

	$varSample->setUrlHref("Sample_urlHref_EXAMPLE");

	$varimage = new AImage();
	$varSample->addImageItem( $varImageItem );

	$varSample->write();

    ####################### USAGE EXAMPLE ####################### **/

class Sample extends GeneratorClass
{

    public $title;

    public $urlHref;

    public $image;

    public function __construct()

    {

        parent:: __construct();

        $this->title = null;

        $this->urlHref = null;

        $this->image = new AImage();

    }

    public function setTitle($title)
    {

        $this->title = $title;
        return $this;
    }

    public function setUrlHref($urlHref)
    {

        $this->urlHref = $urlHref;
        return $this;
    }

    public function setImage(AImage $image)
    {

        $this->image = $image;
        return $this;
    }

    public function getTitle()
    {

        return $this->title;
    }

    public function getUrlHref()
    {

        return $this->urlHref;
    }

    public function getImage()
    {

        return $this->image;
    }

    public function addImageItem(AImage $item)
    {

        $this->image->append(clone $item);
        return $this;
    }

    public function write()
    {

        $output = "";

        $this->validateData();

        $output .= "<html>";
        $output .= "  <head>";
        $output .= "    <title>{$this->title}</title>";
        $output .= "  </head>";
        $output .= "  <body>";
        $output .= "    <h1>{$this->title}</h1>";
        $output .= "    <p>";
        $output .= "      <a href="{
        $this->urlHref}">La pagina de de contribucion de freeCodeCamp</a> te muestra como y donde puedes";
$output .= "      contribuir a la comunidad y al crecimiento de freeCodeCamp.";
$output .= "    </p>";
$output .= "";
$output .= "";
$output .= "";
$output .= "";
$output .= "    ";		
$output .= $this->writeArrayObject($this->image, AImage::class);

$output .= "";
$output .= "";
$output .= "";
$output .= "";
$output .= "";
$output .= "";
$output .= "  </body>";
$output .= "</html>";
 return $output; }

}


?>

