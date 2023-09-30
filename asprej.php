<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require 'PHPMailer-master/src/Exception.php';
   require 'PHPMailer-master/src/PHPMailer.php';
   require 'PHPMailer-master/src/SMTP.php';
   include 'db.php';
   $id=$_GET['id'];
   $code=$_GET['code'];
   $email=$_GET['email'];
$name=$_GET['name'];
   if($code==1){

    $sql=" UPDATE `rider` SET `status`='Accept' WHERE id='$id'";
    mysqli_query($conn, $sql);

  
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='patronwelfare@gmail.com';
    $mail->Password='qbdduwnstiyfdscy';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('patronwelfare@gmail.com', 'Rain Water');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Congregation  '.$name;
    $mail->Body = 'You are recognized as a rider and try to login with your login email:'. $email.'
    And the password is:1234';
    $mail->send();
  
    header("location: adminriderlist.php");
   }
   if($code==2){

    $sql=" UPDATE `rider` SET `status`='Reject' WHERE id='$id'";
    mysqli_query($conn, $sql);

  
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='patronwelfare@gmail.com';
    $mail->Password='qbdduwnstiyfdscy';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('patronwelfare@gmail.com', 'Rain Water');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Congregation  '.$name;
    $mail->Body = 'Sorry you have been rejected as a rider';
    $mail->send();
  
    header("location: adminriderlist.php");

   }




?>
