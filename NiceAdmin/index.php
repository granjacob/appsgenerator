<?php require_once("core.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("pagehead.php" ); ?>
</head>

<body>


<?php

require("header.php");

require("sidebar.php");

?>
  
  <main id="main" class="main">

    <?php require_once( "pagetitle.php" ); ?>

  
        <?php $page->loadCurentPage(); ?>


  </main><!-- End #main -->

 <?php require_once("footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php 
    require_once("bottomscripts.php");
?>

</body>

</html>