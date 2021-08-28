<?php include('otherpart/menu.php'); ?>
<div class="main-content">
    <div class="frame">
        <h1> Add Admin </h1>
        <form action="" method="POST">

            <table class="tbl-1">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="admin_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
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
 $admin_name = $_POST['admin_name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']);

 $sql = "INSERT INTO fod_admin SET
    admin_name='$admin_name',
    username='$username',
    password='$password'
 ";

 //echo $sql;
   
 
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res==TRUE)
    {
        //Test data insert
        //echo "Date insert";
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully!</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    
    else
    {
        //echo "Fail";
        $_SESSION['add'] = "<div class= 'error'>Add Failed! Try again!</div>";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>
