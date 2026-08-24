<?php
include "../config/db.php";

if (!isset($_GET['id'])) {
    die("No product selected");
}

$id = $_GET['id'];

// delete product
$sql = "DELETE FROM products WHERE product_id = '$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: view_product.php");
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($conn);
}
?>