<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:http://its.ajnoble.com/mockup/login.php");
}
require_once('db/database.php');
//Variables
$open_wo_count = 0;
$today_wo_count = 0;
//Get work orders from today
$db = new database();
try {
  $db->connect();
  //Build and prepare SQL statement
  $sql = 'select count(*) from WorkOrder where DateSubmitted like concat(current_date(), \'%\');';
  $ps = $db->getConnection()->prepare($sql);
  if($ps->execute()) {
    $result = $ps->fetchAll();
    $numRows = sizeof($result);
    if($numRows > 0) {
      $today_wo_count = $result[0]['count(*)'];
    }
  } else {
    echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
  }
} catch(PDOException $e) {
  echo "DATABASE ERROR --- " . $e->getMessage();
}
//Get all active work orders
try {
  //Build and prepare SQL statement
  $sql = 'select count(*) from WorkOrder where DateCompleted IS NULL;';
  $ps = $db->getConnection()->prepare($sql);
  if($ps->execute()) {
    $result = $ps->fetchAll();
    $numRows = sizeof($result);
    if($numRows > 0) {
      $open_wo_count = $result[0]['count(*)'];
    }
  } else {
    echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
  }
} catch(PDOException $e) {
  echo "DATABASE ERROR --- " . $e->getMessage();
}
$db->disconnect();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Console</title>
<link href="../css/backend-css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
  <header>
    <logo>ADMIN CONSOLE</logo>
    <!-- Navigation Section -->
    <nav>
      <ul class="links">
        <li><strong><a href="dashboard.php" style="color: maroon">Dashboard</a></strong></li>
        <li><a href="active_wo.php">Active Work Orders</a></li>
        <li><a href="create_wo.php">Create New Work Orders</a></li>
        <li><a href="db_search.php">Database Search</a></li>
      </ul>
    </nav>
  </header>
  <!-- Placeholder Div -->
  <div class="filler" style="width: 15%; float: left; background-color: #fdd881; height: 100%;"></div>
  <!-- Content Section -->
  <div class="content" style="text-align: center">
    <h2>Dashboard</h2><br/>
    <div>
      <h3>New Work Orders From Today: <span style="color:red"><?php echo $today_wo_count; ?></span></h3>
      <h3>Current Active Work Orders: <span style="color:red"><?php echo $open_wo_count; ?></span></h3>
    </div>
  </div>
</div>
<!-- Footer -->
<footer> 
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2019 - <strong>ITS SOLUTION CENTER</strong> - Concordia College</div>
</footer>
</body>
</html>