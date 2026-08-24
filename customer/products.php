<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM products";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM products 
            WHERE product_name LIKE '%$search%' 
            OR category LIKE '%$search%'";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>

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

.container{
    width:90%;
    margin:30px auto;
}

.products{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.card{
    background:#111;
    border-radius:10px;
    padding:15px;
    text-align:center;
}

.card img{
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:10px;
}

.card h3{
    color:gold;
    margin-top:10px;
}

.price{
    font-size:18px;
    margin-top:10px;
    color:gold;
}

.back{
    text-align:center;
    margin-top:30px;
}

.back a{
    background:gold;
    color:black;
    padding:10px 20px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="header">
    <h1>GENZ STYLE PRODUCTS</h1>
</div>

<div class="container">

    <div class="products">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">

            <img src="/Genz_style/images/<?php echo $row['image']; ?>" alt="Product" width="200">

            <h3><?php echo $row['product_name']; ?></h3>

            <p>Category: <?php echo $row['category']; ?></p>

            <p>Quantity: <?php echo $row['stock']; ?></p>

            <p class="price">
                Ksh <?php echo $row['price']; ?>
            </p>

        </div>
        <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">

    <button type="submit" name="add_cart">
        Add to Cart
    </button>
</form>
<form method="GET" style="margin-bottom:20px;">
    <input type="text" name="search" placeholder="Search product..."
           style="padding:10px; width:250px;">

    <button type="submit" style="padding:10px; background:gold; border:none;">
        Search
    </button>
</form>

        <?php } ?>

    </div>

    <div class="back">
        <a href="dashboard.php">Back to Dashboard</a>
    </div>

</div>

</body>
</html>