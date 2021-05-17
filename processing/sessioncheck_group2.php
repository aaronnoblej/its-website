<?php
session_start();
$redirect = base64_encode($_SERVER[REQUEST_URI]);
if(!isset($_SESSION['Username'])) {
  header('Location: ../login.php?redirect=' . $redirect);
}
$firstname = $_SESSION['FirstName'];
$lastname = $_SESSION['LastName'];
$userId = $_SESSION['UserId'];
$email = $_SESSION['Username'] . "@cord.edu";
?>