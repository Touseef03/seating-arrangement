<?php
$conn_error='could not connect';
$host='localhost';
$user='root';
$pass='';
$db='IPP';
$conn=mysqli_connect($host,$user,$pass);
if (!$conn) {
  die($conn_error);
}

$db_selected = mysqli_select_db($conn, $db);
if (!$db_selected) {
  die('Can\'t use ' . $db . ': ' . mysqli_error($conn));
}
?>