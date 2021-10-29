<?php include('otherpart/menu.php'); ?>

<div class="main-content">
    <div class="frame">

        <h1>Update Category</h1>
        <br><br>
        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM fod_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $current_image = $row['image_title'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category Not Found!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>
        

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-1">
                
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                        
                            if($current_image !="")
                            {

                                ?>

                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="200px">


                                <?php
                            }
                            else
                            {
                                echo "<div class='error'> Image not added</div>";
                            }
                        
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php 

            if(isset($_POST['submit']))
            {
                
                //echo "Ok";
                $title = $_POST['title'];
                $id = $_POST['id'];
                $current_image = $_POST['current_image'];
                $active = $_POST['active'];
                $featured = $_POST['featured'];

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
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }
                        
                        if($current_image !="")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
    
                            if($remove==FALSE)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove!</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                        
                    }
                    else
                    {
                        $image_title = $current_image;
                    }
                }
                else
                {
                    $image_title = $current_image;
                }

                $sql2 = " UPDATE fod_category SET
                title = '$title',
                active = '$active',
                image_title = '$image_title',
                featured = '$featured'
                WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==TRUE)
                {
                    $_SESSION['update'] = "<div class='success'> Update Successful!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'> Update Failed!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
        
        
        
        
        ?>

    </div>
</div>


<?php include('otherpart/footer.php'); ?>