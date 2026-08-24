<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT fullname, phone FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

    <style>
        body{
            font-family: Arial;
            background:#000;
            color:white;
            padding:20px;
        }

        .card{
            width:350px;
            margin:auto;
            background:#111;
            padding:20px;
            border-radius:10px;
            text-align:center;
        }

        h2{
            color:gold;
        }

        .info{
            margin:15px 0;
            font-size:18px;
        }

        .label{
            color:gold;
            font-weight:bold;
        }

        .btn{
            display:inline-block;
            margin-top:15px;
            padding:10px 15px;
            background:gold;
            color:black;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="card">

<h2>My Profile</h2>

<div class="info">
    <span class="label">Name:</span><br>
    <?php echo $user['fullname']; ?>
</div>

<div class="info">
    <span class="label">Phone:</span><br>
    <?php echo $user['phone']; ?>
</div>

<a href="dashboard.php" class="btn">Back</a>

</div>

</body>
</html>