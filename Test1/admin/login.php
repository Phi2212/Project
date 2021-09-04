<?php include('../config/constants.php'); ?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="bg-login">
    <div>


        <form action="" method="POST" class="box1">
            <h1>Login</h1>
            <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['login-first']))
            {
                echo $_SESSION['login-first'];
                unset($_SESSION['login-first']);
            }
        
            ?>
            <input type="text" name="username" placeholder="Enter Username">
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">


        </form>
    </div>
</body>

</html>

<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM fod_admin WHERE username='$username' AND password= '$password' && isblock='No'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'> Login successful! </div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
        }
        else
        {   
            if($isblock = 'Yes'){
            $_SESSION['login'] = "<div class='error text-center'> Your account have been blocked </div>";
            header('location:'.SITEURL.'admin/login.php'); 
            }
            else{
            $_SESSION['login'] = "<div class='error text-center'> Login Failed! Try again </div>";
            header('location:'.SITEURL.'admin/login.php'); 
            }

        }
    }


?>