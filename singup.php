<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include 'db.php';
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

    $name = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $phone = $_POST[ 'number' ];
    $address = $_POST[ 'address' ];
    $password = md5( $_POST[ 'password' ] );

    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query( $conn, $sql );
    $data = $result->fetch_assoc() ;
    $num = mysqli_num_rows( $result );
    if ( $num == 1 ) {

        echo'This Email is already used';

    } else {
        $length = strlen( $phone );

        if ( $length == 11 ) {
            $query = "INSERT INTO `users`( `name`, `email`, `phone`, `address`, `password`) VALUES ('$name','$email','$phone','$address','$password')";

            mysqli_query( $conn, $query );

            $mail = new PHPMailer( true );
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'patronwelfare@gmail.com';
            $mail->Password = 'qbdduwnstiyfdscy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom( 'patronwelfare@gmail.com', 'Rain Water' );
            $mail->addAddress( $email, $name );
            $mail->Subject = 'Welcome   '.$name;
            $mail->Body = '
            Thank you for signing up!
            We are excited to have you as a new member of our community.
            You can now log in using the credentials you provided during the signup process. 
            If you have any questions or need assistance, feel free to reach out to our support team.

            Happy exploring and enjoy your experience with us!


            Best regards,
            Rain Water Harvest
             
             ';
            $mail->send();

            header( 'location: login.php' );

        } else {
            echo'Invalid Number';
        }

    }

}

?>

<!doctype html>
<html lang = 'en'>

<head>
<!-- Required meta tags -->
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>

<title>User Singup</title>
</head>

<body>
<center>
<h1> User Singup </h1>

<div>

<form action = '' method = 'post'>
<label for = ''>Name</label><br>
<input type = 'text' placeholder = 'Name' name = 'name'><br>
<label for = ''>Email</label><br>
<input type = 'email' placeholder = 'Email' name = 'email'><br>
<label for = ''>Phone Number</label><br>
<input type = 'text' placeholder = 'Number' name = 'number'><br>

<label for = ''>Address</label><br>
<input type = 'text' placeholder = 'Address' name = 'address'><br>
<label for = ''>Password</label><br>
<input type = 'password' placeholder = 'password' name = 'password'><br><br>
<button type = 'submit'>Singup</button>

</form>
</div>
</center>

</body>

</html>