<?php
session_start();
//This page is what connects to database, checks the values from the database, and creates the session.
   $message = "wrong answer";
   $myusername = strval($_GET['username']);
   $mypassword = strval($_GET['password']);
	//echo $myusername;
	//echo $mypassword;



      //$connection = mysqli_connect($connection_host, $connection_db, $connection_password, $connection_userName);
		
		$connection = mysqli_connect("50.87.249.216", "jamieweb_WPOQG", "OGsoccer17", "jamieweb_peak_database");

	// echo"b4if";
		
		if(mysqli_connect_errno()){echo"not connected";}
		
		
		//echo $message;  
		//$myusername = mysqli_real_escape_string($connection,$_GET['username']);
		//$mypassword = mysqli_real_escape_string($connection,$_GET['password']);
		
		//echo $myusername;
		//echo $mypassword;
		$sql = "SELECT UserUsername, GroupNo, UserPassword, FirstName, LastName, userId FROM jamieweb_peak_database.User WHERE UserUsername = '".$myusername."' and UserPassword = '".$mypassword."'";
		//echo $sql;
		$result = mysqli_query($connection,$sql);
		
		$count = mysqli_num_rows($result);
		if($count == 0){echo "<html>Either your Username or Password was invalid</html>";}
		
		if($count == 1)
		{
			while($row = mysqli_fetch_array($result)){
				$groupNo =  $row["GroupNo"];
				//echo "beforeif";
					$_SESSION["Username"] = $row["UserUsername"];
					$_SESSION["Password"] = $row["UserPassword"];
					$_SESSION["GroupNo"] = $row["GroupNo"];	
					$_SESSION["FirstName"] = $row["FirstName"];
					$_SESSION["LastName"] = $row["LastName"];
					$_SESSION["UserId"] = $row["userId"];
					echo $groupNo;

				
			}

		}
		
		//echo $count;
	
?>