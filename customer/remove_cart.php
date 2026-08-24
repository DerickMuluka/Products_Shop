<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {

    $cart_id = $_GET['id'];

    $sql = "DELETE FROM cart WHERE cart_id = '$cart_id'";

    mysqli_query($conn, $sql);

    header("Location: cart.php");
    exit();
}
?>