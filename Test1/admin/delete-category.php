<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_title']))
    {
        $id = $_GET['id'];
        $image_title = $_GET['image_title'];

        if($image_title !="")
        {
            $path = "../images/category/".$image_title;
            $remove = unlink($path);

            if($remove==FALSE)
            {
                $_SESSION['remove'] = "<div class='error'> Remove Image Failed!</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }

        $sql = "DELETE FROM fod_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='success'> Delete Successful</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'> Delete Failed</div>";
            header('location:'.SITEURL.'admin/manage-category.php'); 
        }

    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>