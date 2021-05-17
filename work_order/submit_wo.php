<?php
//Session information and variables
session_start();
$firstname = '';
$lastname = '';
$username = $_SESSION['Username'];
$userId = 0;
if(!isset($_SESSION['Username'])) {
  header('Location: http://its.ajnoble.com/mockup/login.php');
} else {
  //Set user information correctly
  require('admin/db/database.php');
  $db = new database();
  try {
    $db->connect();
    $sql = 'SELECT FirstName, LastName, userId FROM User WHERE UserUsername=:username';
    $ps = $db->getConnection()->prepare($sql);
    $ps->bindParam(':username', $username);
    if($ps->execute()) {
      $result = $ps->fetchAll();
      $firstname = $result[0]['FirstName'];
      $lastname = $result[0]['LastName'];
      $userId = $result[0]['userId'];
    } else {
      die('Connection Error! Please try again.');
    }
  } catch(PDOException $e) {
    die('DATABASE ERROR --- ' . $e->getMessage());
  }
}
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $category = $_POST['category'];
  $phoneNum = $_POST['phoneNum'];
  $preferred_contact = $_POST['preferred_contact'];
  $summary = $_POST['summary'];
  $wo_header = "Name: " . $firstname . " " . $lastname . "\nEmail: " . $username . "@cord.edu\n";
  //Create appropriate work order headers for database
  if(!empty($_POST['phoneNum'])) {
    $wo_header .= "Phone Number: " . $phoneNum . "\n";
  }
  $wo_header .= "Preferred Response Method: " . $preferred_contact . "\n";


  //Validate backend function
  function validatePHP() {
    if(empty($_POST['category']) || empty($_POST['summary'])) {
      echo "Missing required fields!";
      return false;
    }
    return true;
  }
  //If required fields are not empty, connect to database and insert work order.
  if(validatePHP()) {
    include_once('admin/db/workorder.php');
    $wo = new workorder($userId, $category, $summary, $wo_header);
    $wo->send();
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
  if(document.forms["woform"]["category"].value == "Choose One") {
    alert("Please choose an category that describes your issue.");
    document.forms["woform"]["category"].style.borderColor = "#F00";
    window.location.href = "#category";
    return false;
  }
  if(document.forms["woform"]["summary"].value == "") {
    alert("Please describe your issue.");
      document.forms["woform"]["summary"].style.borderColor = "#F00";
      window.location.href = "#summary";
      return false;
  }
  if(document.forms["woform"]["phoneNum"].value == "" && document.forms["woform"]["preferred_contact"].value == "Phone") {
    alert("Please enter a phone number if you would like to receive a response via phone.")
    window.location.href='#phoneNum';
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