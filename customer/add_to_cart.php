<?php
session_start();
include "../config/db.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['add_cart'])) {

    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    // Check if product is already in the cart
    $check = "SELECT * FROM cart 
              WHERE user_id='$user_id' 
              AND product_id='$product_id'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {

        // Increase quantity by 1
        $update = "UPDATE cart
                   SET quantity = quantity + 1
                   WHERE user_id='$user_id'
                   AND product_id='$product_id'";
        mysqli_query($conn, $update);

    } else {

        // Add new product to cart
        $insert = "INSERT INTO cart(user_id, product_id, quantity)
                   VALUES('$user_id', '$product_id', 1)";
        mysqli_query($conn, $insert);
    }

    // Return to products page
   header("Location: cart.php");
exit();
}
?>