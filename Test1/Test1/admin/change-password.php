<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">
        <h1>Change Password</h1>
        <br />

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
          
        ?>

        <form action="" method="POST">

            <table class="tbl-1">
                <tr>
                    <td>Present Password:</td>
                    <td><input type="password" name="present_password" placeholder="Enter current passwword"></td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="Enter new password"></td>
                </tr>
                    
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Enter new password again"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>  

        </form>
    </div>
</div>

<?php 

    if(isset($_POST['submit']))
    {
        //Test button work or not I don't know... yet
        //echo "ok";
        $id = $_POST['id'];
        $present_password = md5($_POST['present_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM fod_admin WHERE id=$id AND password = '$present_password'";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
           $count=mysqli_num_rows($res);

           if($count==1)
           {
               //Test find user in database
               //echo "user exist";
               if($new_password==$confirm_password)
               {
                    //Test pass are same or not. Hope it work
                    //echo "OK yeah";
                    $sql2 = "UPDATE fod_admin SET
                    password='$new_password'
                    WHERE id=$id 
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE)
                    {
                        $_SESSION['change-password'] = "<div class='success'>Change Successful!</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-password'] = "<div class='error'>Change Failed! Try again</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
               }
               else
               {
                $_SESSION['password-not-match'] = "<div class='error'>Password not match! Try again</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
               }
           }
           else
           {
             $_SESSION['user-not-found'] = "<div class='error'>User not found! Try again</div>";
             header('location:'.SITEURL.'admin/manage-admin.php');
           }
        }

    }

?>



<?php include('otherpart/footer.php'); ?>