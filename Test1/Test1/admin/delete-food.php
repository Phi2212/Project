<?php 
    //echo "ok";

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_title']))
    {
        $id = $_GET['id'];
        $image_title = $_GET['image_title'];

        if($image_title !="")
        {
            $path = "../images/food/".$image_title;

            $remove = unlink($path);

            if($remove==FALSE)
            {
                $_SESSION['upload'] = "<div class='error'> Remove Image Failed</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
            
            $sql = "DELETE FROM fod_food WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $_SESSION['delete'] = "<div class='success'>Delete Successful!</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else
            {
                $_SESSION['delete'] = "<div class='error'>Delete Failed! Try again!</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
        }
    }
    else
    {
        $_SESSION['failed-img'] = "<div class='error'>Failed</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }


?>