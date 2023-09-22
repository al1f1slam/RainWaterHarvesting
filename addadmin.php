<?php

include 'db.php';
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

    $name = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $phone = $_POST[ 'phone' ];
    $username = $_POST[ 'username' ];
    $password = md5( $_POST[ 'password' ] );

    $sql = "SELECT * FROM `admin` WHERE email='$email'";
    $result = mysqli_query( $conn, $sql );
    $data = $result->fetch_assoc() ;
    $num = mysqli_num_rows( $result );
    if ( $num == 1 ) {

        echo'This Email is already used';

    } else {
        $length = strlen( $phone );

        if ( $length == 11 ) {
            $query = "INSERT INTO `admin`( `name`, `email`, `phone`, `username`, `password`) VALUES ('$name','$email','$phone','$username','$password')";

            mysqli_query( $conn, $query );
            header( 'location: adminhome.php' );

        } else {
            echo'Invalid Number';
        }

    }

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Add Admin</title>
</head>

<body>
    <center>
        <h1> Add Admin  </h1>


        <div>


            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Name</label><br>
                <input type="text" placeholder="Name" name="name" required><br>
                <label for="">Email</label><br>
                <input type="email" placeholder="Email" name="email" required><br>
                <label for="">Phone Number</label><br>
                <input type="text" placeholder="Number" name="phone" required><br>
                <label for="">Username</label><br>
                <input type="text" placeholder="Address" name="username" required><br>

                <label for="">Password</label><br>
                <input type="text" placeholder="Password" name="password" required><br>
                
                <button type="submit">Submit</button>



            </form>
        </div>
    </center>



</body>

</html>
