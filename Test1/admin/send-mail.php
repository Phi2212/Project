<?php include('otherpart/header-staff.php') ?>
<div class="main-content">
    <div class="frame">
        <h1> Send Message </h1>
        <form action="" method="POST">
        <?php 
                    if(isset($_SESSION['send']))
                    {
                        echo $_SESSION['send'];
                        unset($_SESSION['send']);
                    }
        ?> 

            <table class="tbl-1">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" placeholder="Enter PhoneNumber"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" placeholder="Enter Email"></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><textarea name="content"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Send Message" class="btn-secondary">
                    </td>
                </tr>
            </table>  

        </form>
    </div>
</div>

<?php include('otherpart/footer.php'); ?>

<?php

if(isset($_POST['submit']))
{
    //Test submit//
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $createdate = date("Y-m-d h:i:sa");
 $content = $_POST['content'];
 $email = $_POST['email'];

    $sql2 = "INSERT INTO fod_contact SET
    name='$name',
    phone='$phone',
    content='$content',
    date='$createdate',
    email='$email'
         ";
        
         //echo $sql;
         $res2 = mysqli_query($conn, $sql2);
        
        if(!$res2)
        {
            //Test data insert
            //echo "Fail";
            $_SESSION['send'] = "<div class= 'error'>Error!Try Again</div>";
            header("location:".SITEURL.'admin/send-mail.php');
        }
         
        else
        {
            //echo "Date insert";
            $_SESSION['send'] = "<div class='success'>Send Successfully!</div>";
            header('location:'.SITEURL.'admin/send-mail.php');
        }


   
 

}

?>