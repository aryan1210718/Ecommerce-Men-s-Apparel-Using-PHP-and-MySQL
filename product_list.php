<?php

session_start();
if (!isset($_SESSION['loggedin'])  || $_SESSION['loggedin'] != true || !isset($_SESSION['id']) ) {

  header("location:login(user).php");
  exit;
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
    
  .card {
    transition: transform 0.3s ease-in-out;
  }

  .card:hover {
    transform: scale(1.05);
  }

  .card-img-top {
    height: 200px;
    object-fit: cover;
  }

  .card-title {
    font-weight: bold;
  }

  .card-text {
    font-size: 14px;
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

  <?php


//  the value in get is from categories(index) button href to pass the id 

  $id=$_GET['catid'];
  
  $sql = "SELECT * FROM `cat_tbl` where cat_id=$id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $catname=$row['cat_name'];
  }
  
  ?>


<!-- products -->



<?php echo'<h2 class="text-center mt-3">'.$catname.'</h2>'; ?>


<div class="container">
<div class="container">
  <div class="row">
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `product_tbl` where c_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $pname = $row['p_name'];
      $pimg = $row['p_img'];
      $pid = $row['p_id'];
      echo '<div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="Admin Dashboard Panel/uploads/' . $pimg . '" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">' . $pname . '</h5>
            <p class="card-text"></p>
            <a href="single_product.php?pid=' . $pid . '" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>';
    }
    ?>
  </div>
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

<!-- </div>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div> -->

<?php


  // $id=$_GET['catid'];
  
  // $sql = "SELECT * FROM `product_tbl` where c_id=$id";
  // $result = mysqli_query($conn, $sql);
  // while ($row = mysqli_fetch_assoc($result)) {
  //   $pname=$row['p_name'];
  //   $pimg=$row['p_img'];
  //   $pid=$row['p_id'];
  //   echo'<div class="card" style="width: 18rem;">
  //   <img src="Admin Dashboard Panel/uploads/'.$pimg.'" class="card-img-top" alt="...">
    
  //   <div class="card-body mx-auto">
  //     <h5 class="card-title">'.$pname.'</h5>
  //     <a href="single_product.php?pid='.$pid.'" class="btn btn-primary text-center">View</a>
  //   </div>
  // </div>';
  // }
  
  ?>