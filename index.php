<?php include('./include/header.php') ?>
<!-- Start Home Slides Area -->
<div class="home-slides owl-carousel owl-theme">
  <div class="banner-item bg1">
    <div class="container">
      <!-- <div class="banner-item-content"><span class="sub-title">Super Offer</span><h1>The Best Quality Organic Food</h1><div class="price">
                            Price Only
                            <span>$95.00</span></div><a href="shop-grid.html" class="default-btn"><span>Shop Now</span></a></div> -->
    </div>
  </div>
  <div class="banner-item bg2">
    <div class="container">
      <!-- <div class="banner-item-content"><span class="sub-title">New Arrivals</span><h1>Super Offer Pet Foods</h1><div class="price">
                            Price Only
                            <span>$70.00</span></div><a href="shop-grid.html" class="default-btn"><span>Shop Now</span></a></div> -->
    </div>
  </div>
  <div class="banner-item bg3">
    <div class="container">
      <!-- <div class="banner-item-content"><span class="sub-title">Super Offer</span><h1>Pet Toys Collection</h1><div class="price">
                            Price Only
                            <span>$30.00</span></div><a href="shop-grid.html" class="default-btn"><span>Shop Now</span></a></div> -->
    </div>
  </div>
</div>
<!-- End Home Slides Area -->
<!-- Start About Area -->
<div class="about-area pt-100 pb-75">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-12">
        <div class="about-image">
          <img src="assets/img/about/about1.jpg" alt="about-image">
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="about-content">
          <h2>About Patoi</h2>
          <p>We offer quality products at low prices every day. We have been in this business for almost 20 years. We have been doing online shopping very confiden tly. Our customers like and trust us so much because of the quality of our site's products.</p>
          <a href="shop-grid.html" class="default-btn">
            <span>Shop Now</span>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-12">
        <div class="about-image">
          <img src="assets/img/about/about2.jpg" alt="about-image">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End About Area -->
<!-- Start Categories Area -->
<div class="categories-area pb-75">
  <div class="container">
    <div class="section-title">
      <h2>Shop by Categories</h2>
    </div>
    <div class="categories-slides owl-carousel owl-theme"> <?php
                    $stmt = $conn->prepare("SELECT * FROM `categories` order by id desc");
                    $stmt->execute();
                    while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                        
                        $product_count=$conn->prepare("SELECT COUNT(*) FROM product WHERE category=?");
                        $product_count->execute([$user_data['cat_slug']]);
                        $pro_row_count = $product_count->fetchColumn();

                        if(!empty($user_data['img_id'])){
                            $img_id=$user_data['img_id'];
                        }else{
                            $img_id=1;
                        }

                        $images=$conn->prepare("SELECT * FROM images WHERE id=?");
                        $images->execute([$img_id]);
                        $row = $images->fetch(PDO::FETCH_ASSOC);

                       
                    ?> <div class="categories-box">
        <a href="shop-grid.php" class="d-block">
          <img src="pets-admin/
								
								
								<?php echo $row['path'] ?>" alt="categories-image">
          <h3> <?php echo $user_data['cat_name'] ?> </h3>
          <span> <?php echo $pro_row_count ?> items </span>
        </a>
      </div> <?php } ?> </div>
  </div>
</div>
<!-- End Categories Area -->
<!-- Start Products Area -->
<div class="products-area pb-75">
  <div class="container">
    <div class="section-title">
      <h2>New Arrivals</h2>
    </div>
    </div>
