<?php 
session_start();
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>About</title>
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
  </div>
  <!--Creates div for mobile only content-->
  <div class="only-mobile">
    <?php require_once("snippets/accordion_menu.php"); ?>
  </div>
  <!-- About Section -->
  <section class="content" id="content">
    <p class="text_column">
    <h1>About</h1>
    <hr><br>
    The ITS Solution Center assists students, faculty and staff with all basic personal computer issues free of charge. The ITS Help Staff is able to help students with connection issues, virus infections and other general computing questions on their personal computing devices.<br><br>
    The ITS Solution Center offers a brand new ticketing program that you can use to request support for tech difficulties you may be having, click the "Submit Work Order" button in the top right to try it out! We offer assistance in many areas including but not limited to:<br><br>
    <ul style="text-align: left;">
      <li>Generic</li>
      <li>Wifi Issues</li>
      <li>Moodle Issues</li>
      <li>Google Drive Password Reset</li>
    </ul>
    <br><br>
    In person help also available on location: Frances Frazier Comstock Theatre (Suite 311, west entrance)
    ITS Solution Center Hours: M-Th: 8am-5pm F: 8am-5pm
    </p>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends -->
</body>
</html>
