<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../orders.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders 
        WHERE user_id='$user_id' 
        ORDER BY order_date DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>

    <style>
        body{
            font-family:Arial;
            background:#000;
            color:white;
            padding:20px;
        }

        h2{ color:gold; }

        table{
            width:100%;
            border-collapse:collapse;
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

<h2>My Orders</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['total_amount']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td>
            <a class="btn" href="../customer/orders.php?id=<?php echo $row['order_id']; ?>">
                View
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>