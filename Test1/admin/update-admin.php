<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">
        <h1>Update Admin</h1>
        <br />

        <?php 
        
            $id=$_GET['id'];
            $sql="SELECT * FROM fod_admin WHERE id=$id";
            $res=mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                
                if($count==1)
                {
                    //Test responsive
                    //echo "Ok";
                    $row=mysqli_fetch_assoc($res);

                    $admin_name = $row['admin_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

        ?>

        <form action="" method="POST">

            <table class="tbl-1">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="admin_name" value="<?php echo $admin_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                    
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
        $admin_name = $_POST['admin_name'];
        $username = $_POST['username'];

        $sql = "UPDATE fod_admin SET
        admin_name = '$admin_name',
        username = '$username'
        WHERE id= '$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            
            $_SESSION['update'] = "<div class='success'>Update Successfully!</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Update Failed! Try again!</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }

?>



<?php include('otherpart/footer.php'); ?>