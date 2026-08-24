<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get all cart items
$sql = "SELECT cart.*, products.price
        FROM cart
        INNER JOIN products
        ON cart.product_id = products.product_id
        WHERE cart.user_id='$user_id'";

$result = mysqli_query($conn, $sql);

// Check if cart is empty
if (mysqli_num_rows($result) == 0) {
    die("Your cart is empty.");
}

// Calculate total amount
$total_amount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $total_amount += $row['price'] * $row['quantity'];
}

// Insert order
$insert_order = "INSERT INTO orders(user_id, total_amount)
                 VALUES('$user_id','$total_amount')";

if (!mysqli_query($conn, $insert_order)) {
    die("Error creating order: " . mysqli_error($conn));
}

// Get new order ID
$order_id = mysqli_insert_id($conn);

// Get cart items again
$result = mysqli_query($conn, $sql);

// Save each item into order_items and update stock
while ($row = mysqli_fetch_assoc($result)) {

    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $price = $row['price'];

    // Save order item
    $insert_item = "INSERT INTO order_items(order_id, product_id, quantity, price)
                    VALUES('$order_id','$product_id','$quantity','$price')";
    mysqli_query($conn, $insert_item);

    // Reduce stock
    $update_stock = "UPDATE products
                     SET stock = stock - $quantity
                     WHERE product_id = '$product_id'";
    mysqli_query($conn, $update_stock);
}

// Clear customer's cart
$clear_cart = "DELETE FROM cart WHERE user_id='$user_id'";
mysqli_query($conn, $clear_cart);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>

    <style>
        body{
            background:#000;
            color:white;
            font-family:Arial, sans-serif;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            background:#111;
            padding:40px;
            border-radius:10px;
            text-align:center;
            width:450px;
        }

        h1{
            color:gold;
        }

        a{
            display:inline-block;
            margin-top:20px;
            padding:12px 20px;
            background:gold;
            color:black;
            text-decoration:none;
            border-radius:5px;
            font-weight:bold;
        }
    </style>
</head>

<body>

<div class="box">

    <h1>Order Placed Successfully!</h1>

    <p>Thank you for shopping with <strong>GenZ Style</strong>.</p>

    <p>Your Order ID is:</p>

    <h2><?php echo $order_id; ?></h2>

    <a href="products.php">Continue Shopping</a>

</div>

</body>
</html>