<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Products</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#000;
    color:white;
    margin:0;
    padding:20px;
}

h1{
    color:gold;
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
    background:#111;
}

table th,
table td{
    border:1px solid #333;
    padding:12px;
    text-align:center;
}

table th{
    background:gold;
    color:black;
}

img{
    width:80px;
    height:80px;
    object-fit:cover;
}

.btn{
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
    margin:2px;
    display:inline-block;
}

.edit{
    background:gold;
    color:black;
}

.delete{
    background:red;
    color:white;
}

.back{
    display:inline-block;
    margin-top:20px;
    padding:10px 15px;
    background:gold;
    color:black;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}
</style>

</head>
<body>

<h1>View Products</h1>

<table>

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Product Name</th>
    <th>Description</th>
    <th>Category</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?php echo $row['product_id']; ?></td>

    <td>
        <img src="../images/<?php echo $row['image']; ?>" alt="Product">
    </td>

    <td><?php echo $row['product_name']; ?></td>

    <td><?php echo $row['description']; ?></td>

    <td><?php echo $row['category']; ?></td>

    <td>Ksh <?php echo number_format($row['price'],2); ?></td>

    <td><?php echo $row['stock']; ?></td>

    <td>
        <a href="edit_product.php?id=<?php echo $row['product_id']; ?>" class="btn edit">Edit</a>

        <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="btn delete"
        onclick="return confirm('Are you sure you want to delete this product?');">
        Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php" class="back">Back to Dashboard</a>

</body>
</html>