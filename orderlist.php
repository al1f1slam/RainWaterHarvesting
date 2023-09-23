<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';
session_start();
$id = $_SESSION['uid'];
$sql = "SELECT * FROM `users` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
$num = mysqli_num_rows($result);
if ($num == 1) {

    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];

}


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Order List</title>
</head>

<body>


<table>
<tr>
<td>Name:<?php echo$name ?> </td>
<td>Email:<?php echo$email ?></td>
<td>Phone:<?php echo$phone ?></td>
<td><a href = 'profile.php'><button>Profile</button></a></td>
<td><a href = 'cart.php'><button>Cart</button></a></td>

<td><a href = 'orderlist.php'><button>Order List</button></a></td>
<td><a href = 'logout.php'><button>Logout</button></a></td>
</tr>

</table>
<br>
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
            </tr>
            <tr>
                <?php

                $s = "SELECT * FROM `buy` WHERE `uid`='$id'";
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




                </tr>

            <?php } ?>



        </table>




    </center>


</body>

</html>