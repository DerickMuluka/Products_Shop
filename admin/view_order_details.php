<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("No order selected.");
}

$order_id = $_GET['id'];
if (isset($_POST['update_status'])) {

    $status = $_POST['status'];

    $update = "UPDATE orders 
               SET status='$status' 
               WHERE order_id='$order_id'";

    mysqli_query($conn, $update);

    header("Location: view_order_details.php?id=$order_id");
    exit();
}
/* Get order + customer info */
$order_sql = "SELECT orders.*, users.fullname, users.email
              FROM orders
              INNER JOIN users
              ON orders.user_id = users.user_id
              WHERE orders.order_id = '$order_id'";

$order_result = mysqli_query($conn, $order_sql);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    die("Order not found.");
}

/* Get order items */
$item_sql = "SELECT order_items.*, products.product_name
             FROM order_items
             INNER JOIN products
             ON order_items.product_id = products.product_id
             WHERE order_items.order_id = '$order_id'";

$items = mysqli_query($conn, $item_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>

    <style>
        body{
            font-family: Arial;
            background:#000;
            color:white;
            padding:20px;
        }

        h2{
            color:gold;
        }

        .box{
            background:#111;
            padding:15px;
            margin-bottom:20px;
            border-radius:8px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th,td{
            border:1px solid #333;
            padding:10px;
            text-align:center;
        }

        th{
            background:gold;
            color:black;
        }

        .back{
            display:inline-block;
            margin-top:20px;
            padding:10px 15px;
            background:gold;
            color:black;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>

<body>

<h2>Order Details</h2>

<div class="box">
    <p><strong>Customer:</strong> <?php echo $order['fullname']; ?></p>
    <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
    <p><strong>Total Amount:</strong> Ksh <?php echo $order['total_amount']; ?></p>
    <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
    <p><strong>Date:</strong> <?php echo $order['order_date']; ?></p>
    <p><strong>Status:</strong> <?php echo $order['status']; ?></p>

<form method="POST">
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Processing">Processing</option>
        <option value="Completed">Completed</option>
    </select>

    <button type="submit" name="update_status">Update</button>
</form>
</div>

<h3>Products</h3>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($items)) { ?>
    <tr>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['price'] * $row['quantity']; ?></td>
    </tr>
    <?php } ?>
</table>

<a class="back" href="view_orders.php">← Back to Orders</a>

</body>
</html>