<?php include('frontend-haf/head.php') ?>

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
                    <img src="images/burger.jpg" alt="" class="img-curve">
                </div>
                <p>Burger</p>
                <small>Price: 80$</small>
                <br>
                <a href="#">Remove</a>
            </td>
            <td><input type="number" name="qty" value="1" required></td>
            <td>28$</td>
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