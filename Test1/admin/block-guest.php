<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">
        <h1>Banned Account</h1>
        <br />
        <?php
        if(isset($_SESSION['banned']))
                    {
                        echo $_SESSION['banned'];
                        unset($_SESSION['banned']);
                    }
        ?>

        <?php 

            $id=$_GET['id'];
            $sql="SELECT * FROM fod_guest WHERE id=$id";
            $res=mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                
                if($count==1)
                {
                    //Test responsive
                    //echo "Ok";
                    $row=mysqli_fetch_assoc($res);

                    $name = $row['name'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-guest.php');
                }
            }

        ?>

        <form action="" method="POST">

            <table class="tbl-1">
                    <td>Block</td>
                    <td><input type="radio" name="isblock" value="No">No</td>
                    <td><input type="radio" name="isblock" value="Yes">Yes</td>
                </tr>
                    
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Guest" class="btn-secondary">
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
        $isblock = $_POST['isblock'];

            $sql = "UPDATE fod_guest SET
            isblock = '$isblock'
            WHERE id= '$id'
            ";
    
            $res = mysqli_query($conn, $sql);
    
            if($res==TRUE)
            {
                
                $_SESSION['banned'] = "<div class='success'>Change Successfully!</div>";
                header('location:'.SITEURL.'admin/manage-guest.php');
            }
            else
            {
                $_SESSION['banned'] = "<div class='error'>Changed Failed! Try again!</div>";
                header('location:'.SITEURL.'admin/block-guest.php');
            }
        


    }

?>



<?php include('otherpart/footer.php'); ?>