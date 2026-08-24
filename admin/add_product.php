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

$message = "";

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "../images/" . $image;

    if (move_uploaded_file($tmp, $folder)) {

        $sql = "INSERT INTO products 
        (product_name, description, category, price, stock, image)
        VALUES 
        ('$product_name', '$description', '$category', '$price', '$stock', '$image')";

        if (mysqli_query($conn, $sql)) {
            $message = "Product added successfully!";
        } else {
            $message = "Database error!";
        }

    } else {
        $message = "Image upload failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <style>
        body{
            font-family:Arial;
            background:#000;
            color:white;
            padding:20px;
        }

        h2{ color:gold; }

        form{
            width:400px;
            margin:auto;
            background:#111;
            padding:20px;
            border-radius:10px;
        }

        input, textarea{
            width:100%;
            padding:10px;
            margin:10px 0;
        }

        button{
            width:100%;
            padding:10px;
            background:gold;
            border:none;
            font-weight:bold;
            cursor:pointer;
        }

        .msg{
            text-align:center;
            color:lightgreen;
        }
    </style>
</head>

<body>

<h2 style="text-align:center;">Add Product</h2>

<?php if($message != "") { ?>
    <p class="msg"><?php echo $message; ?></p>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="product_name" placeholder="Product Name" required>

    <textarea name="description" placeholder="Description" required></textarea>

    <input type="text" name="category" placeholder="Category" required>

    <input type="number" name="price" placeholder="Price" required>

    <input type="number" name="stock" placeholder="Stock" required>

    <input type="file" name="image" required>

    <button type="submit" name="add_product">Add Product</button>

</form>

</body>
</html>