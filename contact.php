<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | GenZ Style</title>

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

.navbar{
    background:#111;
    padding:20px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo h1{
    color:gold;
}

.logo p{
    color:white;
    font-size:14px;
}

.navbar ul{
    list-style:none;
    display:flex;
}

.navbar ul li{
    margin-left:25px;
}

.navbar ul li a{
    text-decoration:none;
    color:white;
    font-weight:bold;
}

.navbar ul li a:hover{
    color:gold;
}

.container{
    width:70%;
    margin:50px auto;
    background:#111;
    padding:30px;
    border-radius:10px;
}

h2{
    color:gold;
    text-align:center;
    margin-bottom:25px;
}

.info{
    font-size:18px;
    line-height:2;
}

.info strong{
    color:gold;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:gold;
    color:black;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.footer{
    background:#111;
    text-align:center;
    padding:20px;
    margin-top:50px;
}
</style>

</head>
<body>

<div class="navbar">

    <div class="logo">
        <h1>GENZ STYLE</h1>
        <p>Digital Culture</p>
    </div>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>

</div>

<div class="container">

<h2>Contact Us</h2>

<div class="info">
    <p><strong>Business Name:</strong> GenZ Style</p>
    <p><strong>Phone:</strong> +25498986585</p>
    <p><strong>Email:</strong> maundumary270@gmail.com</p>
    <p><strong>Location:</strong> Mombasa, Kenya</p>
    <p><strong>Working Hours:</strong> Monday - Saturday | 8:00 AM - 6:00 PM</p>
</div>

<a href="index.php" class="btn">Back to Home</a>

</div>

<div class="footer">
    &copy; 2026 GenZ Style. All Rights Reserved.
</div>

</body>
</html>