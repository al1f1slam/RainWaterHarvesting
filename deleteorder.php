<?php

include 'db.php';

$id=$_GET['id'];
$sql="DELETE FROM `order` WHERE  `id`='$id'";
mysqli_query($conn, $sql);
header("location: cart.php");

?>