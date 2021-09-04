<?php 

    include('../config/constants.php');

    echo $id = $_GET['id'];

    $sql = "DELETE FROM fod_staff WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        //test function delete
        //echo "admin Deleted";
        $_SESSION['delete'] = "<div class=success>Delete Successfully!</div>";
        header('location:'.SITEURL.'admin/manage-staff.php');
    }
    else
    {
        //echo "Fail";
        $_SESSION['delete'] = "<div class=error>Delete Failed! Try again!</div>";
        header('location:'.SITEURL.'admin/manage-staff.php');
    }


?>