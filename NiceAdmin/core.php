<?php


class Page {
    public $pagename;
    public $autocreate;
    public $autoload;

    public $currentPageFilename;

    public function __construct($autoload=true, $autocreate=true) {
        if ($autoload) {
            if (isset( $_GET['p'] )) {
                $this->pagename = $_GET['p'];
            }
            else {
                $this->pagename = "dashboard";
            }
            $this->currentPageFilename = $this->pagename . '.php';

            $this->autoload = $autoload;
            $this->autocreate = $autocreate;
        }
    } 

    public function loadCurentPage()
    {
        if (!file_exists( $this->currentPageFilename ))
            file_put_contents( $this->currentPageFilename, '' );
        require_once( $this->currentPageFilename );
    }

}

$page = new Page();


class PageTree {
    public $parentTree;

    public $pages;

    public function __construct() {
    }

    public function addPage( $pageName )
    {
        
    } 
}

?>