<?php
session_start();
include "../config/db.php";

// Check if product ID was passed
if (!isset($_GET['id'])) {
    die("Product not found.");
}

$product_id = $_GET['id'];

// Get product details
$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Product not found.");
}

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h2>Edit Product</h2>

<form method="POST" action="update_product.php">

    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">

    <label>Product Name</label>
    <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>">

    <label>Price</label>
    <input type="number" name="price" value="<?php echo $row['price']; ?>">

    <label>Category</label>
    <input type="text" name="category" value="<?php echo $row['category']; ?>">

    <label>Stock</label>
    <input type="number" name="stock" value="<?php echo $row['stock']; ?>">

    <button type="submit">Update Product</button>

</form>

</body>
</html>