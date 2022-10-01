<?php include('pets-admin/include/config.php'); ?>
<!doctype html>
<html lang="eng">
<head>
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
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="search-box">
                            <form>
                                <input type="text" class="input-search" placeholder="Enter your keywords...">
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
                            <a href="index-4.html"><img src="assets/img/logo/LOGO.svg" width="170" height="60"></img></a>
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
                                <li class="nav-item"><a href="index.php" class="nav-link">About</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-toggle nav-link">Shop By Category</a>
                                    <ul class="dropdown-menu">
                                        <?php
                                          $stmt = $conn->prepare("SELECT * FROM `categories`");
                                          $stmt->execute();
                                          while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <li class="nav-item"><a href="shop-grid.php" class="nav-link"><?php echo $user_data['cat_name'] ?></a></li>
                                         <?php } ?>   
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                            </ul>
                            <div class="others-option">
                                <div class="d-flex align-items-center">
                                    <ul>
                                        <li><a href="user.php"><i class='bx bx-user-circle'></i></a></li>
                                        <li><span>1</span><a href="wishlist.php"><i class='bx bx-heart'></i></a></li>
                                        <li class="position-relative"><span>1</span><a href="cart.php"><i class='bx bx-cart'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
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
                                    <li>
                                        <select class="form-select">
                                            <option selected>English</option>
                                            <option value="1">Spanish</option>
                                            <option value="2">Chinese</option>
                                        </select>
                                    </li>
                                    <li><a href="profile-authentication.html"><i class='bx bx-user-circle'></i></a></li>
                                    <li><a href="cart.html"><i class="fa-regular fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class='bx bx-cart'></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->