</div>                   
<!-- grid -->
<div class="grid-container owl-carousel" id="grid-section">
    <?php
    $i=1;
    $d_none="";
    $classname="";
    $stmt_pro = $conn->prepare("SELECT * FROM `product` order by id desc limit 5");
    $stmt_pro->execute();
    while($pro_data = $stmt_pro->fetch(PDO::FETCH_ASSOC)){
        if($i==2){
            $classname="offer-item";
            $d_none="d-none";
        }else{
            $classname="single-products-box";
            $d_none="d-block";
        }  
    ?>

   <div class="grid-item grid-item<?php echo $i ?>">
     <div class="<?php echo $classname ?>">
       <div class="image">
        <a href="#" class="d-block">
          <img src="<?php echo $pro_data['image'] ?>" alt="products-image">
        </a>
        <ul class="products-button <?php echo $d_none ?>">
          <li>
            <a href="cart.html">
              <i class='bx bx-cart-alt'></i>
            </a>
          </li>
          <li>
            <a href="wishlist.html">
              <i class='bx bx-heart'></i>
            </a>
          </li>
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
              <i class='bx bx-show'></i>
            </a>
          </li>
          <li>
            <a href="products-details.html">
              <i class='bx bx-link-alt'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="content">
        <h3>
          <a href="products-details.html"><?php echo $pro_data['name'] ?></a>
        </h3>
        <div class="price">
          <span class="new-price">$<?php echo $pro_data['price'] ?>.00</span>
        </div>
        <div class="rating">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
        <?php if($i==2){ ?>
            <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor.</p>
      <h3>Place an order now</h3>
      <span class="discount">Enjoy 30% OFF</span>
      <div class="counter-class" data-date="2022-12-24 24:00:00">
        <div>
          <span class="counter-days"></span> Days
        </div>
        <div>
          <span class="counter-hours"></span> Hours
        </div>
        <div>
          <span class="counter-minutes"></span> Minutes
        </div>
        <div>
          <span class="counter-seconds"></span> Seconds
        </div>
      </div>
      <a href="shop-grid.html" class="default-btn">
        <span>Shop Now</span>
      </a>
      <?php } ?>  
      
      </div>
    </div>
 </div>
       <?php $i++; } ?> 
</div>
<!-- grid -->
<!-- Start Offer Area -->
<div class="offer-area pb-75">
  <div class="container">
    <div class="single-offer-box">
      <a href="shop-grid.html" class="d-block">
        <img src="assets/img/banner/CTA BANNER.WEBP" alt="offer-image">
      </a>
    </div>
  </div>
</div>
<!-- End Offer Area -->
<!-- Start Products Area -->
<div class="products-area pb-75">
  <div class="container">
    <div class="section-title">
      <h2>Best Sellers</h2>
    </div>
    <div class="products-slides owl-carousel owl-theme"> <?php
                        $stmt_pro = $conn->prepare("SELECT * FROM `product` order by id asc limit 10");
                        $stmt_pro->execute();
                        while($pro_data = $stmt_pro->fetch(PDO::FETCH_ASSOC)){
                            ?> <div class="single-products-box">
        <div class="image">
          <a href="#" class="d-block">
            <img src="
															
																			
																			<?php echo $pro_data['image'] ?>" alt="products-image">
          </a>
          <ul class="products-button">
            <li>
              <a href="cart.html">
                <i class='bx bx-cart-alt'></i>
              </a>
            </li>
            <li>
              <a href="wishlist.html">
                <i class='bx bx-heart'></i>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" data-pro_id="
																	
																					
																					<?php echo $pro_data['id'] ?>" onclick="product_popup(this)">
                <i class='bx bx-show'></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="content">
          <h3>
            <a href="products-details.html"> <?php echo $pro_data['name'] ?> </a>
          </h3>
          <div class="price">
            <span class="new-price">$ <?php echo $pro_data['price'] ?>.00 </span>
          </div>
          <div class="rating">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
          </div>
        </div>
      </div> <?php } ?> </div>
  </div>
</div>
<!-- End Products Area -->
<!-- Start Facility Area -->
<div class="facility-area pb-75">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="facility-box">
          <img src="assets/img/icon/GIFT.svg" width="100" alt="icon">
          <h3>Best collection</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="facility-box bg-fed3d1">
          <img src="assets/img/icon/FAST DELIVERY.svg" width="100" alt="icon">
          <h3>Fast delivery</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="facility-box bg-a9d4d9">
          <img src="assets/img/icon/24-7 CUSTOMER SUPPORT.svg" width="100" alt="icon">
          <h3>24/7 customer support</h3>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-6">
        <div class="facility-box bg-fef2d1">
          <img src="assets/img/icon/SECURE PAYMENT.svg" width="100" alt="icon">
          <h3>Secured payment</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Facility Area --> <?php include('./include/footer.php') ?>