<?php

require_once('db/database.php');
$db = new database();
try {
    $db->connect();
    $sql = 'SELECT * FROM RequestorInfo';
} catch(PDOException $e) {
    die("Connection Error -- " . $e->getMessage());
}

?>