<?php
session_start();
include('pets-admin/include/config.php');
$cookie_name="userid";
if(!isset($_COOKIE[$cookie_name])) {
    $userid = uniqid();
    setcookie($cookie_name, $userid, time()+3600, '/'); // 86400 = 1 day
    echo "<script>location.reload()</script>";
}else{
    setcookie($cookie_name, $_COOKIE['userid'], time()+3600, '/'); // 86400 = 1 day
}
?>
<!doctype html>
<html lang="eng">
<head>
        <!-- <base href="http://localhost/Pets/"> -->
        <base href="http://192.168.2.132/Pets/">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link of CSS files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/rangeSlider.min.css">
        <link rel="stylesheet" href="assets/css/odometer.min.css">
        <link rel="stylesheet" href="assets/css/boxicons.min.css">
        <link rel="stylesheet" href="assets/css/slick.min.css">
        <link rel="stylesheet" href="assets/css/countrySelect.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <title>Doggtasticadvemtures</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    </head>
    <body>
        <!-- Start Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <p>FREE 5 days shipping over $99</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 d-none d-lg-block">
                        <div class="search-box">
                            <form>
                                <input type="text" value="<?php echo $_COOKIE['userid']; ?>" class="input-search" placeholder="Enter your keywords...">
                                <button type="submit"><i class='bx bx-search'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Header Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="patoi-responsive-nav">
                <div class="container">
                    <div class="patoi-responsive-menu">
                        <div class="logo">
                            <a href="index.php"><img class="logoimg" src="assets/img/logo/LOGO.svg"></img></a>
                        </div>
                        <div class="others-option">
                                <ul>
                                    <li><a href="profile-authentication.html"><i class='bx bx-user-circle'></i></a></li>
                                    <li><a href="cart.html"><i class="fa-regular fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class='bx bx-cart'></i></a></li>
                                    <li  class="mobile-search-btn"><i class="bx bx-search"></i></li>
                                    <input class="mobile-search-input" placeholder="Search for brands & products" />
                                </ul>
                                <ul class="search-list">
                                    <li><a href="">Hello World</a></li>
                                    <li><a href="">Hello World</a></li>
                                    <li><a href="">Hello World</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="patoi-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.php"><img src="assets/img/logo/LOGO.svg" width="170" height="70"></img></a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a>
                                </li>
                                <li class="nav-item"><a href="about.php" class="nav-link">About</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-toggle nav-link">Shop By Category</a>
                                    <ul class="dropdown-menu">
                                        <?php
                                          $stmt = $conn->prepare("SELECT * FROM `categories`");
                                          $stmt->execute();
                                          while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <li class="nav-item"><a href="category/<?php echo $user_data['cat_slug'] ?>" class="nav-link"><?php echo $user_data['cat_name'] ?></a></li>
                                         <?php } ?>   
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                            </ul>
                            <div class="others-option">
                                <div class="d-flex align-items-center">
                                    <ul>
                                    <?php 
                                    $product = $conn->prepare("SELECT count(*) FROM `cart` where userid=? AND status='cart'");
                                    $product->execute([$_COOKIE[$cookie_name]]);
                                    $product_row = $product->fetchColumn();

                                    $product_wish = $conn->prepare("SELECT count(*) FROM `cart` where userid=? AND status=?");
                                    $product_wish->execute([$_COOKIE[$cookie_name],'wishlist']);
                                    $product_row_wish = $product_wish->fetchColumn();
                                    ?>
                                        <li>
            <div class="dropdown">
                <a href="user.php" id="dropdownMenuButton2" data-bs-toggle="dropdown"><i class='bx bx-user-circle'></i><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }else{ echo "login"; }?></a>
                <ul class="dropdown-menu dropdown-menu-dark login-drop" aria-labelledby="dropdownMenuButton2">
                <?php if(isset($_SESSION['user_name'])){ ?>
                    <li><a class="dropdown-item active" href="order_detail.php">Order Detail</a></li>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>   
                <?php }else{ ?>
                    <li><a class="dropdown-item" href="user.php">Login</a></li>
                    <li><a class="dropdown-item" href="user.php">Register</a></li>
                <?php } ?>

                </ul>
            </div>
    </li>
    <?php if(isset($_SESSION['user_name'])){?>                                     
    <li><span id="total_wish_count"><?php echo $product_row_wish ?></span><a href="wishlist.php"><i class='bx bx-heart'></i></a></li>    
    <?php }else{ ?>
        <li><span id="total_wish_count"></span><a href="user.php"><i class='bx bx-heart'></i></a></li>
   <?php } ?>  
   <li class="position-relative"><span id="total_product_count"><?php echo $product_row ?></span><a href="cart.php"><i class='bx bx-cart'></i></a></li>                               
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                             <div class="others-option">
                                <ul>
                                    <li><a href="profile-authentication.html"><i class='bx bx-user-circle'></i></a></li>
                                    <li><a href="cart.html"><i class="fa-regular fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class='bx bx-cart'></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- End Navbar Area -->