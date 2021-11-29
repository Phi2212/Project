<?php include('frontend-haf/head.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            
            $search = $_POST['search'];

            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

               

                $sql = "SELECT * FROM fod_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count =mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_title = $row['image_title'];
                        ?>
                        <form method="post" action="food-search.php?action=add&id=<?php echo $id; ?>">
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_title=="")
                                    {
                                        echo "No Image Found";  
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_title; ?>" class="img-responsive img-curve">
                                        <?php
                                    }

                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price ?></p>
                                <p class="food-detail">
                                   <?php echo $description; ?>
                                </p>
                                <input type="number" name="quantity" class="input-responsive" value="1" min="1" max="10" require>
                                <input type="hidden" name="hidden_image" value="<?php echo $image_title; ?>">
                                <input type="hidden" name="hidden_title" value="<?php echo $title; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $price; ?>">
                                <input type="submit" name="add_to_cart" class="btn" value="Add to Cart" />
                            </div>
                        </div>
                        </form>
                        <?php
                    }
                }
                else
                {
                    echo "No food found";
                }

            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('frontend-haf/footer.php') ?>