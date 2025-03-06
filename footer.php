<footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.jpg">
                <div class="bg-title text-center">
                    <div class="footer-logo1"><a href="index.php"><img src="assets/img/logo-footer.svg"
                                alt="Restar"></a></div>
                </div>
                <div class="widget-area">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget footer-widget">
                                    <h3 class="widget_title">Get In Touch</h3>
                                    <div class="th-widget-contact">
                                        <div class="info-box">
                                            <h4 class="box-title">Address Location</h4>
                                            <div class="box-content">
                                                <div class="box-icon"><i class="fas fa-location-dot"></i></div>
                                                <p class="box-text">138 MacArthur Ave, USA</p>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <h4 class="box-title">Phone Number</h4>
                                            <div class="box-content">
                                                <div class="box-icon"><i class="fas fa-phone"></i></div>
                                                <p class="box-text"><a href="tel:+91 98405 86859">+91 98405 86859</a></p>
                                            </div>
                                        </div>
                                        <div class="info-box">
                                            <h4 class="box-title">Email address</h4>
                                            <div class="box-content">
                                                <div class="box-icon"><i class="fas fa-envelope"></i></div>
                                                <p class="box-text"><a href="mailto:merzcafe.foods@gmail.com">merzcafe.foods@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget widget_nav_menu footer-widget">
                                    <h3 class="widget_title">Quick Links</h3>
                                    <div class="menu-all-pages-container">
                                        <ul class="menu">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                            <li><a href="index.php">Menus</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget widget_nav_menu footer-widget">
                                    <h3 class="widget_title">Food Menu</h3>
                                    <div class="menu-all-pages-container">
                                        <ul class="menu">
                                        <li><a href="#" class="menu-link" data-category="Breakfast">Breakfast</a></li>
                                        <li><a href="#" class="menu-link" data-category="Lunch">Lunch</a></li>
                                        <li><a href="#" class="menu-link" data-category="Dinner">Dinner</a></li>
                                        <li><a href="#" class="menu-link" data-category="Desserts">Desserts</a></li>
                                        <li><a href="#" class="menu-link" data-category="Combo">Combo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-wrap">
                    <div class="container">
                        <div class="row gx-1 gy-2 align-items-center">
                            <div class="col-md-7">
                                <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 <a
                                        href="https://zenvicsoft.com" target="_blank">Zenvic Software Solutions Pvt Ltd</a>. All Rights Reserved.</p>
                            </div>
                            <div class="col-md-5 text-center text-md-end">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="terms.php">Terms & Condition</a></li>
                                        <li><a href="refund.php">Refund Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                 $(".menu-link").on("click", function (e) {
                    e.preventDefault(); // Prevent default link behavior

                    let category = $(this).data("category");

                    // Scroll to the menu section
                    $("html, body").animate(
                        {
                            scrollTop: $("#menu-section").offset().top - 100
                        },
                        200
                    );

                    // Trigger category button click
                    $(".category-btn[data-category='" + category + "']").click();
                });
            </script>
            
