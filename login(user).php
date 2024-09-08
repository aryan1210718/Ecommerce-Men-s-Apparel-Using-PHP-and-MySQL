
<?php

include"db__conn.php";

if($result=true){
//   echo'<div class="alert success">

// <strong>Sign-Up Successfull!</strong>Enter your Details to LOG-IN .
// </div>';
}

$login=false;
$show_error=false;
if($_SERVER['REQUEST_METHOD']=='POST'){

  $username=$_POST['username'];
  $password=$_POST['password'];
  
  // $sql= "Select * from user_login where username='$username' AND password='$password'";
  $sql= "Select * from user_login where username='$username'";
  $result = mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);

  if($num==1){
    while($row=mysqli_fetch_assoc($result)){
      if(password_verify($password, $row['password'])){

          $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
          $_SESSION['id']=$row['id'];
          $_SESSION['success']=true;
          header("location:index1.php");
      }
      else{
        $show_error=true;
      }
    
    }
  }
  else{
    $show_error=true;
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

body{
  background-image: url("bglogin.jpg");
 background-size: cover;
 
}

.login-form {
 
 display: flex;
 flex-direction: column;
 height: 500px;
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
margin-top: 50px;
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
  if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Logged In Successfully !!</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if($show_error){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid </strong>Credentials!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
      }
?>
  <div class="container"  height="200px" >  
    <div class="login-container my-5">
        <form class="login-form" action="login(user).php" method="post">
          <h2>Login</h2>
          <input type="text" class="box" name="username" placeholder="Username" required>
          <input type="password" class="box"name="password" placeholder="Password" required>
          <button type="submit" class="submit">Login</button><br>
          <label>Didn't Have Account?<a href="signup(user).php">Sign-Up</a></label>
        </form>
      </div>

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