<?php


include 'db.php';
session_start();
if ( isset( $_SESSION[ 'uid' ] ) ) {
    $id = $_SESSION[ 'uid' ];
    $sql = "SELECT * FROM `users` WHERE `id`='$id'";
    $result = mysqli_query( $conn, $sql );
    $data = $result->fetch_assoc() ;
    $num = mysqli_num_rows( $result );
    if ( $num == 1 ) {

        $name = $data[ 'name' ] ;
        $email = $data[ 'email' ];
        $phone = $data[ 'phone' ];

    }

    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
        $type1 = $_POST[ 'type1' ];
        $type2 = $_POST[ 'type2' ];
        $type3 = $_POST[ 'type3' ];

        $sql1 = "INSERT INTO `order`( `uid`, `name`, `type1`, `type2`, `type3`) VALUES ('$id','$name','$type1','$type2','$type3')";

        mysqli_query( $conn, $sql1 );
        header( 'location: cart.php' );

    }
} else {
    header( 'location: index.php' );
}

?>

<!doctype html>
<html lang = 'en'>
<head>
<!-- Required meta tags -->
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>

<title>Home</title>
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

<center> <h2>Our Order type</h2>  </center>
<form action = '' method = 'post'>
<table>

<tr>
<td> <img src = './image/WhatsApp Image 2023-07-11 at 8.08.22 PM.jpeg' alt = '' height = '100px' width = '100px'>   <h3>Type1</h3> <br> <p>Totally Purified Water</p> <br> <p>100tk Per Gallon</p> <br> <p> Total Amount Of Type-I: 30500 Gallons <br> ( Minimum Order 1000 Gallons )</p>
<br>
<label for = ''>How Much Gallons You Want To Order?</label> <br><br>
<input type = 'text' name = 'type1'>

</td>
<td>  <img src = './image/WhatsApp Image 2023-07-11 at 8.15.00 PM.jpeg' alt = '' height = '100px' width = '100px'> <br>
<h3>Type2</h3> <br> <p>Partially Purified Water</p>
<br>
<p>50tk Per Gallon</p>
<br>
<p>Total Amount Of Type-II: 51000 Gallons <br>( Minimum Order 650 Gallons )</p>
<br>
<label for = ''>How Much Gallons You Want To Order?</label> <br><br>
<input type = 'text' name = 'type2'>

</td>

<td>  <img src = './image/WhatsApp Image 2023-07-11 at 8.21.19 PM.jpeg' alt = '' height = '100px' width = '100px'> <br>
<h3>Type3</h3> <br> <p>Non Purified Water</p>
<br>
<p>10tk Per Gallon</p>
<br>
<p>Total Amount Of Type-III: 31000 Gallons <br>( Minimum Order 500 Gallons )</p>
<br>
<label for = ''>How Much Gallons You Want To Order?</label> <br><br>
<input type = 'text' name = 'type3'>

</td>

</tr>

</table>
<br>
<br>
<center>  <button type = 'submit'>Add To Cart</button> </center>
</form>

</body>
</html>