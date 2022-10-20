<?php include('./include/header.php') ?>
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">

                </div>
            </div>
        </div>
        <!-- End Page Title Area -->
        <!-- Start Contact Us Area -->
        <div class="contact-area pt-100 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="contact-form">
                            <h3>Get In Touch</h3>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" id="phone_number" required data-error="Please enter your phone number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Subject</label>
                                            <input type="text" name="msg_subject" class="form-control" id="msg_subject" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label>Message...</label>
                                            <textarea name="message" id="message" class="form-control" cols="30" rows="4" required data-error="Please enter your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="checkme">
                                            <label class="form-check-label" for="checkme">
                                                Accept <a href="terms-conditions.html">Terms of Services</a> and <a href="privacy-policy.html">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="default-btn"><span>Send Message</span></button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="contact-info">
                            <h3>Contact Information</h3>
                            <ul>
                                <li><span>Hotline:</span> <a href="tel:12855">12855</a></li>
                                <li><span>Email:</span> <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#6d05080101022d1d0c190204430e0200"><span class="__cf_email__" data-cfemail="3c54595050537c4c5d485355125f5351">[email&#160;protected]</span></a></li>
                                <li><span>Address:</span> 1523 Cook Hill Road New Haven, CT</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Us Area -->

    <?php include('./include/footer.php') ?>