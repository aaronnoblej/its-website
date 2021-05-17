<?php
//Session information and variables
include('processing/sessioncheck_group2.php');
$category = "Moodle";
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $user_status = $_POST['user_status'];
  $phoneNum = $_POST['phoneNum'];
  $office_extension = $_POST['office_extension'];
  $preferred_contact = $_POST['preferred_contact'];
  $summary = $_POST['summary'];

  //Validate backend function
  function validatePHP() {
    if(empty($_POST['user_status']) || empty($_POST['summary'])) {
      echo "Missing required fields!";
      return false;
    }
    return true;
  }
  //If required fields are not empty, connect to database and insert work order.
  if(validatePHP()) {
    include_once('admin/db/workorder.php');
    include_once('admin/db/requestorinfo.php');
    $wo = new workorder($userId, $category, $summary);
    $wo->send();
    $info = new requestorInfo($wo->getCurrentId(), $email, $user_status, $phoneNum, $office_extension, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $preferred_contact, NULL);
    $info->save();
  } else {
    echo 'Failed to send work order!';
  }
}
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>Home</title>
<!--Body Starts Here-->
<body>
<script>
  function validate() {
    if(document.forms["woform"]["user_status"].value == "Choose One") {
    alert("Please choose whether you are a student, faculty/staff member, or alumnus.");
    document.forms["woform"]["user_status"].style.borderColor = "#F00";
    window.location.href = "#user_status";
    return false;
    }
    if(document.forms["woform"]["phoneNum"].value == "" && document.forms["woform"]["preferred_contact"].value == "Phone") {
      alert("Please enter a phone number if you would like to receive a response via phone.")
      window.location.href='#phoneNum';
      return false;
    }
    if(document.forms["woform"]["summary"].value == "") {
      alert("Please describe your issue.");
      document.forms["woform"]["summary"].style.borderColor = "#F00";
      window.location.href = "#summary";
      return false;
    }
  }
function undoColor(elementId) {
  document.forms["woform"][elementId].style.borderColor = "#CCCCCC";
}
</script>
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
    <h1>Submit A Work Order</h1>
    <hr>
	<h1>Moodle Issues</h1>
	<br>
    <form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields"> 
        <?php require_once("snippets/form_start.php"); ?>
		
        <!-- comments textarea -->
        <div id="summary_field" style="width: 80%"><label for="summary">Summary</label>
        <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px" onchange="undoColor('summary')"></textarea>
        <br></div>
        
		<!-- allow user to upload image of error or issue --> 
        <!-- optional field -->
        <label for="file-input">Upload an image or images</label><br>
        <input type="file" accept="image/*" id="file-input"><br>
        <input type="file" accept="image/*" id="file-input"><br><br>
		
        <!-- submit button-->
        <input type="submit" name="submit" value="Submit">
      </p>
    </form>

    </p>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends -->
	
</body>
</html>