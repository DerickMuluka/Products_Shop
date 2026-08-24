<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | GenZ Style</title>

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
    width:80%;
    margin:50px auto;
    background:#111;
    padding:30px;
    border-radius:10px;
}

h2{
    color:gold;
    text-align:center;
    margin-bottom:20px;
}

p{
    line-height:1.8;
    margin-bottom:15px;
    text-align:justify;
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
    color:white;
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

    <h2>About GenZ Style</h2>

    <p>
        GenZ Style is an online boutique management system designed to provide
        customers with a simple, secure, and convenient way to shop for trendy
        fashion products. Our collection includes stylish clothing for both men
        and women at affordable prices.
    </p>

    <p>
        Our mission is to make online shopping fast, reliable, and enjoyable by
        offering quality products together with excellent customer service.
        Customers can browse products, add items to their cart, place orders,
        and manage their accounts with ease.
    </p>

    <p>
        We strive to stay up to date with the latest fashion trends while
        ensuring that every customer enjoys a smooth shopping experience through
        our digital platform.
    </p>

    <a href="index.php" class="btn">Back to Home</a>

</div>

<div class="footer">
    &copy; 2026 GenZ Style. All Rights Reserved.
</div>

</body>
</html>