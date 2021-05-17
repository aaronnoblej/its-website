<?php
//Session information and variables
include('processing/sessioncheck_group2.php');
$category = "WiFi";
//Submission Block
if(isset($_POST['submit'])) {
  //Variables from Post
  $user_status = $_POST['user_status'];
  $phoneNum = $_POST['phoneNum'];
  $office_extension = $_POST['office_extension'];
  $preferred_contact = $_POST['preferred_contact'];
  $duration = $_POST['duration'];
  $phone_os = $_POST['phone_os'];
  $computer_os = $_POST['computer_os'];
  $last_restart = $_POST['device_uptime'];
  $location = $_POST['location'];
  $ip = $_POST['ip_address'];
  $mac = $_POST['mac_address'];
  $summary = $_POST['summary'];

  //Validate backend function
  function validatePHP() {
    if(empty($_POST['user_status']) || empty($_POST['summary']) || empty($_POST['duration']) || empty($_POST['location']) || empty($_POST['ip_address']) || empty($_POST['mac_address'])) {
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
    $info = new requestorInfo($wo->getCurrentId(), $email, $user_status, $phoneNum, $office_extension, $location, NULL, $duration, $phone_os, $computer_os, $last_restart, $ip, $mac, $preferred_contact, NULL);
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
    if(document.forms["woform"]["duration"].value == "") {
      alert("Please provide a duration of the issue.");
      document.forms["woform"]["duration"].style.borderColor = "#F00";
      window.location.href = "#duration";
      return false;
    }
    if(document.forms["woform"]["location"].value == "") {
      alert("Please provide a location of the issue.");
      document.forms["woform"]["location"].style.borderColor = "#F00";
      window.location.href = "#location";
      return false;
    }
    if(document.forms["woform"]["ip_address"].value == "") {
      alert("Please provide an IP address.");
      document.forms["woform"]["ip_address"].style.borderColor = "#F00";
      window.location.href = "#ip_address";
      return false;
    }
    if(document.forms["woform"]["mac_address"].value == "") {
      alert("Please provide a MAC address.");
      document.forms["woform"]["mac_address"].style.borderColor = "#F00";
      window.location.href = "#mac_address";
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
	<h1>WiFi Issues</h1>
	<br>
    <form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields"> 
        <?php require_once("snippets/form_start.php"); ?>
		 
		<!-- duration textarea --> 
        <!-- required field -->
		<div id="duration_field" style="width: 80%;">
        <label for="duration">How long has this been happening?</label>
        <textarea id="duration" name="duration" placeholder="Duration..." style="height:50px" onchange="undoColor('duration')"></textarea><br></div>
		
		<!-- phone os textarea --> 
        <!-- optional field -->
		<div id="phone_os_field" style="width: 80%;">
        <label for="phone_os">Phone software (if applicable)</label>
        <textarea id="phone_os" name="phone_os" placeholder="Phone software..." style="height:50px"></textarea><br></div>
		
		<!-- computer os textarea --> 
        <!-- optional field -->
		<div id="computer_os_field" style="width: 80%;">
        <label for="computer_os">Computer software (if applicable)</label>
        <textarea id="computer_os" name="computer_os" placeholder="Computer software..." style="height:50px"></textarea><br></div>
		  
		<!-- uptime textarea --> 
        <!-- optional field -->
		<div id="device_uptime_field" style="width: 80%;">
        <label for="device_uptime">When was the last time the device(s) was/were restarted?</label>
        <textarea id="device_uptime" name="device_uptime" placeholder="Last restart..." style="height:50px"></textarea><br></div>
		
		<!-- location textarea --> 
        <!-- required field -->
		<div id="location_field" style="width: 80%;">
        <label for="location">Location (as specific as possible)</label>
        <textarea id="location" name="location" placeholder="Location..." style="height:50px" onchange="undoColor('location')"></textarea><br></div>
		
		<!-- ip address textarea --> 
        <!-- required field -->
		<div id="ip_address_field" style="width: 80%;">
		<div class="tooltip">
		<label for="ip_address">IP Address</label>
		<div class="tip_mark">?</div>
  		<span class="tooltiptext">Google 'what is my IP address?'</span> </div>
        <textarea id="ip_address" name="ip_address" placeholder="IP addresses for all devices..." style="height:50px" onchange="undoColor('ip_address')"></textarea><br></div>
		  
		<!-- mac address textarea --> 
        <!-- required field -->
		<div id="mac_address_field" style="width: 80%;">
		<div class="tooltip">
		<label for="mac_address">MAC Address</label>
		<div class="tip_mark">?</div>
  		<span class="tooltiptext">Google 'what is my MAC address?' *NOTE: This has no relation to Apple, all devices have a MAC address</span> </div>
        <textarea id="mac_address" name="mac_address" placeholder="MAC addresses for all devices..." style="height:50px" onchange="undoColor('mac_address')"></textarea><br></div>
		
        <!-- comments textarea -->
        <div id="summary_field" style="width: 80%"><label for="summary">Summary</label>
        <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px" onchange="undoColor('summary')"></textarea>
        <br></div>
		
		<p id="notice" style="font-weight: bold; color: #930C30">NOTE: If your roommate(s) are having similar issues, they also have to send ITS this information</p>
		<p id="notice" style="font-weight: bold; color: #eea904">Think before you submit! Visit <a href="faq_internet.php">Campus Internet Access</a> for more information about Concordia's WiFi networks</p><br>
        
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