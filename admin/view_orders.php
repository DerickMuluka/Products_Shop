<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

/* JOIN users table to get customer name */
$sql = "SELECT orders.*, users.fullname 
        FROM orders 
        INNER JOIN users 
        ON orders.user_id = users.user_id
        ORDER BY orders.order_date DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders</title>

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

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
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

        .btn{
            padding:6px 10px;
            background:gold;
            color:black;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>

<body>

<h2>Orders List</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Total Amount</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['total_amount']; ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a class="btn" href="view_order_details.php?id=<?php echo $row['order_id']; ?>">
                View
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>