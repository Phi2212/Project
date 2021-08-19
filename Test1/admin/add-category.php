<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">

        <h1>Add Category</h1>
        <br><br>
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>
        

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-1">
                
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter title">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>

            </table>
        </form>

        <?php 

            if(isset($_POST['submit']))
            {
                
                //echo "Ok";
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }
                
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                
                //print_r($_FILES['image']);
               // die();
                
                if(isset($_FILES['image']['name']))
                {
                    $image_title = $_FILES['image']['name'];

                    if($image_title !="")
                    {
                        
                    

                        $ext = end(explode('.', $image_title));

                        $image_title = "Category_pic_".rand(000, 999).'.'.$ext;
                        
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_title;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==FALSE)
                        {
                            $_SESSION['upload'] = "<div class='error'> Upload Image Failed!</div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            die();
                        }

                    }
                }
                else
                {
                    $image_title = "";
                }

                $sql = "INSERT INTO fod_category SET
                    title='$title',
                    featured='$featured',
                    active='$active',
                    image_title='$image_title'
                ";

                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $_SESSION['add'] = "<div class='success'> Add Successful!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='success'> Add Failed! Try again!</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        
        
        
        
        ?>

    </div>
</div>


<?php include('otherpart/footer.php'); ?>