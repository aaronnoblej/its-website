<?php
  session_start();
  unset($_SESSION['Username']);
  unset($_SESSION['Password']);
  unset($_SESSION['GroupNo']);
  unset($_SESSION['FirstName']);
  unset($_SESSION['LastName']);
  unset($_SESSION['UserId']);
  session_destroy();
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>Logged Out</title>
<!--Body Starts Here-->
<body>
<!-- Main Container -->
<div class="container"> 
  <!--Creates div for desktop only content-->
  <div class="desktop"> 
    <!-- Navigation -->
    <?php require_once("snippets/header.php"); ?>
    <!--incluce php error handling for if require_once fails--> 
    <!-- Hero Section -->
    <?php require_once("snippets/hero.php"); ?>
  <!--Creates div for mobile only content-->
  <div class="only-mobile">
    <?php require_once("snippets/accordion_menu.php"); ?>
  </div>
  <!-- About Section -->
  <section class="content" id="content">
    <h2>Successfully logged out!</h2>
    <hr>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends -->
</body>
</html>
