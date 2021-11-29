<?php include('otherpart/header-staff.php'); ?>

<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM fod_food WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $price = $row2['price'];
        $description = $row2['description'];
        $current_image = $row2['image_title'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="frame">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-1">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="6"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        Current Image:
                    </td>
                    <td>
                        <?php 
                            if($current_image =="")
                            {

                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="200pxs">
                                <?php
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Select Update Image:
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>                        

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                
                
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php 
                            
                                $sql = "SELECT * FROM fod_category WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
    
                                        ?>
                                        <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                    
                                }
                                else
                                {
                                   echo  "<option value='0'>No Category Found</option>";
                                }
                            
                            ?>
                        </select>
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
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">                       
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>                

            </table>

        </form>

        <?php

            if(isset($_POST['submit']))
            {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                if(isset($_FILES['image']['name']))
                {
                    $image_title = $_FILES['image']['name'];

                    if($image_title !="")
                    {
                        $ext = end(explode('.', $image_title));

                        $image_title = "Food_pic_".rand(0000, 9999).'.'.$ext;
                        
                        $source = $_FILES['image']['tmp_name'];

                        $destination = "../images/food/".$image_title;

                        $upload = move_uploaded_file($source, $destination);

                        if($upload==FALSE)
                        {
                            $_SESSION['upload'] = "<div class='error'> Upload Image Failed!</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }

                        if($current_image !="")
                        {
                            $remove_path = "../images/food/".$current_image;
                            $remove = unlink($remove_path);
    
                            if($remove==FALSE)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove!</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
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

                $sql3 = " UPDATE fod_food SET
                title = '$title',
                description = '$description',
                active = '$active',
                image_title = '$image_title',
                price = '$price',
                category_id = '$category',
                featured = '$featured'
                WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==TRUE)
                {
                    $_SESSION['update'] = "<div class='success'> Update Successful!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'> Update Failed!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

            }             
        ?>
    </div>
</div>

<?php include('otherpart/footer.php'); ?>