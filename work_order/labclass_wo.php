<?php
//Session information and variables
include('processing/sessioncheck_group2.php');
$category = "Lab/Classroom";
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $category = $_POST['common_issues'];
  $user_status = $_POST['user_status'];
  $phoneNum = $_POST['phoneNum'];
  $office_extension = $_POST['office_extension'];
  $preferred_contact = $_POST['preferred_contact'];
  $summary = $_POST['summary'];
  $location = $_POST['classroom'];
  $comp_no = $_POST['computer_num'];

  //Validate backend function
  function validatePHP() {
    if(empty($_POST['summary']) || empty($_POST['user_status']) || empty($_POST['common_issues']) || empty($_POST['classroom'])) {
      echo "Missing required fields!\n";
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
    $info = new requestorInfo($wo->getCurrentId(), $email, $user_status, $phoneNum, $office_extension, $location, $comp_no, NULL, NULL, NULL, NULL, NULL, NULL, $preferred_contact, NULL);
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
  function unique_validate() {
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
    if(document.forms["woform"]["classroom"].value == "") {
      alert("Please enter a classroom or location.");
      document.forms["woform"]["classroom"].style.borderColor = "#F00";
      window.location.href = "#classroom";
      return false;
    }
    if(document.forms["woform"]["common_issues"].value == "Choose One") {
      alert("Please select an issue type.");
      document.forms["woform"]["common_issues"].style.borderColor = "#F00";
      window.location.href = "#common_issues";
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
	<h1>Lab or Classroom</h1>
	<br>
    <form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return unique_validate();">
      <p class="form-fields"> 
        <?php require_once("snippets/form_start.php"); ?>
		
		<!-- classroom location textarea --> 
        <!-- required field -->
        <div id="classroom_location" style="width: 80%;"><label for="classroom">Lab or Classroom Location</label>
        <textarea id="classroom" name="classroom" placeholder="Location..." style="height:50px" onchange="undoColor('classroom')"></textarea><br></div>
		
		<!-- common error list --> 
        <!-- required field -->
		<div id="classroom_issue_choices" style="width: 80%;">
        <label for="common_issues">Issue Type</label>
        <select id = "common_issues" name="common_issues" onchange="undoColor('common_issues')">
          <option value = "Choose One" disabled selected value>Choose One</option>
          <option value = "Instructor Station">Instructor Station Computer Issue</option>
          <option value = "Projector Issue">Projector</option>
		  <option value = "Sound Issue">Sound</option>
          <option value = "Doc Cam">Doc Cam</option>
          <option value = "Other">Other</option>
        </select><br>
		</div>
	
		<!-- computer number field --> 
        <!-- optional field -->
        <div id="computer_num_field" style="width: 80%;"><label for="computer_num">Computer Number (if applicable)</label>
        <input input type="number" id="computer_num" name="computer_num" placeholder="1234"><br></div>
		  
        <!-- comments textarea -->
        <div id="summary_field" style="width: 80%"><label for="summary">Summary</label>
        <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px" onchange="undoColor('summary')"></textarea>
        <br></div>
        
		<!-- allow user to upload image of error or issue --> 
        <!-- optional field -->
        <label for="file-input">Upload an image or images</label><br>
        <input type="file" accept="image/*" id="file-input"><br>
        <input type="file" accept="image/*" id="file-input"><br><br>
		
		<p id="notice" style="font-weight: bold; color: #eea904">Think before you submit! Visit <a href="faq_outlook.php">Campus Email</a> for more information about Concordia's email</p><br>
		
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