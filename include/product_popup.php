<?php include('pets-admin/include/config.php'); ?>
<?php 
    $pro_id = $_POST['pro_id'];
    $stmt = $conn->prepare("SELECT * FROM `product` WHERE id=?");
    $stmt->execute([$pro_id]);
    while($pro_data = $stmt->fetch(PDO::FETCH_ASSOC)){
        $image=$pro_data['image'];
        $name=$pro_data['name'];
        $decription=$pro_data['description'];
        $price=$pro_data['price'];
        }
?>
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="image">
                                    <img src="<?php echo $image ?>" alt="image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="content">
                                    <h3><a href="products-details.html"><?php echo $name ?></a></h3>
                                    <div class="price">
                                        <span class="new-price">$<?php echo $price ?>.00</span>
                                        <span class="old-price">$200.00</span>
                                    </div>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <p><?php echo $decription ?></p>
                                    <div class="products-add-to-cart">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" value="1">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                        <button type="submit" class="default-btn"><span>Add to Cart</span></button>
                                    </div>
                                    <a href="wishlist.html" class="add-to-wishlist"><i class='bx bx-heart'></i> Add to wishlist</a>
                                </div>
                            </div>
                        </div>