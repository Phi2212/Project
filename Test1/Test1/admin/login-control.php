<?php

    if(!isset($_SESSION['user']))
    {
        $_SESSION['login-first'] = "<div class='error text-center'> Please login first to access</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
    else
    {

    }
?>