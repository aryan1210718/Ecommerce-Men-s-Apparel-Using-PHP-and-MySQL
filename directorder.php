<?php
// Include database connection and start session
include 'db__conn.php';
session_start();

// Check if product ID is passed via GET parameter
if (!isset($_GET['pid'])) {
    // Redirect to an error page or handle the situation accordingly
    // For now, let's redirect back to the product page
    header("Location: product_page.php");
    exit;
}

// Assuming $conn is the database connection

// Retrieve product details from the database
$productId = $_GET['pid']; // Product ID from GET parameter
$sql = "SELECT * FROM `product_tbl` WHERE p_id = $productId ";
$result = mysqli_query($conn, $sql);

// Check if the product exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Extract product details
    $pname = $row['p_name'];
    $pdesc = $row['p_desc'];
    $pprice = $row['p_price'];
    $pimg = $row['p_img'];

    // Calculate total price based on quantity
    $quantity = $_POST['quantity']; // Assuming quantity is posted from the form
    $totalPrice = $quantity * $pprice;

    // Display product details and total price
    echo "<h2>Product Details</h2>";
    echo "<img src='$pimg' height='200' width='200' alt='Product Image'>";
    echo "<p>Name: $pname</p>";
    echo "<p>Description: $pdesc</p>";
    echo "<p>Price: $pprice</p>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>Total Price: $totalPrice</p>";

    // Now, proceed to display the form for user to enter order details (address, pin, mobile, payment method)
    echo "<form method='post' action='placeorder.php'>";
    echo "<input type='hidden' name='pid' value='$productId'>"; // Pass product ID
    echo "<input type='hidden' name='total_price' value='$totalPrice'>"; // Pass total price
    echo "<label for='address'>Address:</label>";
    echo "<input type='text' name='address' required><br>";
    echo "<label for='pincode'>Pin Code:</label>";
    echo "<input type='text' name='pin' required><br>";
    echo "<label for='mobile'>Mobile:</label>";
    echo "<input type='text' name='mobile' required><br>";
    echo "<label for='payment'>Mode of Payment:</label>";
    echo "<select name='payment_method' id='payment_method' required>";
    echo "<option value=''>Select Payment Method</option>";
    echo "<option value='Cash on Delivery'>Cash on Delivery</option>";
    echo "<option value='Debit Card'>Debit Card</option>";
    // Add more payment options as needed
    echo "</select><br>";
    echo "<div id='debit-card-details' style='display: none;'>";
    echo "<label for='card_number'>Card Number:</label>";
    echo "<input type='text' name='card_number'><br>";
    echo "<label for='expiry_date'>Expiry Date:</label>";
    echo "<input type='text' name='expiry_date' placeholder='MM/YYYY'><br>";
    echo "<label for='cvv'>CVV:</label>";
    echo "<input type='password' name='cvv' maxlength='3'><br>";
    echo "</div>";
    echo "<button type='submit'>Place Order</button>";
    echo "</form>";
} else {
    // If the product does not exist, redirect back to the product page
    header("Location: product_page.php");
    exit;
}

// Close database connection
mysqli_close($conn);
?>




