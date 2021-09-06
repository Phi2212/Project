<?php include('frontend-haf/head.php') ?>
<?php

    if(isset($_GET['food_id']))
    {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM fod_food WHERE id=$food_id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_title = $row['image_title'];


        }
        else
        {
            header('location:'.SITEURL.'cart.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'cart.php');
    }
?>

<div class="cart-page container">
    <table>
        <tr>
            <th>Food</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
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
                <p><?php echo $title; ?></p>
                <small> <?php echo $price; ?>$</small>
                <br>
                <a href="#">Remove</a>
            </td>
            <td><input type="number" name="qty" min="1" max="10" value="1" required></td>
            <td><?php $subtotal = $qty * $price  ?>$</td>
        </tr>
    </table>
    <div class="total-price">
        <table>
            <tr>
                <td>Total</td>
                <td>30$</td>
            </tr>
        </table>
    </div>
</div>

<?php include('frontend-haf/footer.php') ?>