<?php

// session_start();
// if (!isset($_SESSION['loggedin'])  || $_SESSION['loggedin'] != true) {

//   header("location:login(user)");
//   exit;
// }
session_start();
$login=false;
if(isset($_SESSION['success'])){

  $login=true;
}

?>

<!-- start -->

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Men's Apparel!</title>


  <style>
    /* Customize the footer style */
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

    .slider-alert {
    position: absolute;
    top: 50px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
  }


  .card {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
  }

 .card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    transform: translateY(-5px);
  }

 .card-img-top {
    height: 150px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
  }

 .card-body {
    padding: 20px;
  }

 .card-title {
    font-weight: bold;
    font-size: 18px;
  }

 .card-text {
    font-size: 14px;
    color: #666;
  }

 .btn-primary {
    background-color: #337ab7;
    border-color: #337ab7;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
  }

 .btn-primary:hover {
    background-color: #23527c;
    border-color: #23527c;
  }
  </style>
  
  
</head>

<body>


  <!-- Header Navbar -->


  <?php include 'partials/_nav.php'; ?>
  <?php include 'db__conn.php'; ?>
 


<?php if($login){?>
    <div id="successAlert" class="alert alert-warning alert-dismissible fade show slider-alert mt-5" role="alert">
      <strong>Logged In!</strong>  
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php }?>

  <!-- slider -->





<!-- Carousel wrapper -->

<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="650" width="200" src="partials\banner 3.PNG" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Oversize-Tees</h5>
        <p>...</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="650" src="partials\banner 1.PNG" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Cargos</h5>
        <p>...</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="650" src="partials\banner 2.PNG" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Shirts</h5>
        <p>...</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <!-- Categories -->
<!-- 
  <div class="container">
    <h2 class="text-center mt-3">Categories</h2>
    <div class="row my-4 text-center"> -->
      <?php
      // $sql = "SELECT * FROM `cat_tbl`";
      // $result = mysqli_query($conn, $sql);

      // while ($row = mysqli_fetch_assoc($result)) {
      //   $catname = $row['cat_name'];
      //   $catimg = $row['cat_img'];
      //   $catid = $row['cat_id'];
      //   echo '<div class="row">
      // <div class="col-md-4 mx-auto">
      // <div class="card my-2 mx-2" style="width: 18rem;">
      //   <img class="card-img-top" src="Admin Dashboard Panel/uploads/' . $catimg . '" alt="Card image cap">
      //     <div class="card-body">
      //       <h5 class="card-title">' . $catname . '</h5>
          
      //       <a href="product_list.php?catid='.$catid.'" class="btn btn-primary">View</a>
      //     </div>
      // </div>
      // </div> 
      // </div>';
      // }
      ?>
    <!-- </div>
  </div> -->
 
<!-- Categories -->

<div class="container">
  <h2 class="text-center mt-3">Categories</h2>
  <div class="row my-4 text-center">
    <?php
    $sql = "SELECT * FROM `cat_tbl`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $catname = $row['cat_name'];
      $catimg = $row['cat_img'];
      $catid = $row['cat_id'];
      echo '<div class="col-md-4 mx-auto">
        <div class="card my-2 mx-2" style="width: 18rem;">
          <img class="card-img-top" src="Admin Dashboard Panel/uploads/'. $catimg. '" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">'. $catname. '</h5>
            <p class="card-text">Explore our collection of '. $catname. '</p>
            <a href="product_list.php?catid='. $catid. '" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>';
    }
   ?>
  </div>
</div>

<!-- Footer -->


  <?php include 'partials/footer.php'; ?>


<!-- end   -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    
  </script>
    <script>
    $(document).ready(function(){
      // Automatically close the success message after 3 seconds
      setTimeout(function(){
        $('#successAlert').alert('close');
      }, 3000);
    });
  </script>
</body>

</html>