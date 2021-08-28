<?php include('config/constants.php') ?>

<html>
    <head>
       
        <title>LoginPage</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body class="bg-login">
        <form action="" method="POST" class="box1">
            <h1>Login</h1>
            <?php 
            if(isset($_SESSION['signup']))
            {
                echo $_SESSION['signup'];
                unset($_SESSION['signup']);
            }
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login">
            <a href="<?php echo SITEURL; ?>signup.php">Don't have account?Sign up here</a>
            

        </form>

    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM fod_guest WHERE username='$username' AND password= '$password'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'> Login successful! </div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            $_SESSION['login'] = "<div class='error'> Login Failed! Try again </div>";
            header('location:'.SITEURL.'login-guest.php'); 
        }
    }


?>