<?php include('otherpart/menu.php') ?>

        <!-- Main content-->
        <div class="main-content">
            <div class="frame">
                <h1>Manage Food</h1>
                                <br /><br />
                <?php 

                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['failed-img']))
                    {
                        echo $_SESSION['failed-img'];
                        unset($_SESSION['failed-img']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['failed-remove']))
                    {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }

                ?>
                <br><br>
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                <br /><br />

                <table class="tbl-full">
                    <thead>
                    <tr>
                        <th>Seri.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php

                        $sql = "SELECT * FROM fod_food";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $stt=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_title = $row['image_title'];
                                $price = $row['price'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $stt++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php 

                                            if($image_title =="")
                                            {
                                                echo "<div class='error'> No Image Add</div>";
                                            }
                                            else
                                            {
                                                ?>

                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_title; ?>" width="200px">

                                                <?php
                                            }
                                    
                                        ?>
                                    </td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_title=<?php echo $image_title; ?>" class="btn-dangerous">Delete Food</a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='error'> No Food Added </td> </tr>";
                        }


                    ?>

                </table>
         
            </div>
        </div>

<?php include('otherpart/footer.php') ?>