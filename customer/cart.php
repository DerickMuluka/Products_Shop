<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cart.*, products.product_name, products.price, products.image
        FROM cart
        INNER JOIN products
        ON cart.product_id = products.product_id
        WHERE cart.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <style>
        body{
            font-family:Arial;
            background:#000;
            color:white;
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

        th,td{
            border:1px solid #444;
            padding:12px;
            text-align:center;
        }

        th{
            background:gold;
            color:black;
        }

        img{
            width:80px;
            height:80px;
            object-fit:cover;
        }
    </style>
</head>

<body>

<h1>My Shopping Cart</h1>

<table>

<tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php
$grand_total = 0;

while($row = mysqli_fetch_assoc($result))
{
    $total = $row['price'] * $row['quantity'];
    $grand_total += $total;
?>

<tr>

<td>
<img src="./images/<?php echo $row['image']; ?>">
</td>
<td><?php echo $row['product_name']; ?></td>

<td>Ksh <?php echo number_format($row['price'],2); ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>Ksh <?php echo number_format($total,2); ?></td>
<td>
    <a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>"
       onclick="return confirm('Remove this item from the cart?');">
       Remove
    </a>
</td>

</tr>

<?php } ?>

<tr>

<td colspan="4"><b>Grand Total</b></td>

<td><b>Ksh <?php echo number_format($grand_total,2); ?></b></td>

</tr>
<form action="checkout.php" method="POST">
    <button type="submit" name="checkout"
    style="padding:12px 20px;
           background:gold;
           color:black;
           border:none;
           border-radius:5px;
           font-weight:bold;
           cursor:pointer;">
        Checkout
    </button>
</form>

</table>

</body>
</html>