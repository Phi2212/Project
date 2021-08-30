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
        if ($username == "" || $password == "") {

			$_SESSION['login'] = "<div class='error'> Please Enter Information </div>";
            header('location:'.SITEURL.'login-guest.php'); 

		}else{
			$sql = "SELECT * FROM fod_guest WHERE username='$username' AND password= '$password'";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
    
            if($count==0)
            {
                $_SESSION['login'] = "<div class='error'> Login Failed! Try again </div>";
                header('location:'.SITEURL.'login-guest.php'); 


            }
            else
            {
                while($data = mysqli_fetch_array($res)){
                $_SESSION["user_id"] = $data["id"];
				$_SESSION['username'] = $data["username"];
				$_SESSION["name"] = $data["name"];
				$_SESSION["isblock"] = $data["isblock"];
                $_SESSION["permision"] = $data["permision"];
                }
                $_SESSION['login'] = "<div class='success'> Login successful! </div>";  
                header('location:'.SITEURL.'index.php');
            }
		}

        


    }


?>