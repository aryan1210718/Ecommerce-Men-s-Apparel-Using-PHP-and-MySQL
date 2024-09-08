<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
    header("location: login(user).php");
    exit;
}

// Include database connection
include 'db__conn.php';

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the product ID
    $pid = $_GET['id'];

    // Retrieve user ID from session
    $user_id = $_SESSION['id'];

    // Prepare the SQL statement to delete the product from the cart
    $delete_sql = "DELETE FROM cart_tbl WHERE user_id = '$user_id' AND p_id = '$pid'";

    // Execute the SQL statement
    $result = mysqli_query($conn, $delete_sql);

    if ($result) {
        // Redirect back to the cart page after successful deletion
        header("location: cart.php");
        exit;
    } else {
        // Handle deletion error
        echo "Error deleting product from cart.";
    }
} else {
    // Handle if the product ID is not set in the URL
    echo "Invalid request.";
}
?>
