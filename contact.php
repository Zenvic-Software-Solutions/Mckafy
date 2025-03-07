<!doctype html>
<html class="no-js" lang="zxx">

<?php include "head.php"?>

<body>
    <div class="has-smooth" id="has_smooth"></div>
    <div class="preloader"><button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div class="loader"><span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            </div>
        </div>
    </div>

    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="index.php"><img src="assets/img/logo.svg"
                        alt="Restar"></a></div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include "header.php"?>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
                <div class="container">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Contact Us</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.php">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space">
                <div class="container">
                    <div class="row gx-0 gy-40">
                        <div class="col-xl-5">
                            <div class="contact-feature-area">
                                <div class="title-area mb-32">
                                    <h2 class="sec-title title-ani2">Contact Information</h2>
                                    <div class="text-ani">
                                        <p class="sec-text">Have a question, feedback, or just want to say hello? Our team is here to help! Reach out to us using the details below, and we'll get back to you as soon as possible.</p>
                                    </div>
                                </div>
                                <div class="contact-feature-wrap">
                                    <div class="contact-feature">
                                        <div class="box-icon"><i class="fal fa-location-dot"></i></div>
                                        <div class="media-body">
                                            <h3 class="box-title text-ani">Location</h3>
                                            <p class="box-text text-ani">No 21, Kurinji Nagar Cross, KK Nagar, New Perungalathur, Chennai 600063</p>
                                        </div>
                                    </div>
                                    <div class="contact-feature">
                                        <div class="box-icon"><i class="fal fa-envelope"></i></div>
                                        <div class="media-body">
                                            <h3 class="box-title text-ani">Email Address</h3>
                                            <p class="box-text text-ani"><a
                                                    href="mailto:merzcafe.foods@gmail.com">merzcafe.foods@gmail.com</a></p>
                                        </div>
                                    </div>
                                    <div class="contact-feature">
                                        <div class="box-icon"><i class="fal fa-phone"></i></div>
                                        <div class="media-body">
                                            <h3 class="box-title text-ani">Contact Number</h3>
                                            <p class="box-text text-ani"><a href="tel:+91 98405 86859">+91 98405 86859</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="th-social text-ani"><a href="#"><i
                                            class="fab fa-facebook-f"></i></a> <a href="#"><i
                                            class="fab fa-twitter"></i></a> <a href="#"><i
                                            class="fab fa-instagram"></i></a> <a href="#"><i
                                            class="fab fa-linkedin-in"></i></a> <a href="#"><i
                                            class="fab fa-whatsapp"></i></a></div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <form action="https://html.themeholy.com/restar/demo/mail.php" method="POST"
                                class="contact-form ajax-contact">
                                <h2 class="sec-title title-ani2">Get In Touch</h2>
                                <div class="row">
                                    <div class="form-group col-sm-6"><input type="text" class="form-control" name="name"
                                            id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                                    <div class="form-group col-sm-6"><input type="email" class="form-control"
                                            name="email" id="email" placeholder="Email Address"> <i
                                            class="fal fa-envelope"></i></div>
                                    <div class="form-group col-12"><input type="tel" class="form-control" name="number"
                                            id="number" placeholder="Phone Number"> <i class="fal fa-phone"></i></div>
                                    <div class="form-group col-12"><select name="subject" id="subject"
                                            class="form-select">
                                            <option value="" disabled="disabled" selected="selected" hidden>Select
                                                Subject</option>
                                            <option value="General Query">General Query</option>
                                            <option value="Help Support">Help Support</option>
                                            <option value="Sales Support">Sales Support</option>
                                        </select> <i class="fal fa-chevron-down"></i></div>
                                    <div class="form-group col-12"><textarea name="message" id="message" cols="30"
                                            rows="3" class="form-control"
                                            placeholder="Type Appointment Note...."></textarea> <i
                                            class="fal fa-pencil"></i></div>
                                    <div class="form-btn col-12"><button class="th-btn w-100">Send Message Now</button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="">
                <div class="contact-map"><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuztheme!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd"
                        allowfullscreen="" loading="lazy"></iframe></div>
            </div>
            <?php include "footer.php"?>
        </div>
    </div>
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg></div>
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>