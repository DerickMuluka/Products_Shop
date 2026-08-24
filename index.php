<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GenZ Style | Digital Culture</title>

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

/* Navbar */
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
    font-size:14px;
    color:white;
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

/* Hero Section */
.hero{
    height:80vh;
    background:url('assets/images/banner.jpg') center/cover;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.hero-content{
    background:rgba(0,0,0,0.6);
    padding:40px;
    border-radius:10px;
}

.hero h1{
    font-size:60px;
    color:gold;
}

.hero p{
    margin-top:10px;
    font-size:22px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:gold;
    color:black;
    text-decoration:none;
    font-weight:bold;
    border-radius:5px;
    margin-right:10px;
}

/* Products */
.products{
    padding:60px;
}

.products h2{
    text-align:center;
    color:gold;
    margin-bottom:40px;
}

.product-container{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.product-card{
    width:250px;
    background:#111;
    padding:15px;
    border-radius:10px;
    text-align:center;
}

.product-card img{
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:10px;
}

.product-card h3{
    margin-top:10px;
}

.price{
    color:gold;
    font-size:18px;
    margin-top:5px;
}
.footer{
    background:#111;
    color:white;
    text-align:center;
    padding:30px;
    margin-top:60px;
}

.footer h3{
    color:gold;
    margin-bottom:10px;
}

.footer p{
    margin:8px 0;
}
</style>

</head>
<body>

<!-- Navbar -->
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

<!-- Hero Section -->
<section class="hero">

    <div class="hero-content">
        <h1>GENZ STYLE</h1>
        <p>Digital Culture</p>
        <p>Modern Fashion for Men and Women</p>

        <a href="register.php" class="btn">Register</a>
    </div>

</section>

<!-- Featured Products -->
<section class="products">

    <h2>FEATURED PRODUCTS</h2>

    <div class="product-container">

        <div class="product-card">
            <img src="./images/men-shirt.jpg" alt="">
            <h3>Men's Shirt</h3>
            <p class="price">Ksh 1,500</p>
        </div>

        <div class="product-card">
            <img src="./images/hoodie.jpg" alt="">
            <h3>Hoodie</h3>
            <p class="price">Ksh 2,000</p>
        </div>

        <div class="product-card">
            <img src="./images/dress.jpg" alt="">
            <h3>Ladies Dress</h3>
            <p class="price">Ksh 2,500</p>
        </div>

    </div>

</section>
<footer class="footer">

    <h3>GENZ STYLE</h3>

    <p>Digital Culture - Modern Fashion for Everyone</p>

    <p>Email: maundumary270@gmail.com | Phone: +254798986585</p>

    <p>&copy; 2026 GenZ Style. All Rights Reserved.</p>

</footer>
</body>
</html>