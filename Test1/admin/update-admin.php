<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">
        <h1>Update Admin</h1>
        <br />
        <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

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
                    <td>Block</td>
                    <td><input type="radio" name="isblock" value="No" required>No</td>
                    <td><input type="radio" name="isblock" value="Yes" required>Yes</td>
                </tr>

                <tr>
                    <td>Permission</td>
                    <td><select name="permission">
                    <option value="0">Manage Account</option>
                    <option value="1">Warehouse Manager</option>
                    <option value="2">Manage Message</option>
                    <option value="3">Manage Order</option>
                    </select>
                    </td>
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
        $isblock = $_POST['isblock'];
        $permission = $_POST['permission'];

            $sql = "UPDATE fod_admin SET
            admin_name = '$admin_name',
            isblock = '$isblock',
            permission = '$permission'
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
                header('location:'.SITEURL.'admin/update-admin.php');
            }
        


    }

?>



<?php include('otherpart/footer.php'); ?>