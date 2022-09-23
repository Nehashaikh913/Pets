<?php include('./include/header.php') ?>

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>My Account</h1>
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Profile Authentication Area -->
        <div class="profile-authentication-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="login-form">
                            <h2>Login</h2>
                            <form>
                                <div class="form-group">
                                    <label>Username or email</label>
                                    <input type="text" class="form-control" placeholder="Username or email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 remember-me-wrap">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me">
                                            <label class="form-check-label" for="remember-me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 lost-your-password-wrap">
                                        <a href="#" class="lost-your-password">Lost your password?</a>
                                    </div>
                                </div>
                                <button type="submit">Log In</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="register-form">
                            <h2>Register</h2>
                            <form>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
                                <button type="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Profile Authentication Area -->

        <?php include('./include/footer.php') ?>