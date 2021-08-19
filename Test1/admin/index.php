<?php include('otherpart/menu.php'); ?>

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
                                        123
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
                                        123
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
                                        123
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
                                        123
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
                                        <div class="item-info">
                                            <img src="../images/food/Food_pic_8797.jpg" alt="Food image">
                                            <div class="item-name">
                                                <div class="food-name">Steak</div>
                                                <div class="text-second">Food</div>
                                            </div>
                                        </div>
                                        <div class="item-status-info">
                                            <div class="text-second">Price</div>
                                            <div class="item-price">18$</div>
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
                            <div class="box-body overflow-scroll">
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
