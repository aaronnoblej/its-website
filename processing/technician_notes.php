<?php
try {
  require("../admin/db/database.php");
  $db = new database();
  $info = "";
  $db->connect();
  //Build and prepare SQL statement
  $sql = 'SELECT * FROM (RequestorInfo RIGHT JOIN WorkOrder ON RequestorInfo.WorkOrder=WorkOrder.WorkOrderId) JOIN User ON WorkOrder.UserId=User.userId WHERE WorkOrder=:wo';
  $ps = $db->getConnection()->prepare($sql);
  $wo_no = $_GET['wo'];
  $ps->bindParam(':wo', $wo_no);
  if($ps->execute()) {
    $result = $ps->fetchAll();
    $numRows = sizeof($result);
    if($numRows < 1) {
      die("An error has occurred: information for this work order could not be found.");
    } else {
      echo "<div style=\"display: inline-block; text-align: left\">";
      $info .= "<strong>Name: </strong>" . $result[0]["FirstName"] . " " . $result[0]["LastName"] . " (" . $result[0]["RequestorType"] . ")<br>";
      $info .= "<strong>Email: </strong>" . $result[0]["Email"] . "<br>";
      if($result[0]["PhoneNumber"] != 0 && !is_null($result[0]["PhoneNumber"])) {
        $info .= "<strong>Phone Number: </strong>" . $result[0]["PhoneNumber"] . "<br>";
      }
      if($result[0]["OfficeExtension"] != 0 && !is_null($result[0]["OfficeExtension"])) {
        $info .= "<strong>Office Extension: </strong>" . $result[0]["OfficeExtension"] . "<br>";
      }
      if(!empty($result[0]["PreferredContact"]) && !is_null($result[0]["PreferredContact"])) {
        $info .= "<strong>Preferred Contact: </strong>" . $result[0]["PreferredContact"] . "<br>";
      }
      if($result[0]["ComputerNumber"] != 0 && !is_null($result[0]["ComputerNumber"])) {
        $info .= "<strong>Computer Number: </strong>" . $result[0]["ComputerNumber"] . "<br>";
      }
      if(!empty($result[0]["IssueLocation"]) && !is_null($result[0]["IssueLocation"])) {
        $info .= "<strong>Location: </strong>" . $result[0]["IssueLocation"] . "<br>";
      }
      if($result[0]["IssueDuration"] != 0 && !is_null($result[0]["IssueDuration"])) {
        $info .= "<strong>Duration of Issue: </strong>" . $result[0]["IssueDuration"] . "<br>";
      }
      if(!empty($result[0]["PhoneSoftware"]) && !is_null($result[0]["PhoneSoftware"])) {
        $info .= "<strong>Phone OS: </strong>" . $result[0]["PhoneSoftware"] . "<br>";
      }
      if(!empty($result[0]["ComputerSoftware"]) && !is_null($result[0]["ComputerSoftware"])) {
        $info .= "<strong>Computer OS: </strong>" . $result[0]["ComputerSoftware"] . "<br>";
      }
      if($result[0]["LastRestart"] != 0 && !is_null($result[0]["LastRestart"])) {
        $info .= "<strong>Last Restart: </strong>" . $result[0]["LastRestart"] . "<br>";
      }
      if($result[0]["IpAddress"] != 0 && !is_null($result[0]["IpAddress"])) {
        $info .= "<strong>IP Address(es): </strong>" . $result[0]["IpAddress"] . "<br>";
      }
      if($result[0]["MacAddress"] != 0 && !is_null($result[0]["MacAddress"])) {
        $info .= "<strong>MAC Address(es): </strong>" . $result[0]["MacAddress"] . "<br>";
      }
      if(!empty($result[0]["PrintIssue"]) && !is_null($result[0]["PrintIssue"])) {
        $info .= "<strong>Print Issue: </strong>" . $result[0]["PrintIssue"] . "<br>";
      }
      $info .= "<br></div><div style=\"text-align: center\">" . $result[0]["IssueSummary"] . "</div>";
    }
  } else {
    echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
  }
} catch(PDOException $e) {
  echo "DATABASE ERROR --- " . $e->getMessage();
}
$db->disconnect();
echo $info . "<br><br><h4>Technician Notes:</h4><textarea rows=\"10\" cols=\"100\" placeholder=\"Add notes here...\"></textarea>";
?>