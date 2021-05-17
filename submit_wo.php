<?php
//Session information and variables
include('processing/sessioncheck_group2.php');
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $user_status = $_POST['user_status'];
  $category = $_POST['category'];
  $phoneNum = $_POST['phoneNum'];
  $preferred_contact = $_POST['preferred_contact'];
  $summary = $_POST['summary'];
  $office_extension = $_POST['office_extension'];
  $preferred_contact = $_POST['preferred_contact'];

  //Validate backend function
  function validatePHP() {
    if(empty($_POST['category']) || empty($_POST['summary']) || empty($_POST['user_status'])) {
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
<script src="js/wo_validation.js"></script>
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
    <hr><br>
    <form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields"> 
        <?php require_once("snippets/form_start.php"); ?>
        
		<!-- category list-->
		<div id="category_menu" style="width: 80%;">
        <label for="category">Category</label>
        <select id = "category" name="category" onchange="undoColor('category')">
          <option value = "Choose One" disabled selected value>Choose One</option>
          <option value = "Email">Email</option>
          <option value = "Printer">Add Printer</option>
          <option value = "Network Drive">Network Drive</option>
          <option value = "WiFi">Wi-Fi</option>
          <option value = "Other">Other</option>
        </select>
        <br></div>
		  
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