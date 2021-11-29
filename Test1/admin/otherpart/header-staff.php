<?php   
    ob_start();
    include('../config/constants.php'); 
    include('login-control.php');

?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Food Order Web</title>
       <link rel="stylesheet" href="../css/admin.css">
       <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
       <link rel="stylesheet" href="../css/grid.css">
    </head>
    <body>
        <!-- Menu -->
        <div class="sidebar">
            <div class="logo-content">
                <div class="logo">
                    <i class='bx bx-store-alt' ></i>
                    <div class="logo_name">FFPanel</div>
                </div>
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="index.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">HomePage</span>
                    </a>
                    <span class="tooltip">HomePage</span>
                </li>
                <li>
                    <a href="manage-category.php">
                    <i class='bx bx-category-alt' ></i>
                    <span class="link_name">Category</span>
                    </a>
                    <span class="tooltip">Category</span>
                </li>
                <li>
                    <a href="manage-food.php">
                    <i class='bx bxs-pizza' ></i>
                    <span class="link_name">Food</span>
                    </a>
                    <span class="tooltip">Food</span>
                </li>
                <li>
                    <a href="send-mail.php">
                    <i class='bx bx-mail-send'></i>
                    <span class="link_name">SendMail</span>
                    </a>
                    <span class="tooltip">SendMail</span>
                </li>
            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-detail">
                        <div class="name-job">
                            <div class="name"><?php echo $_SESSION['user']; ?></div>
                        </div>
                    </div>
                    <a href="logout.php">
                    <i class='bx bx-log-out' id="log-out" ></i>
                    </a>
                </div>
            </div>
        </div>