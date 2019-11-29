<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * using mysqli_connect for database connection
 */
date_default_timezone_set("Asia/Jakarta");
$databaseHost       = 'localhost';
$databaseName       = 'ummroom';
$databaseUsername   = 'phpmyadminuser';
$databasePassword   = 'password';
$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$sql = "SELECT * FROM room";
$res = $db->query($sql);


while ($data = $res->fetch_assoc()) {
	$room = $data['name_room'];
	$jsondata[$room] = $data['status'];
	$room = array('room'=>$jsondata);
}

$sql = "SELECT * FROM room WHERE status = 1";
$tot = $db->query($sql);
$total_use = $tot->num_rows;


$room['room_total'] = 8;
$room['room_inuse'] = 8-$total_use;
$room['room_empty'] = $total_use;

header('Content-Type: application/json');
echo json_encode($room);
?>