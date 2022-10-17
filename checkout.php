<?php
$userid = $_COOKIE['userid'];
include('pets-admin/include/config.php');
include('./include/header.php'); ?>
     <!-- Start Checkout Area -->
     <div class="checkout-area ptb-100">
            <div class="container">
                <form id="checkoutForm">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3><span>Billing details</span></h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>First name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>Last name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="lname">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>Email <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>Phone <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <textarea name="address" class="form-control" id="" cols="10" name="address" rows="3"></textarea>
									    </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>City <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>Postcode <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="pincode">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>State <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="state">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
										    <label>Country<span class="required">*</span></label>
                                            <input id="country_selector" type="text" name="country">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3><span>Your Order</span></h3>
                                <div class="order-details">
                                <div class="order-table table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php
                                             $cartTotal=0;
                                             $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=? AND status='cart'");
                                             $stmt->execute([$userid]);
                                             while($cart_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                $cartTotal = $cartTotal + ($cart_data["sub_total"] * $cart_data["pro_qty"]);
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $cart_data['pro_name'] ?></td>
                                                <td class="product-total">
                                                    <span class="subtotal-amount">$<?php echo $cart_data['pro_price'] ?>.00</span>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td class="order-subtotal"><span>Cart Subtotal</span></td>
                                                <td class="order-subtotal-price">
                                                    <span class="order-subtotal-amount">$<?php echo $cartTotal ?>.50</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="order-shipping"><span>Shipping</span></td>
                                                <td class="shipping-price">
                                                    <span>$30.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="total-price"><span>Order Total</span></td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$<?php echo $cartTotal+30 ?>.00</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="payment-box">
                                    <div class="payment-method">
                                        <p>
                                            <input type="radio" id="direct-bank-transfer" name="payment" value="direct bank transfer">
                                            <label for="direct-bank-transfer">Direct bank transfer</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="check-payments" name="payment" value="check payment">
                                            <label for="check-payments">Check payments</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="cash-on-delivery" name="payment" value="cod" checked>
                                            <label for="cash-on-delivery">Cash on delivery</label>
                                        </p>
                                        <input type="hidden" name="btn" value="checkout_details"/>
                                    </div>
                                    <button type="submit" class="default-btn"><span>Place Order</span></button>
                                </div>
                            </div>
                                
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
		<!-- End Checkout Area -->
        <?php
        include('./include/footer.php')
        ?>