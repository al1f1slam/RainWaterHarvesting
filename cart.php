<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
include 'db.php';
session_start();
$id = $_SESSION[ 'uid' ];
$sql = "SELECT * FROM `users` WHERE `id`='$id'";
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
<html lang = 'en'>
<head>
<!-- Required meta tags -->
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>

<title>Cart</title>
</head>
<body>

<table>
<tr>
<td>Name:<?php echo$name ?> </td>
<td>Email:<?php echo$email ?></td>
<td>Phone:<?php echo$phone ?></td>
<td><a href = 'home.php'><button>Home</button></a></td>

<td><a href = 'profile.php'><button>Profile</button></a></td>
<td><a href = 'cart.php'><button>Cart</button></a></td>
<td><a href = 'logout.php'><button>Logout</button></a></td>
</tr>

</table>
<center> <h1>My Cart</h1>
<table>
<tr>
    <th>Serial</th>
<th>Type1</th>
<th>Type2</th>
<th>Type3</th>
<th>Action</th>

</tr>

<?php
$i=1;
$tota1=0;
$tota2=0;
$tota3=0;
$total=0;
$final1=0;
$final3=0;
$final2=0;
$ttype1=0;
$ttype2=0;
$ttype3=0;
$s = "SELECT * FROM `order` WHERE `uid`='$id'";
$result = mysqli_query( $conn, $s );
while( $row = mysqli_fetch_array( $result ) ) {
    
    $total1= ($row['type1']*100);
    $final1=$final1+$total1;
    $total2= ($row['type2']*50);
    $final2=$final2+$total2;
    $total3= ($row['type3']*10);
    $final3=$final3+$total3;
    $oid=$row['id'];

    $ttype1=$ttype1+$row['type1'];
    $ttype2=$ttype2+$row['type2'];
    $ttype3=$ttype3+$row['type3'];
   
    ?>
    <tr>
        <td><?php echo$i; ?></td>
        <td><?php echo$row['type1'] ?></td>
        <td><?php echo$row['type2'] ?></td>
        <td><?php echo$row['type3'] ?></td>
        <td><?php echo"<a href='deleteorder.php?id=$oid'>delete</a>"?></td>


    </tr>



    <?php $i=$i+1; }?>

    </table>

    <br>
    <br><br>
    <?php
    $total=$final1+$final2+$final3;
    
    echo "<h2>Total amount ".$total." Tk"; ?>
    <br>

   <?php echo"<a href='buynow.php?id=$id&&price=$total&&ttype1=$ttype1&&ttype2=$ttype2&&ttype3=$ttype3&&address=$address&&name=$name'> <button>Buy</button></a>" ?>
    </center>


    </body>
    </html>