<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#000;
    color:white;
}

.header{
    background:#111;
    padding:20px;
    text-align:center;
}

.header h1{
    color:gold;
}

.header p{
    margin-top:10px;
}

.container{
    width:90%;
    margin:30px auto;
}

.card-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.card{
    background:#111;
    padding:25px;
    border-radius:10px;
    text-align:center;
}

.card h3{
    color:gold;
    margin-bottom:10px;
}

.card a{
    display:inline-block;
    margin-top:10px;
    padding:10px 20px;
    background:gold;
    color:black;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.logout{
    text-align:center;
    margin-top:30px;
}

.logout a{
    background:red;
    color:white;
    padding:10px 20px;
    text-decoration:none;
    border-radius:5px;
}
.footer{
    background:#111;
    color:white;
    text-align:center;
    padding:30px;
    margin-top:60px;
}

.footer h3{
    color:gold;
    margin-bottom:10px;
}

.footer p{
    margin:8px 0;
}
</style>

</head>
<body>
<div class="header">
    <h1>GENZ STYLE</h1>
    <p>Welcome, <?php echo $_SESSION['fullname']; ?></p>
</div>

<div class="container">

    <div class="card-container">

        <div class="card">
            <h3>View Products</h3>
            <p>Browse available fashion products.</p>
            <a href="products.php">Open</a>
        </div>

        <div class="card">
            <h3>My Orders</h3>
            <p>View all your orders.</p>
            <a href="orders.php">Open</a>
        </div>

        <div class="card">
            <h3>My Profile</h3>
            <p>Manage your account details.</p>
            <a href="profile.php">Open</a>
        </div>

    </div>
    <div class="card">
    <h3>Add Product</h3>
    <p>Add new products to the boutique.</p>
    <a href="../admin/add_product.php">Open</a>
</div>

    <div class="logout">
        <a href="logout.php" class="btn">Logout</a>
    </div>

</div>
<footer class="footer">

    <h3>GENZ STYLE</h3>

    <p>Digital Culture - Modern Fashion for Everyone</p>

    <p>Email: maundumary270@gmail.com | Phone: +254798986585</p>

    <p>&copy; 2026 GenZ Style. All Rights Reserved.</p>

</footer>
</body>
</html>