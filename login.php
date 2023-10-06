
<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
	$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
        session_start();
		$_SESSION['uid'] = $data['id'] ;
        header("location: home.php");


    }

}

?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   

    <title>User Login</title>
  </head>
  <body>
    <center> <h1>User Login </h1>

    
    <div>


    <form action="" method="post">


         <label for="">Email</label><br>
         <input type="text" placeholder="Email" name="email"><br>
         <label for="">Password</label><br>
         <input type="password" placeholder="password" name="password"><br><br>
         <button type="submit">Login</button>



    </form>
    </div>
    </center>
    

   
  </body>
</html>
