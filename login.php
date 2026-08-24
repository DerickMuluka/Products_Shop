<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "config/db.php";

$error = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == "Admin") {
                header("Location: admin/dashboard.php");
                exit();
            } else {
                header("Location: customer/dashboard.php");
                exit();
            }

        } else {
            $error = "Incorrect password!";
        }

    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - GenZ Style</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#000;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.login-box{
    width:400px;
    background:#111;
    padding:30px;
    border-radius:10px;
    text-align:center;
}

h1{
    color:gold;
    margin-bottom:10px;
}

.subtitle{
    color:white;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:gold;
    color:black;
    border:none;
    border-radius:5px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#ffd700;
}

.error{
    color:red;
    margin-bottom:15px;
}

a{
    color:gold;
    text-decoration:none;
}

</style>

</head>
<body>

<div class="login-box">

<h1>GENZ STYLE</h1>
<p class="subtitle">Digital Culture</p>

<h2 style="color:white;">LOGIN</h2>

<br>

<?php
if (!empty($error)) {
    echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

    <input
        type="email"
        name="email"
        placeholder="Email Address"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >

    <button type="submit" name="login">
        LOGIN
    </button>

</form>

<br>
<p style="color:white;">
    Don't have an account?
    <a href="register.php">Register</a>
</p>
</div>
</body>
</html>