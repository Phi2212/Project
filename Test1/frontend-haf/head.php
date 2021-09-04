<?php include('config/constants.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Link CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
<header>

<a href="<?php echo SITEURL; ?>index.php" class="logo"><i class="fas fa-utensils"></i>FFood</a>

<nav class="navbar">
    <a href="<?php echo SITEURL; ?>">Home</a>
    <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
    <a href="<?php echo SITEURL; ?>foods.php">Food Menu</a>
    <a href="<?php echo SITEURL; ?>contact.php">Contact us</a>
</nav>

<div class="icons">
    <i class="fas fa-bars" id="menu-bars"></i>
    <i class="fas fa-search" id="search-icon"></i>
    <a href="#" class="fas fa-heart"></a>
    <a href="<?php echo SITEURL; ?>cart.php" class="fas fa-shopping-cart"></a>
</div>

</header>

<form action="<?php echo SITEURL; ?>food-search.php" method="POST" id="search-form">
    <input type="search" placeholder="search here..." name="search" id="search-box">
    <label  for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

    <!-- Navbar Section Ends Here -->