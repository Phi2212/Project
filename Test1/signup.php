<?php include('config/constants.php') ?>

<html>
    <head>
        <title>SignupPage</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body class="bg-login">
        <form action="signup.php?action=signup" method="POST" class="box1">
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
            <input type="text" name="phone" placeholder="Your Phone Number" required>
            <input type="text" name="email" placeholder="Your Email" required>
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
 $isblock = 'No';
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 if ($username == "" || $password == "" || $name == "") {

    $_SESSION['signup'] = "<div class= error>Please fill your information</div>";
    header("location:".SITEURL.'signup.php'); 
}
else{
    if(isset($_GET['action']) && $_GET['action']== 'signup'){
        $sql_check = "SELECT * FROM fod_guest WHERE username='$username'";
        $res_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($res_check) > 0 ) { 	               
           //echo "Fail";
           $_SESSION['signup'] = "<div class= 'error'>Username Existed!Try Again</div>";
           header("location:".SITEURL.'signup.php'); 
       } 
       else{
    $sql = "INSERT INTO fod_guest SET
    name='$name',
    username='$username',
    password='$password',
    isblock='$isblock',
    phone='$phone',
    email='$email'
 "; 
  //echo $sql;
  $res = mysqli_query($conn, $sql) or die(mysqli_error());   


  if($res==TRUE)
  {
  //Test data insert
  //echo "Date insert";
  $_SESSION['id_cus'] = mysqli_insert_id($conn);
  echo '<script>alert("Signup Successfully! Please Login to access")</script>'; 
  echo '<script>window.location="index.php"</script>';
  }

  else
  {
      //echo "Fail";
      $_SESSION['signup'] = "<div class= error>Signup Failed! Try again!</div>";
      header("location:".SITEURL.'signup.php');
  } 
}
}     
}
}
?>