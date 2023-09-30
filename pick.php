<?php 

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
include 'db.php';
$id=$_GET['id'];
$rid=$_GET['rid'];
$sql="UPDATE `buy` SET `status`='pick',rid='$rid' WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: riderorderlist.php");



?>