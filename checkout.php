<?php
session_start();
include 'db__conn.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
    header("location: login(user).php");
    exit;
}

// Retrieve user ID from session
$user_id = $_SESSION['id'];

// Initialize variables for form submission
$errors = array();
$address = $pin = $mobile = $payment_mode = $debit_card_number = $debit_card_expiry = '';


if(!isset($_SESSION['empty_cart'])){
// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate address
    if (empty($_POST["address"])) {
        $errors[] = "Address is required";
    } else {
        $address = mysqli_real_escape_string($conn, $_POST["address"]);
    }

    // Validate PIN
    if (empty($_POST["pin"])) {
      $errors[] = "PIN is required";
  } else {
      $pin = mysqli_real_escape_string($conn, $_POST["pin"]);
  }

    // Validate mobile number
    if (empty($_POST["mobile"])) {
        $errors[] = "Mobile number is required";
    } else {
        $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    }

    // Validate payment mode
    if (empty($_POST["payment_method"])) {
      $errors[] = "Payment mode is required";
  } else {
      $payment_mode = mysqli_real_escape_string($conn, $_POST["payment_method"]);
  }

    // Validate debit card details if payment mode is Debit Card
    if ($payment_mode == 'Debit Card') {
        if (empty($_POST["card-number"])) {
            $errors[] = "Debit card number is required";
        } else {
            $debit_card_number = mysqli_real_escape_string($conn, $_POST["card-number"]);
        }

        if (empty($_POST["expiry-date"])) {
            $errors[] = "Expiry date is required";
        } else {
            $debit_card_expiry = mysqli_real_escape_string($conn, $_POST["expiry-date"]);
        }
    }

   
if (empty($errors)) {
    // Insert order details into order_tbl
    // Insert product details into order_detail
    $cart_sql = "SELECT cart_tbl.p_id, cart_tbl.quantity, product_tbl.p_price 
                 FROM cart_tbl INNER JOIN product_tbl ON cart_tbl.p_id = product_tbl.p_id 
                 WHERE cart_tbl.user_id = $user_id";
    $cart_result = mysqli_query($conn, $cart_sql);

    while ($row = mysqli_fetch_assoc($cart_result)) {
        $product_id = $row['p_id'];
        $quantity = $row['quantity'];
        $price = $row['p_price'];
        $subtotal = $row['p_price'] * $row['quantity'];

        $order_detail_sql = "INSERT INTO order_details (p_id, quantity, p_price, total_price, user_id, address, pin, mobile, payment_method) 
                             VALUES ('$product_id', '$quantity', '$price', '$subtotal', '$user_id', '$address', '$pin', '$mobile', '$payment_mode')";
        mysqli_query($conn, $order_detail_sql);
        $order_detail_id = mysqli_insert_id($conn);
    }


    $card_name = $_POST['card-name'];
    $cvv = $_POST['cvv'];
    // Insert debit card details into debit_details if payment mode is Debit Card
    if ($payment_mode == 'Debit Card') {
        $debit_detail_sql = "INSERT INTO debit_details (`order_id`, `card_name`, `card_number`, `expiry_date`, `cvv`) 
                             VALUES ('$order_detail_id','$card_name', '$debit_card_number', '$debit_card_expiry',$cvv)";
        mysqli_query($conn, $debit_detail_sql);
    }

    // Clear the user's cart
    $clear_cart_sql = "DELETE FROM cart_tbl WHERE user_id = $user_id";
    mysqli_query($conn, $clear_cart_sql);

    // Redirect to a success page
    header("location: feedback.php");
    $_SESSION['ordersuccess']=$ordersuccess;
    exit;
}

}
}else{
    
    header("location:cart.php");
    $_SESSION['msg_empty']=true;

}

// If there are errors, display them
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <title>Shopping Cart</title>
    <style>
      body {
        font-family: Arial, sans-serif;
    }
 
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input[type="text"], 
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    #debit-card-details {
        display: none;
    }


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



    <!-- checkout-info  -->
        
<div class="container">


    <h2>Checkout Form</h2>
    <form id="checkout-form" action="checkout.php" method="post">
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
    <label for="pin">PIN</label>
    <input type="text" class="form-control" id="pin" name="pin" required>
    </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" required>
        </div>

        <label for="payment_mode">Mode of Payment</label>
<select class="form-control" id="payment_mode" name="payment_method" onchange="toggleDebitCardFields()" required>
    <option value="">Select Payment Mode</option>
    <option value="Cash on Delivery">Cash on Delivery</option>
    <option value="Debit Card">Debit Card</option> <!-- Corrected value to "Debit Card" -->
</select>
<div id="debit-card-details">
    <div class="form-group">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number">
    </div>
    <div class="form-group">
        <label for="card-name">Name on Card:</label>
        <input type="text" id="card-name" name="card-name">
    </div>
    <div class="form-group">
        <label for="expiry-date">Expiry Date:</label>
        <input type="date" id="expiry-date" name="expiry-date" placeholder="MM/YYYY">
    </div>
    <div class="form-group">
        <label for="cvv">CVV:</label>
        <input type="password" id="cvv" name="cvv">
    </div>
</div>
</div>

<button type="submit">Place Order</button>
</form>
</div>

<script>
    function toggleDebitCardFields() {
        var paymentMode = document.getElementById("payment_mode").value; // Corrected ID to "payment_mode"
        var debitCardDetails = document.getElementById("debit-card-details");
        if (paymentMode === "Debit Card") { // Corrected value to "Debit Card"
            debitCardDetails.style.display = "block";
        } else {
            debitCardDetails.style.display = "none";
        }
    }
</script>





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

















