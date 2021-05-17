<?php
require('../processing/sessioncheck_group1.php');
//Submit Block
if(isset($_POST['submit'])) {
  //Set variables to inputs from Post
  $username = $_POST['cord_username'];
  $user_email = $username . "@cord.edu";
  $category = $_POST['category'];
  $user_status = $_POST['user_status'];
  $phoneNum = $_POST['phoneNum'];
  $summary = $_POST['summary'];
  $status = $_POST['status'];
  $userId = 0;

  function validatePHP() {
    
    //Global variables to be used
    global $username;
    global $userId;

    //Validate that required fields are filled
    if(empty($_POST['cord_username']) || empty($_POST['category']) || empty($_POST['summary'])) {
      echo 'Missing required fields!';
      return false;
    }
    try {
    //Validate that username is valid
    include('db/database.php');
    $db = new database();
    $db->connect();
    $sql = 'SELECT UserId FROM User WHERE UserUsername=:username';
    $ps = $db->getConnection()->prepare($sql);
    $ps->bindParam(':username', $username);
    if($ps->execute()) {
      $result = $ps->fetchAll();
      $numRows = sizeof($result);
      if($numRows < 1) {
        echo "Username does not exist!";
        return false;
      } else {
        $userId = $result[0]['UserId'];
      }
    } else {
      die("DATABASE ERROR --- " . $ps->errorInfo()[2]);
    }
    } catch(PDOException $e) {
      die("DATABASE ERROR --- " . $e->getMessage());
    }
    return true;
  }
  //If required fields are not empty, connect to database and insert work order.
  if(validatePHP()) {
    include_once('db/workorder.php');
    include_once('db/requestorinfo.php');
    $wo = new workorder($userId, $category, $summary, $status);
    $wo->manuallyAdd();
    $info = new requestorInfo($wo->getCurrentId(), $user_email, $user_status, $phoneNum, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    $info->save();
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Console</title>
<link href="../css/backend-css.css" rel="stylesheet" type="text/css">
<script>
  function validate() {
    if(document.forms["manualForm"]["cord_username"].value == "") {
      alert("Please enter a username.");
      document.forms["manualForm"]["cord_username"].style.borderColor = "#F00";
      return false;
    }
    if(document.forms["manualForm"]["category"].value == "Choose One") {
      alert("Please choose an category that describes your issue.");
      document.forms["manualForm"]["category"].style.borderColor = "#F00";
      return false;
    }
    if(document.forms["manualForm"]["summary"].value == "") {
      alert("Please describe your issue.");
        document.forms["manualForm"]["summary"].style.borderColor = "#F00";
        return false;
    }
  }
  function undoColor(elementId) {
    document.forms["manualForm"][elementId].style.borderColor = "#CCCCCC";
  }
</script>
</head>

<body>
<div class="container">
  <header>
    <logo>ADMIN CONSOLE</logo>
    <!-- Navigation Section -->
    <nav>
      <ul class="links">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="active_wo.php">Active Work Orders</a></li>
        <li><strong><a href="create_wo.php" style="color: maroon">Create New Work Orders</a></strong></li>
        <li><a href="db_search.php">Database Search</a></li>
		<li><a href="../index.php">Return To Home</a></li>
      </ul>
    </nav>
  </header>
  <!-- Placeholder Div -->
  <div class="filler" style="width: 15%; float: left; background-color: #fdd881; height: 100%;"></div>
  <!-- Content Section -->
  <div class="content">
    
      <form class="form" style="padding-left:20%" method="post" id="manualForm" name="manualForm" action=<?php echo $_SERVER['PHP_SELF']; ?> onsubmit="return validate()">
      <h2>Create a Work Order</h2>
        <p class="form-fields"> 

          <!-- cord username field -->
          <label for="cord_username">Requestor Username</label>
          <input type="text" id="cord_username" name="cord_username" placeholder="Concordia Username" onchange="undoColor('cord_username')">
          
          <!-- phone number field -->
          <label for="phoneNum">Phone Number</label>
          <input type="tel" id="phoneNum" name="phoneNum" pattern="^\d{3}-?\d{3}-?\d{4}$" placeholder="(999)-999-9999">
          <br><br>
          <!-- figure out input validation to make sure people are submitting a valid #, work for all countries --> 

          <!-- catagory list-->
          <label for="category">Category</label>
          <select id = "category" name="category" onchange="undoColor('category')">
            <option value = "Choose One" disabled selected value>Choose One</option>
            <option value = "Email">Email</option>
            <option value = "Account">Account</option>
            <option value = "Printer">Printer</option>
            <option value = "Network Drive">Network Drive</option>
            <option value = "WiFi">WiFi</option>
            <option value = "Other">Other</option>
          </select>

          <!-- user status list --> 
          <label for="user_status">User Status</label>
          <select id = "user_status" name="user_status">
            <option value = "Choose One" disabled selected value>Choose One</option>
            <option value = "Faculty">Faculty</option>
            <option value = "Staff">Staff</option>
            <option value = "Alumni">Alumni</option>
            <option value = "Student">Student</option>
            <option value = "Other">Other</option>
          </select>
          <br><br>
          
          <!-- comments textarea -->
          <label for="summary">Summary</label><br>
          <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px;width:40%" onchange="undoColor('summary')"></textarea>
          <br><br>

          <!-- status dropdown -->
          <label for="status">Status</label>
          <select id="status" name="status">
            <option value="Open">Open</option>
            <option value="In Progress">In Progress</option>
            <option value="On Hold">On Hold</option>
            <option value="Closed">Closed</option>
          </select>
          <br><br>
          
          <!-- submit button-->
          <input type="submit" value="Submit" name="submit">
        </p>
      </form>
  </div>
</div>
<!-- Footer -->
<footer> 
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2019 - <strong>ITS SOLUTION CENTER</strong> - Concordia College</div>
</footer>
</body>
</html>