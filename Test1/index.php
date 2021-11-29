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
        <a href="order.php" class="btn">checkout</a>
        <?php  
        }  else {   
        ?>  
        <h3 class="text-center">Your Cart is empty!</h3>
        <?php
        }
        ?>
</div>
<!-- Shopping Cart Form End Here -->

<!-- Login Form Start Here -->
<form action="index.php?action=login" method="POST" class="login-form">
    <?php 
        if(isset($_SESSION['username'])){
    ?>
        <?php 

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
    <div><h1>Welcome <?php echo $_SESSION['username']; ?></h1></div>

    <a href="<?php echo SITEURL.'logout.php';?>" class="btn">Log out</a>
    <?php } else{ ?>

        <h2>login now</h2>
        <?php 

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <input type="text" name="username" placeholder="your name" class="box2" required>
        <input type="password" name="password" placeholder="your password" class="box2" required>
        <p>Can't Login <a href="login-guest.php">click here</a></p>
        <p>don't have an account <a href="signup.php">create now</a></p>
        <input type="submit" name="submit" value="login now" class="btn">
<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if ($username == "" || $password == "") {

			$_SESSION['login'] = "<div class='error'> Please Enter Information </div>";
            header('location:'.SITEURL.'index.php'); 

		}else{
			$sql = "SELECT * FROM fod_guest WHERE username='$username' AND password= '$password' && isblock='No'";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
    
            if($count>0)
            {   
                while($row = mysqli_fetch_assoc($res)){
                    $_SESSION['user_id'] = $row['id'];
                }
                $_SESSION['username']= $username;
                $_SESSION['login'] = "<script>alert('Login successful!')</script>";  
                header('location:'.SITEURL.'index.php');
                
            }
            else{
                if($isblock='Yes'){
                $_SESSION['login'] = "<div class='error'> Your Account has been blocked </div>";
                header('location:'.SITEURL.'index.php');
                }
                else{
                $_SESSION['login'] = "<div class='error'> Login Failed! Try again </div>";
                header('location:'.SITEURL.'index.php'); 
                }
            }
		}
    }
?>
<?php } ?>
<!-- Login Form End Here -->
</header>
<!-- Navbar Section Ends Here -->

<section class="home" id="home">
    <div class="content">
        <h3>Welcome to <span>FFood</span></h3>
        <p>Do you need a website that sells fast food, free shipping, and the fastest way to ship projects? So what are you waiting for and let's find something you like on our website</p>
        <a href="#category" class="btn">Find Food Now</a>
    </div>
</section>

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- About Section Start Here -->
    <section class="about" id="about">
        <div class="container">
            <h3 class="sub-heading"> about us </h3>
            <h1 class="heading"> why choose us? </h1>
                <div class="row">
                    <div class="image">
                        <img src="images/about.png">
                    </div>

                <div class="content">
                    <h3>best food in HCM City</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
                    <div class="icons-container">
                        <div class="icons">
                            <i class="fas fa-shipping-fast"></i>
                            <span>free delivery</span>
                        </div>
                        <div class="icons">
                            <i class="fas fa-dollar-sign"></i>
                            <span>easy payments</span>
                        </div>
                        <div class="icons">
                            <i class="fas fa-headset"></i>
                            <span>24/7 service</span>
                        </div>
                    </div>
                    <a href="#" class="btn">learn more</a>
                </div>
            </div>
        </div>  
    </section>
    <!-- About Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories" id="category">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            
                $sql = "SELECT * FROM fod_category WHERE active='Yes' && featured='Yes' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_title = $row['image_title'];

                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                
                                    if($image_title=="")
                                    {
                                        echo "No Image";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_title; ?>" width="700" height="400" class="img-responsive img-curve">
                                        <?php
                                    }
                                
                                ?>
            
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php                       
                    }
                }
                else
                {
                    echo "No Category Found!";
                }
            
            ?>

            <div class="clearfix"></div>
        </div>
        <p class="text-center">
                    <a class="btn" href="<?php echo SITEURL;?>categories.php">See all Categories</a>
                </p>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->

    <section class="food-menu" id="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

                $sql = "SELECT * FROM fod_food WHERE featured='Yes' && active='Yes' LIMIT 6 ";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title']; 
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_title = $row['image_title'];
                        
                        ?>
                        <form method="post" action="index.php?action=add&id=<?php echo $id; ?>"> 
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($image_title=="")
                                    {
                                        echo "Image Not Found";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_title; ?>" width="260" height="120" class="img-responsive img-curve">
                                        <?php
                                    }
                                
                                
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <input type="number" name="quantity" class="input-responsive" value="1" min="1" max="10" require>
                                <input type="hidden" name="hidden_image" value="<?php echo $image_title; ?>">
                                <input type="hidden" name="hidden_title" value="<?php echo $title; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $price; ?>">
                                <input type="submit" name="add_to_cart" class="btn" value="Add to Cart" />
                            </div>
                        </div>
                        </form>
                        <?php
                    }
                } 
                else
                {
                    echo "No Food Found";
                }
            ?>

            <div class="clearfix"></div>

        </div>
                <p class="text-center">
                    <a class="btn" href="<?php echo SITEURL;?>foods.php">See all food</a>
                </p>
    </section>

    <!-- fOOD Menu Section Ends Here -->

    <!-- Review Section Starts Here -->
    <section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-4.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

        </div>

    </div>
    
</section>
<!-- Review Section Ends Here -->

<?php include('frontend-haf/footer.php') ?>