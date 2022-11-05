<?php
session_start();
include('pets-admin/include/config.php');
$cookie_name = "userid";
if (!isset($_COOKIE[$cookie_name])) {
    $userid = uniqid();
    setcookie($cookie_name, $userid, time() + 3600, '/'); // 86400 = 1 day
    echo "<script>location.reload()</script>";
} else {
    setcookie($cookie_name, $_COOKIE['userid'], time() + 3600, '/'); // 86400 = 1 day
}

$stmt = $conn->prepare("SELECT name,slug FROM `product`");
$stmt->execute();
while ($pro_data = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    file_put_contents('product.js', json_encode($pro_data));
}
?>
<!doctype html>
<html lang="eng">

<head>
    <base href="http://localhost/Pets/">
    <!-- <base href="http://192.168.2.134/Pets/"> -->
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

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="patoi-responsive-nav">
            <div class="container">
                <div class="patoi-responsive-menu">
                    <div class="logo">
                        <a href="index.php"><img class="logoimg" src="assets/img/logo/LOGO.svg"></img></a>
                    </div>
                    <div class="quick-links">
                        <ul class="gap-4 mobile-quick-links-ul">
                            <li><a href="">Home</a></li>
                            <li><a href="">About</a></li>
                            <li class="position-relative" id="categoryBtn"><a>Category</a>
                        <div class="category-wrapper" id="category-wrapper">
                            <div class="category-list">search result</div>
                            <div class="category-list">search result</div>
                            <div class="category-list">search result</div>
                            <div class="category-list">search result</div>
                        </div>
                        </li>
                            <li><a href="">contact</a></li>
                        </ul>
                    </div>
                    <span></span>
                    <div class="others-option">
                        <ul>
                            <li><a href="profile-authentication.html"><i class='bx bx-user-circle'></i></a></li>
                            <li><a href="cart.html"><i class="fa-regular fa-heart"></i></a></li>
                            <li><a href="cart.html"><i class='bx bx-cart'></i></a></li>
                            <li class="mobile-search-btn"><i class="bx bx-search"></i></li>
                            <li class="menu-btn d-block d-md-none"><i class="bx bx-menu"></i></li>
                            <input class="mobile-search-input" placeholder="Search for brands & products" />
                        </ul>
                        <ul class="search-list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->