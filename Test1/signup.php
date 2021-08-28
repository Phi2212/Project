<?php include('config/constants.php') ?>

<html>
    <head>
        <title>SignupPage</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body class="bg-login">
        <form action="" method="POST" class="box1">
            <h1>Signup</h1>
            <?php
            if(isset($_SESSION['signup']))
            {
                echo $_SESSION['signup'];
                unset($_SESSION['signup']);
            }
            if(isset($_SESSION['signup-fail']))
            {
                echo $_SESSION['signup-fail'];
                unset($_SESSION['signup-fail']);
            }
            if(isset($_SESSION['empty']))
            {
                echo $_SESSION['empty'];
                unset($_SESSION['empty']);
            }
            ?>
            <input type="text" name="name" placeholder="Your Name">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <div>
            <input type="submit" name="submit" value="Signup">
            </div>
            

        </form>

    </body>
</html>

<?php
if(isset($_POST['submit']))
{
         //Test submit//
 $name = $_POST['name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']);

 
 $sql = "INSERT INTO fod_guest SET
    name='$name',
    username='$username',
    password='$password'
 ";
 //echo $sql;
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error());   


        if($res==TRUE)
        {
        //Test data insert
        //echo "Date insert";
        $_SESSION['signup'] = "<div class=success>Signup Successfully! Please Login to access</div>";
        header("location:".SITEURL.'login-guest.php');
        }
    
        else
        {
            //echo "Fail";
            $_SESSION['signup'] = "<div class= error>Signup Failed! Try again!</div>";
            header("location:".SITEURL.'signup.php');
        }  
      
}
?>