<?php 


include 'db.php';
ini_set('session.gc_maxlifetime', 10);
session_start();
if (isset($_SESSION['aid'])) {

$id = $_SESSION[ 'aid' ];
$sql = "SELECT * FROM `admin` WHERE `id`='$id'";
$result = mysqli_query( $conn, $sql );
$data = $result->fetch_assoc() ;
$num = mysqli_num_rows( $result );
if ( $num == 1 ) {

    $name = $data[ 'name' ] ;
    $email = $data[ 'email' ];
    $phone = $data[ 'phone' ];
    $username=$data['username'];

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

    

    <title>Admin Home</title>
  </head>
  <body>


  <table>
<tr>
<td>Name:<?php echo$name ?> </td>
<td>Email:<?php echo$email ?></td>
<td>Phone:<?php echo$phone ?></td>
<td><a href = 'adminhome.php'><button>Home</button></a></td>
<td><a href = 'adminriderlist.php'><button>Rider List</button></a></td>
<?php 

if($username=="admin1"){
echo"

<td><a href='addadmin.php'> <button>Add Admin</button>  </a></td>
";
}
?>
<td><a href = 'logout.php'><button>Logout</button></a></td>

</table>

  <center>
        <h1>Order List</h1>

        <table>
            <tr>

                <th>Order Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Type 1</th>
                <th>Type 2</th>
                <th>Type 3</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php

                $s = "SELECT * FROM `buy`";
                $result = mysqli_query($conn, $s);
                while ($row = mysqli_fetch_array($result)) {





                    ?>

                    <td><?php echo$row['id'];  ?></td>
                    <td><?php echo$row['name'];  ?></td>
                    <td><?php echo$row['address'];  ?></td>
                    <td><?php echo$row['type1'];  ?></td>
                    <td><?php echo$row['type2'];  ?></td>
                    <td><?php echo$row['type3'];  ?></td>
                    <td><?php echo$row['price'];  ?></td>
                    <td><?php echo$row['status'];  ?></td>




                </tr>

            <?php } ?>



        </table>




    </center>
  </body>
</html>