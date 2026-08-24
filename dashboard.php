<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - GenZ Style</title>

    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#000;
            color:white;
        }

        .header{
            background:gold;
            color:black;
            padding:20px;
            text-align:center;
            font-size:28px;
            font-weight:bold;
        }

        .container{
            width:80%;
            margin:40px auto;
            text-align:center;
        }

        h2{
            color:gold;
        }

        .btn{
            display:inline-block;
            width:220px;
            margin:15px;
            padding:15px;
            background:gold;
            color:black;
            text-decoration:none;
            font-size:18px;
            border-radius:8px;
            font-weight:bold;
        }

        .btn:hover{
            background:#ffd700;
        }
    </style>
</head>

<body>

<div class="header">
    GENZ STYLE - ADMIN DASHBOARD
</div>

<div class="container">

<h2>Welcome, <?php echo $_SESSION['fullname']; ?></h2>

<a href="add_product.php" class="btn">Add Product</a>

<a href="view_product.php" class="btn">View Products</a>

<a href="view_orders.php" class="btn">View Orders</a>

<a href="../logout.php" class="btn">Logout</a>

</div>

</body>
</html>