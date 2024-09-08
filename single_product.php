<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['id'])) {
    header("location: login(user).php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Men's Apparel!</title>
    <style>
        /* Customize the footer style */
        footer {
            background-color: #343a40;
            /* Dark background color */
            padding: 20px 0;
            bottom: 0;
            width: 100%;
            color: white;
            /* Text color */
        }

        footer a {
            color: rgb(255, 255, 255);
            /* Link color */
        }
    </style>
</head>

<body>

    <!-- Header Navbar -->
    <?php include 'partials/_nav.php'; ?>
    <?php include 'db__conn.php'; ?>

    <!-- Product detail page -->
    <?php
    $id = $_GET['pid'];
    $sql = "SELECT * FROM `product_tbl` where p_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $pname = $row['p_name'];
        $pimg = $row['p_img'];
        $pdesc = $row['p_desc'];
        $pid = $row['p_id'];
        $pprice = $row['p_price'];
        echo '
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6">
                    <!-- Product Image -->
                    <img src="Admin Dashboard Panel/uploads/'. $pimg .'" height="400" width="400" alt="Product Image" class="img-fluid product-image">
                </div>
                <div class="col-md-6">
                    <!-- Product Details -->
                    <h2>' . $pname . '</h2>
                    <p>' . $pdesc . '</p>
                    <p>Price: ' . $pprice . '</p>
                    <form action="addingtocart.php" method="post">
                        <input type="hidden" name="pid" value="' . $pid . '">
                        <input type="number" name="quantity" value="1" min="1"> <!-- Input field for quantity -->
                        <button type="submit" class="btn btn-success btn-block mt-4">Add to Cart</button> <!-- Submit button -->
                    </form>
                </div>
            </div>
        </div>';
    }
    ?>

    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
