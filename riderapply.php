<?php

include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $password=md5("1234");

    $img_name = $_FILES['file']['name'];
	$img_size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$error = $_FILES['file']['error'];
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("pdf", "docx", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("CV-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

               

                $sql = "SELECT * FROM `rider` WHERE email='$email'";
                $result = mysqli_query( $conn, $sql );
                $data = $result->fetch_assoc() ;
                $num = mysqli_num_rows( $result );
                if ( $num == 1 ) {
        
                     echo"This Email is already used";
        
                }
                else{
                    $length = strlen($phone);
                    
                    if($length==11){
                        $query = "INSERT INTO `rider`( `name`, `email`, `phone`, `address`, `password`, `cv`) VALUES ('$name','$email','$phone','$address','$password','$img_upload_path')";
        
                        mysqli_query( $conn, $query );
                        header( 'location: index.php' );

                    }
                    else{
                        echo"Invalid Number";
                    }

                    

                   
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



    <title>Rider Apply</title>
</head>

<body>
    <center>
        <h1> Rider Apply form  </h1>


        <div>


            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Name</label><br>
                <input type="text" placeholder="Name" name="name" required><br>
                <label for="">Email</label><br>
                <input type="email" placeholder="Email" name="email" required><br>
                <label for="">Phone Number</label><br>
                <input type="text" placeholder="Number" name="phone" required><br>

                <label for="">Address</label><br>
                <input type="text" placeholder="Address" name="address" required><br>
                <label for="">Cv</label><br>
                <input type="file"  name="file"><br><br>
                <button type="submit">Submit</button>



            </form>
        </div>
    </center>



</body>

</html>