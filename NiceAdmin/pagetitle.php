<?php
$currentPageInfo = array();
  if (isset( $_ENV[$_GET['p']] )) {
    $currentPageInfo = $_ENV[$_GET['p']];
  }
  else {
    $currentPageInfo['title'] = ucfirst( str_replace( '-', " ", $_GET['p'] ) );
  }

  $currentPageTitle = $currentPageInfo['title'];
?>
<div class="pagetitle">
      <h1><?php print $currentPageTitle; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?p=index">Home</a></li>
          <li class="breadcrumb-item active"><?php print $currentPageTitle; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->