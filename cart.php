<?php include('./include/header.php') ?>

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Cart</h1>
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Cart Area -->
<div class="cart-area ptb-100">
    <div class="container">
        <form>
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="cart.html" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="products-details.html">
                                    <img src="assets/img/products/products9.jpg" alt="item">
                                    <h3>Pet chair</h3>
                                </a>
                            </td>
                            <td>$199.00</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>$199.00</td>
                        </tr>
                        <tr>
                            <td><a href="cart.html" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="products-details.html">
                                    <img src="assets/img/products/products10.jpg" alt="item">
                                    <h3>Pink ceramic cat bowl</h3>
                                </a>
                            </td>
                            <td>$150.00</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>$150.00</td>
                        </tr>
                        <tr>
                            <td><a href="cart.html" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="products-details.html">
                                    <img src="assets/img/products/products12.jpg" alt="item">
                                    <h3>Pet carrier</h3>
                                </a>
                            </td>
                            <td>$200.00</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>$200.00</td>
                        </tr>
                        <tr>
                            <td><a href="cart.html" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="products-details.html">
                                    <img src="assets/img/products/products11.jpg" alt="item">
                                    <h3>Red dog bed</h3>
                                </a>
                            </td>
                            <td>$289.00</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>$289.00</td>
                        </tr>
                        <tr>
                            <td><a href="cart.html" class="remove"><i class='bx bx-trash'></i></a></td>
                            <td class="product-thumbnail">
                                <a href="products-details.html">
                                    <img src="assets/img/products/products4.jpg" alt="item">
                                    <h3>Dog toy collar</h3>
                                </a>
                            </td>
                            <td>$289.00</td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                            </td>
                            <td>$289.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-12 col-md-7">
                        <div class="shopping-coupon-code">
                            <input type="text" class="form-control" placeholder="Coupon code" name="coupon-code" id="coupon-code">
                            <button type="submit">Apply Coupon</button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-md-5 text-end">
                        <a href="cart.html" class="default-btn"><span>Update Cart</span></a>
                    </div>
                </div>
            </div>
            <div class="cart-totals">
                <ul>
                    <li>Subtotal <span>$800.00</span></li>
                    <li>Shipping <span>$30.00</span></li>
                    <li>Total <span>$830.00</span></li>
                </ul>
                <a href="checkout.html" class="default-btn"><span>Proceed to Checkout</span></a>
            </div>
        </form>
    </div>
</div>
<!-- End Cart Area -->
<?php include('./include/footer.php') ?>
