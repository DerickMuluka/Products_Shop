<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . "/config/db.php";

$message = "";

if (isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = date("Y-m-d");

    // check duplicate user
    $check = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $message = "User already exists!";
    } else {

        $sql = "INSERT INTO users(fullname, email, phone, password, role, created_at)
                VALUES('$fullname', '$email', '$phone', '$password', 'user', '$created_at')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registered successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>

/* SAME STYLE AS LOGIN */
body{
    margin:0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #000000, #b8860b);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:350px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
    text-align:center;
}

h1{
    color:#b8860b;
    margin-bottom:5px;
}

h2{
    color:black;
    margin-bottom:15px;
}

input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:8px;
    outline:none;
}

input:focus{
    border-color:#b8860b;
}

button{
    width:100%;
    padding:10px;
    background:#b8860b;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
    margin-top:10px;
}

button:hover{
    background:black;
}

.message{
    background:#e6ffe6;
    color:green;
    padding:8px;
    border-radius:8px;
    margin-bottom:10px;
    font-size:14px;
}

.link{
    margin-top:10px;
    font-size:14px;
}

.link a{
    color:#b8860b;
    text-decoration:none;
    font-weight:bold;
}

.link a:hover{
    text-decoration:underline;
}

</style>

</head>
<body>

<div class="container">

    <h1>GENZ STYLE</h1>
    <h2>REGISTER</h2>

    <?php if($message != ""): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">

        <input type="text" name="fullname" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="register">REGISTER</button>

    </form>

    <div class="link">
        Already have an account?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>