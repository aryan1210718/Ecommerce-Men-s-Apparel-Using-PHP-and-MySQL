<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
    header("location: login(user).php");
    exit;
}

include 'db__conn.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <title>Shopping Cart</title>
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

    <!-- Cart Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Your Orders</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // Retrieve user ID from session
                        $user_id = $_SESSION['id'];

                        // Fetch cart items for the user from the database
                        $sql = "SELECT order_details.*, product_tbl.p_name
                        FROM order_details
                        INNER JOIN product_tbl ON order_details.p_id = product_tbl.p_id
                        WHERE order_details.user_id = $user_id
                        ";
                
                        $result = mysqli_query($conn, $sql);


                      $total=0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              
                                $product_total = $row['p_price'] * $row['quantity'];
                                $total=$total+($row['p_price']*$row['quantity']);
                                
                        ?>

                        <tr>
                            <td><?php echo $row['p_name']; ?></td>
                            <td><?php echo $row['p_price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $product_total; ?></td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
                        }

                        
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


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
