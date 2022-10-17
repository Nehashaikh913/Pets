<?php include('./include/header.php') ?>
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">

                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Wishlist Area -->
		<div class="wishlist-area ptb-100">
            <div class="container">
                <form>
                    <div class="wishlist-table table-responsive">
                    <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Shop Now</th>
                </tr>
            </thead>
            <tbody><tr><td>
                        <a href="products-details.html">
                            <img src="https://m.media-amazon.com/images/W/WEBP_402378-T2/images/I/81rKy-rXrUL._AC_SX679_.jpg" alt="item">
                        </a>
                    </td>
                    <td> Dog Striped T-Shirt </td>
                    <td class="product-price">$255.00</td>
                    <td>
                    <button class="default-btn" id="addCartbtn1" title="Add to card" onclick="addTocart(this)" data-proid="9" data-proimg="https://m.media-amazon.com/images/W/WEBP_402378-T2/images/I/81rKy-rXrUL._AC_SX679_.jpg" data-name=" Dog Striped T-Shirt " data-category="wearables" data-price="255" data-qty="1" data-userid="634a4d2b13c4b" type="button">Add to Cart</button>
                    <button class="default-btn success-btn checkOutbtn1" id="checkOutbtn1" type="button"><a href="checkout.php"><span>Check Out</span></a></button>
                    </td>
                    <td><a href="javascript:void(0)" onclick="deleteWishlistproduct(9)" class="remove"><i class="bx bx-trash-alt"></i></a></td></tr> 
                </tbody>
            </table>

                    </div>
                </form>
            </div>
        </div>
		<!-- End Wishlist Area -->

        <?php include('./include/footer.php') ?>