<?php include('config/constants.php') ?>
<?php include('addcart.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Link CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
<header>

<a href="<?php echo SITEURL; ?>index.php" class="logo"><i class="fas fa-utensils"></i>FFood</a>

<nav class="navbar">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#category">Categories</a>
    <a href="#food-menu">Foods</a>
    <a href="#review">Reviews</a>
    <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
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
</header>
<!-- Navbar Section Ends Here -->


<?php if(isset($_SESSION['username'])){?>

        <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            <h1><?php            
            if(isset($_SESSION['order']))
            {
                echo $_SESSION['order'];
                unset($_SESSION['order']);
            } ?></h1>
            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                    <?php   
            if(!empty($_SESSION["shopping_cart"]))  
            {   
                $total = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
            { 
        ?>  
            <div class="box">
            <div class="content">
                <h3><?php echo $values['item_name'] ?></h3>
                <input type="hidden" name="food" value="<?php echo $values['item_name'] ?>">
                <span class="price">$ <?php echo $values["item_price"]; ?></span>
                <input type="hidden" name="price" value="<?php echo $values["item_price"]; ?>">
                <span class="quantity">qty:<?php echo $values["item_quantity"]; ?></span>
                <input type="hidden" name="qty" value="<?php echo $values["item_quantity"]; ?>">
            </div>   
            </div>
            
            <?php  
            $total = $total + ($values["item_quantity"] * $values["item_price"]);  
            }  
        ?> 
        <div class="total"><h3> total : $ <?php echo number_format($total, 2); ?></h3></div>
        <input type="hidden" name="total" value="<?php echo number_format($total, 2); ?>">
        <?php  
        }  else {   
        ?>  
        <?php
        }
        ?>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"  class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact"  class="input-responsive"  required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive"  required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10"  class="input-responsive" required></textarea>

                    <input type="submit" name="submit1" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            
            <?php

                if(isset($_POST['submit1']))
                {
                    $user_id = $_SESSION['user_id'];;
                    $total = $_POST['total'];
                    $order_date = date("Y-m-d h:i:sa");
                    $status = "Ordered";
                    $customer_name = $_POST['full-name'];
                    $customer_email = $_POST['email'];
                    $customer_contact = $_POST['contact'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO fod_order SET
                    user_id = '$user_id',
                    total = '$total',
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_email = '$customer_email',
                    customer_contact = '$customer_contact',
                    customer_address = '$customer_address'
                    ";
                    
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2)
                    {
                        $order_id= mysqli_insert_id($conn);
                        foreach($_SESSION['shopping_cart'] as $keys => $values){
                            mysqli_query($conn, "INSERT INTO fod_order_detail(order_id,food_id,price,quantity) VALUE('$order_id', '".$values['item_id']."', '".$values['item_price']."', '".$values['item_quantity']."')");
                        }
                        unset($_SESSION['shopping_cart']);
                        $_SESSION['order'] = "<div class='error'>Order Success</div>";
                        header('location'.SITEURL.'index.php');

                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error'>Order Failed! Try again!</div>";
                        header('location:'.SITEURL.'order.php');
                    }
                }
                else
                {

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
<?php }else { ?>

    <script>alert("Please login to continue the process!")</script>  
    <script>window.location="index.php"</script> 

<?php } ?>

    <?php include('frontend-haf/footer.php') ?>