<?php

include "db__conn.php";

$alert=false;
$passerr=false;
$username_err=false;

if($_SERVER['REQUEST_METHOD']=='POST'){

  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $e_mail=$_POST['e_mail'];
  $mobile=$_POST['mobile'];
  
  $mobile = mysqli_real_escape_string($conn, $mobile);
 
  $username_exist="SELECT * FROM `user_login` WHERE username='$username'";
  $result=mysqli_query($conn,$username_exist);
  $num_rows=mysqli_num_rows($result);

  if($num_rows>0 ){
    $username_err=true;
  }
  
  else{

  if(($password==$cpassword)){
    $hash=password_hash($password,PASSWORD_DEFAULT);

    $sql= "INSERT INTO `user_login` (`username`, `password`, `e_mail`, `mobile`, `dt`) VALUES('$username', '$hash', '$e_mail', '$mobile', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    
    if($result){
      $alert=true;
      // header("location:login(user).php");
    }
  }
  else{
    $passerr="password do not match";
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
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
    /* Customize the footer style */



    body{
      background-image: url("bglogin.jpg");
     background-size: cover;
     
    }

    .login-form {
     
     display: flex;
     flex-direction: column;
     height: 650px;
     width: 400px;
     border: 1px solid black;
     align-items: center;
     margin: auto;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     background-color: rgba(255, 255, 255, 0.2);
     border-radius: 25px;
     
   }

   h2 {
    /* color: while; */
    font-size: 2rem;
    border-bottom: 4px solid white;
    margin: 30px;
    border-radius: 8px;
     background-color: #2a2a2a;
     color: #fff;
     font:  bold;
   }

   .box{
      padding: 10px;
      margin: 20px;
      width: 65%;
      border: none;
      outline: none;
      border-radius: 10px;
      background-color: rgba(255,255,255,1);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      color: darkslategrey;
      font-size: 1rem;

   }

   .submit{
    padding: 10px 20px;
    margin-top: 5opx;
    width: 50%;
    background-color: rgba(255,255,255,1);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #fff;
    border-radius: 8px;
    background-color: #2a2a2a;
    border: none;
    outline: none;
    cursor: pointer;
    transition: background-color 0.5s ease;
    
  }
 
  button:hover {
     background-color: beige;
     color: #000000;
   } 

   footer {
      background-color: #343a40; /* Dark background color */
      padding: 20px 0;
      bottom: 0;
      width: 100%;
      color: white; /* Text color */
    }
    footer a {
      color: rgb(255, 255,255); /* Link color */
    }

  
   </style>
    <title>Hello, world!</title>
  </head>
  <body>
  <?php include'partials/_nav.php'; ?>
  
  <?php
  if($alert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sign-up Successfull</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if($passerr){
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Password</strong> do not match. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
      }
   if($username_err){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Username Already Exists</strong> Try Other username. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
   }   
?>

    <!-- <h1>Hello, world!</h1> -->
    <div class="login-container mt-3" >
        <form class="login-form" action="signup(user).php" method="post">
          <h2>Sign-Up</h2>
          
          <input type="text" class="box" name="username" placeholder="Username" required>
          <input type="password" class="box" name="password" placeholder="Password" required>
          <input type="password" class="box" name="cpassword" placeholder="Confirm Password" required>
          <input type="E-Mail" class="box" name="e_mail" placeholder="E-Mail" required>
          
          <input type="tel" pattern="/d*" class="box" name="mobile" placeholder="Mobile" required>
        
          <button type="submit" class="submit">Sign-Up</button><br>
          <label>Already Have an Account?<a href="login(user).php">Log-In</a></label>
          
        </form>
      </div>
<!-- Footer -->


<?php include 'partials/footer.php'; ?>



<!-- end   -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>