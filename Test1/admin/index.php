<?php   
    ob_start();
    include('../config/constants.php'); 
    include('login-control.php');

?>
<?php if(isset($_SESSION['permission']) && $_SESSION['permission']==0){ ?>
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
                    <span class="link_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="manage-admin.php">
                    <i class='bx bxs-user-circle' ></i>
                    <span class="link_name">Admin</span>
                    </a>
                    <span class="tooltip">Admin</span>
                </li>
                <li>
                    <a href="manage-guest.php">
                    <i class='bx bx-user' ></i>
                    <span class="link_name">Customer</span>
                    </a>
                    <span class="tooltip">Customer</span>
                </li>
                <li>
                    <a href="manage-contact.php">
                    <i class='bx bxs-book-bookmark'></i>
                    <span class="link_name">Contact</span>
                    </a>
                    <span class="tooltip">Contact</span>
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

            <!-- Main content-->
            <div class="main-content">
            <div class="main-header">
                <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
                </div>
                <div class="main-title">
                    Dashboard 
                </div>
                <div class="clearfix"></div>

            </div>
            <div class="main-info">
                <div class="row">
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <div class="counter">
                                <div class="counter-title">
                                    Total Order
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                        <?php
                                        $sql = "SELECT * FROM fod_order";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        ?>
                                        <?php echo $count; ?>
                                    </div>
                                    <i class='bx bx-shopping-bag'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <div class="counter">
                                <div class="counter-title">
                                    Total Customer
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                    <?php
                                        $sql2 = "SELECT * FROM fod_guest";
                                        $res2 = mysqli_query($conn, $sql2);
                                        $count2 = mysqli_num_rows($res2);
                                        ?>
                                        <?php echo $count2; ?>
                                    </div>
                                    <i class='bx bx-user' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <div class="counter">
                                <div class="counter-title">
                                    Total Money
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                    <?php
                                        $sql3 = "SELECT SUM(total) AS Total FROM fod_order";
                                        $res3 = mysqli_query($conn, $sql3);
                                        $row3 = mysqli_fetch_assoc($res3);
                                        $total_money = $row3['Total'];
                                        ?>
                                        <?php echo $total_money; ?>
                                    </div>
                                    <i class='bx bx-dollar'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="box box-hover">
                            <div class="counter">
                                <div class="counter-title">
                                    Total Food
                                </div>
                                <div class="counter-info">
                                    <div class="counter-count">
                                    <?php
                                        $sql4 = "SELECT * FROM fod_food";
                                        $res4 = mysqli_query($conn, $sql4);
                                        $count4 = mysqli_num_rows($res4);
                                        ?>
                                        <?php echo $count4; ?>
                                    </div>
                                    <i class='bx bx-coffee-togo' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="box f-height">
                            <div class="box-header">
                                Top Food
                            </div>
                            <div class="box-body">
                                <ul class="food-list">
                                    <li class="food-list-item">
                                    <?php
                                        $sql5 = "SELECT * FROM fod_food LIMIT 4";
                                        $res5 = mysqli_query($conn, $sql5);
                                        $row5 = mysqli_fetch_assoc($res5);
                                        $name = $row5['title'];
                                        $price = $row5['price'];
                                        $image = $row5['image_title'];
                                        ?>
                                        <div class="item-info">
                                        <?php 
                                        if($image!="")
                                        {
                                            ?>

                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image; ?>">

                                            <?php
                                        }   
                                        else
                                        {
                                            echo "<div class='error'> Image not found</div>";
                                        }                             
                                    ?>
                                            <div class="item-name">

                                                <div class="food-name"> <?php echo $name; ?></div>
                                                <div class="text-second">Food</div>
                                            </div>
                                        </div>
                                        <div class="item-status-info">
                                            <div class="text-second">Price</div>
                                            <div class="item-price"> <?php echo $price; ?>$</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-6 col-sm-12">
                        <div class="box f-height">
                            <div class="box-body">
                                <div id="category-chart">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 col-md-12 col-sm-12">
                        <div class="box f-height">
                            <div class="box-header">
                                Order
                            </div>
                            <div class="box-body">
                                <div id="revenue-chart">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                Recent Order
                            </div>
                            <div class="box-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>
                                                <div class="order-owner">
                                                    <span>Phi</span>
                                                </div>

                                            </td>
                                            <td>
                                                <span class="order-status order-ready">
                                                    Ready
                                                </span>
                                            </td>
                                            <td>Phi</td>
                                            <td>123</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('otherpart/footer.php') ?>
<?php  
    } if($_SESSION['permission'] == 1) {   
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
        <div class="main-content">
    <p>Welcome Warehouse Manager</p>
    </div>
    <?php include('otherpart/footer.php') ?>
    <?php } if($_SESSION['permission'] == 2 ) {?>

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
                    <a href="manage-order.php">
                    <i class='bx bx-cart-alt' ></i>
                    <span class="link_name">Order</span>
                    </a>
                    <span class="tooltip">Order</span>
                </li>
                <li>
                    <a href="send-mail2.php">
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
        <div class="main-content">
    <p>Welcome Order Manager</p>
    </div>
    <?php include('otherpart/footer.php') ?>
    <?php } ?>