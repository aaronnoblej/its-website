<?php
session_start();
if(!isset($_SESSION['Username']) || ($_SESSION['GroupNo']) != 1) {
  header('Location: http://its.ajnoble.com/mockup/login.php');
}
require_once('db/database.php');
$db = new database();
//echo "here";
if(isset($_POST['save'])){
	//echo "here2";
	$wo = $_POST['jamie'];
	if($wo!=""){
		
        try {
			$db->connect();
			$fld = 'selectStatus'.$wo;
			$status = $_POST[$fld];
			//echo $status;
			//echo $wo;
			$sql = "UPDATE jamieweb_peak_database.WorkOrder SET Status = '" . $status . "', DateModified = CURRENT_TIMESTAMP, DateSubmitted = DateSubmitted, DateCompleted = NULL WHERE WorkOrderId=$wo;
					UPDATE jamieweb_peak_database.WorkOrder SET DateCompleted=current_timestamp(), DateSubmitted = DateSubmitted WHERE WorkOrder.Status='Closed' AND WorkOrderId=$wo;";
			//echo $sql;
			
			$ps = $db->getConnection()->prepare($sql);
			if($ps->execute()) {
			  $result = $ps->fetchAll();
			  $numRows = sizeof($result);
			} else {
				echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
			}
		} catch(PDOException $e) {
			echo "DATABASE ERROR --- " . $e->getMessage();
		}
		echo"All Changes Have Been Successfully Saved.";
	}
}

$result = NULL;
$numRows = 0;

//Retrieve a table from the database to view active work orders
$db = new database();
try {
  $db->connect();
  //Build and prepare SQL statement
  $sql = 'SELECT * FROM WorkOrder, User WHERE User.userId=WorkOrder.UserId ORDER BY DateSubmitted DESC';
  $ps = $db->getConnection()->prepare($sql);
  if($ps->execute()) {
    $result = $ps->fetchAll();
    $numRows = sizeof($result);
  } else {
    echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
  }
} catch(PDOException $e) {
  echo "DATABASE ERROR --- " . $e->getMessage();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Console</title>
<link href="../css/backend-css.css" rel="stylesheet" type="text/css">
<script>
function storeWorkOrder(workOrderId){
	//alert("hi");
	//alert(workOrderId);
	document.getElementById("workOrder").value = workOrderId;
}
function selectWorkOrder(wo_no) {
  highlightRow();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      document.getElementById("information").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", '../processing/retrieveInfo.php?wo='+wo_no, true);
  xhttp.send();
}
function highlightRow() {
  var table = document.getElementById('wotable');
  var cells = table.getElementsByTagName('td');
  for (var i = 0; i < cells.length; i++) {
    // Take each cell
    var cell = cells[i];
    // do something on onclick event for cell
    cell.onclick = function () {
      // Get the row id where the cell exists
      var rowId = this.parentNode.rowIndex;
      var rowsNotSelected = table.getElementsByTagName('tr');
      for (var row = 0; row < rowsNotSelected.length; row++) {
        rowsNotSelected[row].style.backgroundColor = "";
        rowsNotSelected[row].classList.remove('highlight');
      }
      var rowSelected = table.getElementsByTagName('tr')[rowId];
      rowSelected.style.backgroundColor = "blue";
      rowSelected.className += " highlight";
    }
  }
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
        <li><a href="create_wo.php">Create New Work Orders</a></li>
        <li><strong><a href="db_search.php" style="color: maroon">Database Search</a></strong></li>
		<li><a href="../index.php">Return To Home</a></li>
      </ul>
    </nav>
  </header>
  <!-- Placeholder Div -->
  <div class="filler" style="width: 15%; float: left; background-color: #fdd881; height: 100%;"></div>
  <!-- Content Section -->
  <div class="content" style="text-align: center">
    <h2>Database Search</h2>
    <br/>
    <div id="search">
      <form id="searchbar" method="get">
        <input type="search" name="dbsearch" placeholder="Search for records..." style="width: 25%" required/><input type="submit" id="searchButton" value="Search"/>
      </form>
      <br/><br/>
      <div id="resultTable" style="text-align: center; display: inline-block; max-width:80%">
      <?php if(isset($_GET['dbsearch']) && !empty($_GET['dbsearch'])) {
        include('db/search.php');
      } else {
        if($numRows > 0) {
            echo ('<form action="db_search.php" method="POST">' . PHP_EOL);              
          echo ('<table id="wotable"><tr><th>Requestor</th><th>Issue</th><th style="width:450px">Summary</th><th>Date Submitted</th><th>Status</th></tr>' . PHP_EOL); 
			for($i = 0; $i < $numRows; $i++) {
              $row = $result[$i];
              $sum = $row["IssueSummary"];
              if(strlen($sum) > 60) {
                $sum = substr($sum, 0, 60) . "...";
              }
			echo ('<tr class="wo" onclick="selectWorkOrder('. $row["WorkOrderId"] .')"><td>' . $row["UserUsername"] . '</td><td>' . $row["IssueCatagory"] . '</td><td>' . $sum . '</td><td>' . $row["DateSubmitted"] . '</td><td>' . PHP_EOL);
             echo ('<select name ="selectStatus'.$row["WorkOrderId"].'" onchange="storeWorkOrder('.$row["WorkOrderId"].')">');

                                

             echo (' <option value="Open" ');

                                 if ($row["Status"]=="Open") {
                                            echo (' selected="selected" ');                      
                                  } else {
                                            echo ('');
                                 }
                                 echo('>Open</option>');
                                  echo (' <option value="In Progress" ');
                                 if ($row["Status"]=="In Progress") {
                                            echo (' selected="selected" ');                      
                                  } else {
                                            echo ('');
                                 }
                                 echo('>In Progress</option>');
                                                                  
                                  echo (' <option value="On Hold" ');
                                 if ($row["Status"]=="On Hold") {
                                            echo (' selected="selected" ');                      
                                  } else {
                                            echo ('');
                                 }
                                 echo('>On Hold</option>');
                                                                  
                                  echo (' <option value="Closed" ');

                                 if ($row["Status"]=="Closed") {
                                            echo (' selected="selected" ');                      
                                  } else {
                                            echo ('');
                                 }
                                 echo('>Closed</option>' . PHP_EOL);

                                  echo('</select>');

                                  echo('</td></tr>' . PHP_EOL);
            }
            echo "</table>" . PHP_EOL;
            echo "<br/><input type =\"submit\" name=\"save\"></input>";
			echo "<br/><input type =\"hidden\" id=\"workOrder\" name=\"jamie\"></input>";
          } else {
          echo "No records found!";
        }
      }
      ?>
      </div>
	  <input id="hide" type="hidden"/>
  </form>
  <hr>
  <div id="workOrderInfo">
    <p id="information"></p>    </div>
  </div>
</div>
<!-- Footer -->
<footer> 
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2019 - <strong>ITS SOLUTION CENTER</strong> - Concordia College</div>
</footer>
</body>
</html>