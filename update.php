<?php
date_default_timezone_set("Asia/Jakarta");
$databaseHost       = 'localhost';
$databaseName       = 'ummroom';
$databaseUsername   = 'phpmyadminuser';
$databasePassword   = 'password';
$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


$idroom = $_GET['id'];
$status = $_GET['s'];

$sql = "UPDATE room
SET status = '$status'
WHERE id_room = '$idroom'";
$res = $db->query($sql);


header('Location: sensor.php')
?>