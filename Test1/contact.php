
<?php include('config/constants.php') ?>
<?php include('addcart.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
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
</header>

    <!-- Navbar Section Ends Here -->
<body>
<form action="" method="POST">
	<div class="container1">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h5>Contact Us</h5>
              
                <br>
                <?php 
                    if(isset($_SESSION['send'])){
                        echo $_SESSION['send'];
                        unset($_SESSION['send']);
                    }
                
                ?>
				<input type="text" name="name" class="field" placeholder="Your Name" required>
				<input type="text" name="email" class="field" placeholder="Your Email" required>
				<input type="text" name="phone" class="field" placeholder="Phone" required>
				<textarea placeholder="Message" name="content" class="field" required></textarea>
                <td colspan="2">
                <input type="submit" name="submit1" class="btn4" value="Submit">
                </td>
                
			</div>
		</div>
	</div>
    </form>
</body>
<?php include('frontend-haf/footer.php') ?>
<?php

if(isset($_POST['submit1']))
{
    //Test submit//
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $createdate = date("Y-m-d h:i:sa");
 $content = $_POST['content'];
 $email = $_POST['email'];  
    $sql3 = "INSERT INTO fod_contact SET
    name='$name',
    content='$content',
    email='$email',
    phone='$phone',
    date='$createdate'
         ";
        
         //echo $sql;
         $res1 = mysqli_query($conn, $sql3);
        
        if($res1 == true)
        {
            //Test data insert
            //echo "Fail";
            $_SESSION['send'] = "<div class='success'>Send Successfully!</div>";
            header('location:'.SITEURL.'contact.php');


        }
         
        else
        {
            //echo "Date insert";
            $_SESSION['send'] = "<div class= 'error'>Error!Try Again</div>";
            header("location:".SITEURL.'contact.php');

        }


   
 

}

?>
