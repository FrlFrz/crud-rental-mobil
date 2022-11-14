<?php

@include 'connect.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($koneksi, $_POST['first_name']);
   $lname = mysqli_real_escape_string($koneksi, $_POST['last_name']);
   $email = mysqli_real_escape_string($koneksi, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($koneksi, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO user (first_name, last_name, email, password, user_type) VALUES('$fname', '$lname', '$email','$pass','user')";
         mysqli_query($koneksi, $insert);
         header('location:loginform.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register | Rental Mobil</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style_login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="first_name" required placeholder="enter your first name">
      <input type="text" name="last_name" required placeholder="enter your last name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="loginform.php">login now</a></p>
   </form>

</div>

</body>
</html>