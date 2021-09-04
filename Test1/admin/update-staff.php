<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">
        <h1>Update Staff</h1>
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
            $sql="SELECT * FROM fod_staff WHERE id=$id";
            $res=mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                
                if($count==1)
                {
                    //Test responsive
                    //echo "Ok";
                    $row=mysqli_fetch_assoc($res);

                    $staff_name = $row['staff_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-staff.php');
                }
            }

        ?>

        <form action="" method="POST">

            <table class="tbl-1">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="staff_name" value="<?php echo $staff_name; ?>"></td>
                </tr>

                <tr>
                    <td>Block</td>
                    <td><input type="radio" name="isblock" value="No">No</td>
                    <td><input type="radio" name="isblock" value="Yes">Yes</td>
                </tr>
                    
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Staff" class="btn-secondary">
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
        $staff_name = $_POST['staff_name'];

            $sql = "UPDATE fod_staff SET
            staff_name = '$staff_name',
            isblock = '$isblock'
            WHERE id= '$id'
            ";
    
            $res = mysqli_query($conn, $sql);
    
            if($res==TRUE)
            {
                
                $_SESSION['update'] = "<div class='success'>Update Successfully!</div>";
                header('location:'.SITEURL.'admin/manage-staff.php');
            }
            else
            {   
                $_SESSION['update'] = "<div class='error'>Update Failed! Try again!</div>";
                header('location:'.SITEURL.'admin/update-staff.php');
            }
        


    }

?>



<?php include('otherpart/footer.php'); ?>