<?php
//Connect to Database
$db = new database();
$query = $_GET['dbsearch'];
try {
    $db->connect();
    //Create SQL statement
    $sql = 'SELECT * FROM User RIGHT JOIN WorkOrder ON User.userId=WorkOrder.UserId
            WHERE (IssueSummary LIKE \'%' . $query . '%\') OR (UserUsername LIKE \'%' . $query . '%\')
            OR (IssueCatagory LIKE \'%' . $query . '%\') OR (FirstName LIKE \'%' . $query . '%\') OR (LastName LIKE \'%' . $query . '%\') ORDER BY DateSubmitted DESC';
    //Prepared statement
    $ps = $db->getConnection()->prepare($sql);
    //Execute SQL
    if($ps->execute()) {
        $result = $ps->fetchAll();
        $numRows = sizeof($result);
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
          }  else {
            echo "No results";
        }
        echo "</form>";
    } else {
        echo "DATABASE ERROR --- " . $ps->errorInfo()[2];
    }
} catch(PDOException $e) {
    echo "DATABASE ERROR --- " . $e->getMessage();
}
$db->disconnect();
?>