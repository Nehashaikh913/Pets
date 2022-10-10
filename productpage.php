<?php
include('pets-admin/include/config.php');
$slug = $_GET['pro_name'];
$product = $conn->prepare('SELECT * FROM product WHERE slug=?');
$product->execute([$slug]);
$proCount = $product->rowCount();

if ($proCount > 0) {

    $page = "post";
    while ($row = $product->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $name = $row['name'];
        $desc = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
        $category = $row['category'];
      }
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<?php include('./include/header.php') ?>
        <!-- Start Products Details Area -->
        <div class="products-details-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="products-details-thumbs-image">
                            <ul class="products-details-thumbs-image-slides">
                                <li><img src="<?php echo $image ?>" alt="<?php echo $image ?>"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="products-details-desc">
                            <h3><?php echo $name ?></h3>
                            <div class="price">
                                <span class="new-price">$<?php echo $price ?>.00</span>
                                <span class="old-price">$55.00</span>
                            </div>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <p><?php echo $desc ?></p>
                            <div class="products-add-to-cart">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                                <button class="default-btn addCartbtn"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add to card" onclick="addTocart(this)" data-proid="<?php echo $id ?>" data-proimg="<?php echo $image ?>" data-name="<?php echo $name ?>" data-category=<?php echo $category ?> data-price="<?php echo $price ?>" data-qty="<?php echo 1 ?>" data-userid="<?php echo $_COOKIE[$cookie_name]; ?>"><span>Add to Cart</span></a></button>
                                <button type="submit" class="default-btn success-btn checkOutbtn"><a href="checkout.php"><span>Check Out</span></a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <p><?php echo $desc ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Products Details Area -->

        <?php include('./include/footer.php');
        
    }else{
        echo "not found";
        }

        ?>