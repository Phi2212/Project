<?php include('frontend-haf/head.php') ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            
                $sql = "SELECT * FROM fod_category WHERE active='Yes' ";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_title = $row['image_title'];

                        ?>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php

                                if($image_title=="")
                                {
                                    echo "No Image";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_title; ?>" width="700" height="400" class="img-responsive img-curve">
                                    <?php
                                }

                            ?>
                            
            
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                        </a>                         

                        <?php
                    }
                }
                else
                {
                  echo "No Category Found";  
                }
            
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('frontend-haf/footer.php') ?>