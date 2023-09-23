<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
include 'db.php';
session_start();
$id = $_SESSION[ 'rid' ];
$sql = "SELECT * FROM `rider` WHERE `id`='$id'";
$result = mysqli_query( $conn, $sql );
$data = $result->fetch_assoc() ;
$num = mysqli_num_rows( $result );
if ( $num == 1 ) {

    $name = $data[ 'name' ] ;
    $email = $data[ 'email' ];
    $phone = $data[ 'phone' ];
    $address=$data['address'];

}
?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <title>Rider Profile</title>
  </head>
  <body>
  <table>
<tr>
<td>Name:<?php echo$name ?> </td>
<td>Email:<?php echo$email ?></td>
<td>Phone:<?php echo$phone ?></td>
<td><a href = 'riderprofile.php'><button>Profile</button></a></td>


<td><a href = 'riderorderlist.php'><button>Order List</button></a></td>
<td><a href = 'logout.php'><button>Logout</button></a></td>
</tr>

</table>
<center>

<h1>Rider Profile</h1>

<h3>Name:<?php echo$name ?> </h3>
<h3>Email:<?php echo$email ?> </h3>
<h3>Phone:<?php echo$phone ?> </h3>
<h3>Address:<?php echo$address ?> </h3>
</center>

    
    
  </body>
</html>