<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
include 'db.php';
session_start();
if (isset($_SESSION['rid'])) {
$id = $_SESSION[ 'rid' ];
$sql = "SELECT * FROM `rider` WHERE `id`='$id'";
$result = mysqli_query( $conn, $sql );
$data = $result->fetch_assoc() ;
$num = mysqli_num_rows( $result );
if ( $num == 1 ) {

    $name = $data[ 'name' ] ;
    $email = $data[ 'email' ];
    $phone = $data[ 'phone' ];

}
}
else{
  header("location: index.php");
}
?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

    <title>Rider Home</title>
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
    <h1>All Order List</h1>
    <table>
            <tr>

                <th>Order Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Type 1</th>
                <th>Type 2</th>
                <th>Type 3</th>
                <th>Price</th>
                <th>Pick</th>
            </tr>
            <tr>
                <?php

                $s = "SELECT * FROM `buy`";
                $result = mysqli_query($conn, $s);
                while ($row = mysqli_fetch_array($result)) {


              $bid=$row['id'];


                    ?>

                    <td><?php echo$row['id'];  ?></td>
                    <td><?php echo$row['name'];  ?></td>
                    <td><?php echo$row['address'];  ?></td>
                    <td><?php echo$row['type1'];  ?></td>
                    <td><?php echo$row['type2'];  ?></td>
                    <td><?php echo$row['type3'];  ?></td>
                    <td><?php echo$row['price'];  ?></td>
                    <td><?php echo"<a href='pick.php?id=$bid&&rid=$id'><button>Pick</button></a>" ?></td>




                </tr>

            <?php } ?>



        </table>




</center>
    

    
    
  </body>
</html>