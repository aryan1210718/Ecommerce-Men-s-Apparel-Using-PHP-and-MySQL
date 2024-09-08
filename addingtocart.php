<?php

// include "db__conn.php";
// session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
//     header("location:login(user).php");
//     exit;
// }

// if (isset($_POST['quantity'], $_POST['pid'], $_SESSION['id'])) {
//     $quantity = $_POST['quantity'];
//     $pid = $_POST['pid'];
//     $user_id = $_SESSION['id'];

//     // Prepare and execute SQL to check if the product is already in the user's cart
//     $check_cart_sql = "SELECT * FROM cart_tbl WHERE user_id = ? AND p_id = ?";
//     $stmt = $conn->prepare($check_cart_sql);
//     $stmt->bind_param("ii", $user_id, $pid);
//     $stmt->execute();
//     $check_cart_result = $stmt->get_result();

//     if ($check_cart_result->num_rows > 0) {
//         // Update the quantity if the product is already in the cart
//         $update_sql = "UPDATE cart_tbl SET quantity = ? WHERE user_id = ? AND p_id = ?";
//         $stmt = $conn->prepare($update_sql);
//         $stmt->bind_param("iii", $quantity, $user_id, $pid);
//         $stmt->execute();

//         if ($stmt->affected_rows > 0) {
//             echo "Quantity updated successfully";
//             header("location: cart.php");
//             exit;
//         } else {
//             echo "Error updating quantity";
//         }
//     } else {
//         // Insert a new record if the product is not in the cart
//         $insert_sql = "INSERT INTO cart_tbl (user_id, p_id, quantity) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($insert_sql);
//         $stmt->bind_param("iii", $user_id, $pid, $quantity);
//         $stmt->execute();

//         if ($stmt->affected_rows > 0) {
//             echo "Product added to cart";
//             header("location: cart.php");
//             exit;
//         } else {
//             echo "Error adding product to cart";
//         }
//     }
// } else {
//     // Handle if quantity, product ID, or user ID is not set
//     echo "Invalid request";
// }

?>

<?php

include "db__conn.php";
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['id'])) {
    header("location:login(user).php");
    exit;
}

if (isset($_POST['quantity'], $_POST['pid'], $_SESSION['id'])) {
    $quantity = $_POST['quantity'];
    $pid = $_POST['pid'];
    $user_id = $_SESSION['id'];

    // Check if the product is already in the user's cart
    $check_cart_query = "SELECT * FROM cart_tbl WHERE user_id = '$user_id' AND p_id = '$pid'";
    $check_cart_result = mysqli_query($conn, $check_cart_query);

    if (mysqli_num_rows($check_cart_result) > 0) {
        // Update the quantity if the product is already in the cart
        $update_sql = "UPDATE cart_tbl SET quantity = '$quantity' WHERE user_id = '$user_id' AND p_id = '$pid'";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            echo "Quantity updated successfully";
            header("location: cart.php");
            exit;
        } else {
            echo "Error updating quantity";
        }
    } else {
        // Insert a new record if the product is not in the cart
        $insert_sql = "INSERT INTO cart_tbl (user_id, p_id, quantity) VALUES ('$user_id', '$pid', '$quantity')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if ($insert_result) {
            echo "Product added to cart";
            header("location: cart.php");
            exit;
        } else {
            echo "Error adding product to cart";
        }
    }
} else {
    // Handle if quantity, product ID, or user ID is not set
    echo "Invalid request";
}

?>

