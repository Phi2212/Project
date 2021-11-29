<?php include('config/constants.php') ?>

<html>
    <head>
       
        <title>LoginPage</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body class="bg-login">
        <form action="" method="POST" class="box1">
            <h1>Login Again</h1>
            <?php 

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login">
            <h1>If you have been blocked<a href="<?php echo SITEURL; ?>contact.php">Contact here</a></h1>
            

        </form>

    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if ($username == "" || $password == "") {

			$_SESSION['login'] = "<div class='error'> Please Enter Information </div>";
            header('location:'.SITEURL.'login-guest.php'); 

		}else{
			$sql = "SELECT * FROM fod_guest WHERE username='$username' AND password= '$password' && isblock='No'";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
    
            if($count==0)
            {   
                if($isblock='Yes'){
                    $_SESSION['login'] = "<div class='error'> Your Account has been blocked </div>";
                    header('location:'.SITEURL.'login-guest.php');
                }
                else{
                    $_SESSION['login'] = "<div class='error'> Login Failed! Try again </div>";
                    header('location:'.SITEURL.'login-guest.php'); 
                }
            }
            else
            {

            }
		}
    }
?>