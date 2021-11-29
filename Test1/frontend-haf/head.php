<?php include('config/constants.php') ?>
<?php include('addcart.php') ?>


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
    <i class="fas fa-user" id="login"></i>
    <i class="fas fa-shopping-cart" id="cart"></i>
</div>


<!-- Search Form Start Here -->
<form action="<?php echo SITEURL; ?>food-search.php" method="POST" id="search-form">
    <input type="search" placeholder="search here..." name="search" id="search-box">
    <label  for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>
<!-- Search Form End Here -->

<!-- Shopping Cart Form Start Here -->
<div class="shopping-cart">
        <h2>Your Cart</h2>
        <?php   
            if(!empty($_SESSION["shopping_cart"]))  
            {   
                $total = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
            { 
        ?>  
        <div class="box">
        <a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-trash"></i></a>
            <img src="<?php echo SITEURL; ?>images/food/<?php echo $values['item_image']; ?>" width="110" height="110" class="img-curve">
            <div class="content">
                <h3><?php echo $values['item_name'] ?></h3>
                <span class="price">$ <?php echo $values["item_price"]; ?></span>
                <span class="quantity">qty:<?php echo $values["item_quantity"]; ?></span>
            </div>
        </div>
        <?php  
            $total = $total + ($values["item_quantity"] * $values["item_price"]);  
            }  
        ?>  
        <div class="total"> total : $ <?php echo number_format($total, 2); ?></div>
        <a href="#" class="btn">checkout</a>
        <?php  
        }  else {   
        ?>  
        <h3 class="text-center">Your Cart is empty!</h3>
        <?php
        }
        ?>
</div>
<!-- Shopping Cart Form End Here -->

</header>

    <!-- Navbar Section Ends Here -->