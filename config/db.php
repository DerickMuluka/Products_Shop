<?php

$conn = mysqli_connect("localhost", "root", "", "Genz_style");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>