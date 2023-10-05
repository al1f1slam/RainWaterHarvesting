<?php 
include 'db.php';
$id=$_GET['id'];
$name=$_GET['name'];
$price=$_GET['price'];
$ttype1=$_GET['ttype1'];
$ttype2=$_GET['ttype2'];
$ttype3=$_GET['ttype3'];
$address=$_GET['address'];

$sql="INSERT INTO `buy`( `name`, `uid`, `type1`, `type2`, `type3`, `price`, `address`) VALUES ('$name','$id','$ttype1','$ttype2','$ttype3','$price','$address')";

mysqli_query($conn, $sql);




$sql1="DELETE FROM `order` WHERE  `uid`='$id'";
mysqli_query($conn, $sql1);
header("location: orderlist.php");


?>