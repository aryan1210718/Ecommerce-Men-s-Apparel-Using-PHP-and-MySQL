<?php
// Include database connection
include 'db__conn.php';

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login(user).php");
    exit;
}

// Retrieve order details from the form submission
$productId = $_POST['pid'];
$totalPrice = $_POST['total_price'];
$address = $_POST['address'];
$pin = $_POST['pin'];
$mobile = $_POST['mobile'];
$paymentMethod = $_POST['payment_method'];

// Additional fields for debit card details if payment method is Debit Card
// Assuming you have proper validation and sanitation for these fields

// Retrieve user ID from session
$userId = $_SESSION['id'];

// Insert order details into your order table
$sql = "INSERT INTO order_tbl (user_id, p_id, address, pin, mobile, payment_method, total_price) 
        VALUES ('$userId', '$productId', '$address', '$pin', '$mobile', '$paymentMethod', '$totalPrice')";

// Execute the SQL query to insert the order into the database
if (mysqli_query($conn, $sql)) {
    // Order inserted successfully
    // You may redirect the user to a thank you page or show a success message
    echo "Order placed successfully!";
} else {
    // If there's an error in executing the query
    // You may redirect the user to an error page or show an error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
