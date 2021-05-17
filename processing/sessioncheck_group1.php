<?php
session_start();
if(!isset($_SESSION['Username']) || ($_SESSION['GroupNo']) != 1) {
  #header('Location: ../login.php');
}
$firstname = $_SESSION['FirstName'];
$lastname = $_SESSION['LastName'];
$userId = $_SESSION['UserId'];
$email = $_SESSION['Username'] . "@cord.edu";
?>