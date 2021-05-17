<?php
//Session information and variables
include('processing/sessioncheck_group2.php');
$category = "Printing";
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $user_status = $_POST['user_status'];
  $phoneNum = $_POST['phoneNum'];
  $office_extension = $_POST['office_extension'];
  $preferred_contact = $_POST['preferred_contact'];
  $location = $_POST['building'];
  $print_issue = $_POST['uniprint_issue'];
  $summary = $_POST['summary'];

  //Validate backend function
  function validatePHP() {
    if($_POST['user_status'] == 'Choose One' || empty($_POST['summary']) || $_POST['building'] == 'Choose One' || empty($_POST['uniprint_issue'])) {
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
    $info = new requestorInfo($wo->getCurrentId(), $email, $user_status, $phoneNum, $office_extension, $location, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $preferred_contact, $print_issue);
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
    if(document.forms["woform"]["building"].value == "Choose One") {
      alert("Please choose a building location.");
      document.forms["woform"]["building"].style.borderColor = "#F00";
      window.location.href = "#building";
      return false;
    }
    if(document.forms["woform"]["uniprint_issue"].value == "") {
      alert("Please choose whether this is a uniprint station or printer.");
      window.location.href = "#printer_radios";
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
	<h1>Uniprint Station/Printer</h1>
	<br>
    <form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields">
	  <?php require_once("snippets/form_start.php"); ?>
		  
		<!-- building list --> 
        <!-- required field -->
		<div id="building_choices" style="width: 80%;">
        <label for="building">Building</label>
        <select id = "building" name="building" onchange="undoColor('building')">
          <option value = "Choose One" disabled selected value>Choose One</option>
          <option value = "BogsEast" <?php if(isset($_GET['building']) && $_GET['building'] == "BogsEast") echo "selected value" ?>>Bogstad East</option>
          <option value = "BogsManor" <?php if(isset($_GET['building']) && $_GET['building'] == "BogsManor") echo "selected value" ?>>Bogstad Manor</option>
		  <option value = "ParkRegion" <?php if(isset($_GET['building']) && $_GET['building'] == "ParkRegion") echo "selected value" ?>>Park Region</option>
          <option value = "Olin" <?php if(isset($_GET['building']) && $_GET['building'] == "Olin") echo "selected value" ?>>Olin</option>
          <option value = "Library" <?php if(isset($_GET['building']) && $_GET['building'] == "Library") echo "selected value" ?>>Library</option>
		  <option value = "FishBowl" <?php if(isset($_GET['building']) && $_GET['building'] == "FishBowl") echo "selected value" ?>>Fish Bowl</option>
		  <option value = "Hallet" <?php if(isset($_GET['building']) && $_GET['building'] == "Hallet") echo "selected value" ?>>Hallet</option>
		  <option value = "Erickson" <?php if(isset($_GET['building']) && $_GET['building'] == "Erickson") echo "selected value" ?>>Erickson</option>
		  <option value = "ICS1" <?php if(isset($_GET['building']) && $_GET['building'] == "ICS1") echo "selected value" ?>>ISC Floor 1</option>
		  <option value = "ISC2" <?php if(isset($_GET['building']) && $_GET['building'] == "ISC2") echo "selected value" ?>>ISC Floor 2</option>
		  <option value = "ParkeSLC" <?php if(isset($_GET['building']) && $_GET['building'] == "ParkeSLC") echo "selected value" ?>>Parke SLC</option>
		  <option value = "Maize" <?php if(isset($_GET['building']) && $_GET['building'] == "Maize") echo "selected value" ?>>Maize</option>
		  <option value = "GrantResRoom" <?php if(isset($_GET['building']) && $_GET['building'] == "GrantResRoom") echo "selected value" ?>>Grant Resource Room</option>
		  <option value = "Grant118" <?php if(isset($_GET['building']) && $_GET['building'] == "Grant118") echo "selected value" ?>>Grant 118</option>
		  <option value = "Fjelstad" <?php if(isset($_GET['building']) && $_GET['building'] == "Fjelstad") echo "selected value" ?>>Fjelstad</option>
		  <option value = "Livedalen" <?php if(isset($_GET['building']) && $_GET['building'] == "Livedalen") echo "selected value" ?>>Livedalen</option>
		  <option value = "Hoyum" <?php if(isset($_GET['building']) && $_GET['building'] == "Hoyum") echo "selected value" ?>>Hoyum</option>
		  <option value = "CSS" <?php if(isset($_GET['building']) && $_GET['building'] == "CSS") echo "selected value" ?>>Center for Student Success</option>
		  <option value = "BoeOlson" <?php if(isset($_GET['building']) && $_GET['building'] == "BoeOlson") echo "selected value" ?>>Boe Olson</option>
		  <option value = "OldMain" <?php if(isset($_GET['building']) && $_GET['building'] == "OldMain") echo "selected value" ?>>Old Main</option>
		  <option value = "Academy" <?php if(isset($_GET['building']) && $_GET['building'] == "Academy") echo "selected value" ?>>Academy</option>
        </select><br>
		</div>
		
		<!-- uniprint station or printer buttons--> 
        <!-- required field -->
		<div id="printer_radios" style="width: 80%;">
		<p style="text-align: left;">What is having the issue?</p><br>
        <label for="uniprint_issue">Uniprint Station or Uniprint Printer </label><br><br>
        <label for="uniprint_Radio">
          <input type="radio" id="uniprint_Radio" name="uniprint_issue" value="Uniprint Station" <?php if(isset($_GET['uniprint_issue']) && $_GET['uniprint_issue'] == "Station") echo "checked" ?>>
          Uniprint Station</label><br><br>
        <label for="printer_Radio">
          <input type="radio" id="printer_Radio" name="uniprint_issue" value="Uniprint Printer" <?php if(isset($_GET['uniprint_issue']) && $_GET['uniprint_issue'] == "Printer") echo "checked" ?>>
          Uniprint Printer</label><br><br><br></div>
		
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