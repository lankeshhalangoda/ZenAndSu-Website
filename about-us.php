<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | About Us</title>

    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .sticky-color--black {
            background-color: #2d2f3e;
        }
    </style>


</head>

<body>

    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>


    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-golden">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->

    <div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #000;">
        <div class="breadcrumb-wrapper p-6">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-10 mt-lg-0 pt-10">
                        <h3 class="breadcrumb-title text-white fw-bold"><b>About Us</b></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="active text-warning" aria-current="page">About Us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start About Top -->
    <div class="about-top">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between d-sm-column">
                <div class="col-md-6">
                    <div class="about-img" data-aos="fade-up" data-aos-delay="0">
                        <div class="img-responsive">
                            <img src="assets/images/about/about.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="title">About Zen & Su</h3>
                        <h5 class="semi-title">We are a leading herbal medicine store in Sri Jayawardhanapura Kotte,
                            now expanded all <br> over Sri Lanka through the newly introduced <br>online delivery.
                        </h5>

                        <p>#We bring you herbal creams, tablets, and facepacks etc. which are 100% natural.
                        </p>

                        <p> #Join with the best beauty care company in Sri Lanka!</p>
                        <p> #Shop with us.</p>
                        <p> #15x7 customer support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Top -->



    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-5.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FAST DELIVERY</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-6.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">05 DAYS MONEY BACK GUARANTEE</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 05 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-7.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SECURE PAYMENT</h6>
                                <p>Pay with the world’s most popular and safest payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-8.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">PRIVILEDGE CUSTOMER</h6>
                                <p>Become an priviledge customer and get awesome offers.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!--  Start  Team Section    -->
    <div class="team-section section-top-gap-100 secton-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content text-center">
                                <h3 class="section-title">Meet the founders</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section Content Text Area -->

        <div class="team-wrapper">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-12">


                        <div class="offset-4 col-xl-4 mb-5">
                            <div class="team-single" data-aos="fade-up" data-aos-delay="0">
                                <div class="team-img">
                                    <img class="img-fluid" src="assets/images/team/leader.jpg" alt="">
                                </div>
                                <div class="team-content">
                                    <h6 class="team-name font--bold mt-5">Mr. Senaka Jayawickrema <br> Mrs. Jinanee Alwis</h6>
                                    <span class="team-title">CO-FOUNDERS</span>
                                    <ul class="team-social pos-absolute">
                                        <li><a href="https://www.facebook.com/zenandsuholdings"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/in/zenandsu"><i class="ion-social-instagram"></i></a></li>
                                        <li><a href="https://www.twitter.com/lankelk"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="tel:+94705831038"><i class="ion-social-whatsapp"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--   End  Team Section   -->



    <?php
    require "company_logo.php";
    require "footer.php";
    ?>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Terms & Conditions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                1. Use of the Site

                <br>
The Site is provided to you free of charge for your personal use, subject to these Terms and Conditions. By using the Site you agree to be bound by these <b>Zen & Su</b> Terms and Conditions. These Terms and Conditions govern your use of the Site and all services provided in connection with these. All orders and purchases made on the Site will also be governed by the terms and conditions of 's Wardrobe Online (Pvt) and that of the Global payments relating to online payments.
<br>

<br>
THESE TERMS AND CONDITIONS DO NOT AFFECT YOUR STATUTORY RIGHTS.
<br>
<br>
2. Amendments
<br>
We may revise the terms and conditions from time to time without notice to you.
<br>
<br>

3. Registration
<br>
To register with <b>Zen & Su</b> you must be over eighteen years of age. You must ensure that the details provided by you on registration or at any time are correct and complete. You must inform us immediately of any changes to the information that you provided when registering by updating your personal details or you could do the same by using the My account section in the website.
<br>
<br>
4. Password and security
<br>

When you register to use the Site you will be asked to create a password. You must keep this password confidential and must not disclose it or share it with anyone. You will be responsible for all activities and orders that occur or are submitted under your password. If you know or suspect that someone else knows your password you should notify us by contacting Customer Services (see below for contact details) immediately. However, you could be held liable for losses incurred by <b>Zen & Su</b> Online (Pvt) Ltd or any other party due to someone else using your password. You may not use anyone else’s password at any time without the permission of the password holder.
If we have reason to believe that there is likely to be a breach of security or misuse of the Site, we may require you to change your password or we may suspend your account in accordance with paragraph 11 below.
<br>
<br>
5. Delivery
<br>
Our delivery service may also not be available on certain mercantile holidays in Sri Lanka, which holidays are decided at our discretion. Upon delivery of the goods, the person accepting the goods ordered must sign a copy of the invoice.
<br>
<br>
6. Intellectual property
<br>
The content of the Site is protected by copyright, trademarks, database and other intellectual property rights. You may retrieve and display the content of the Site on a computer screen, store such content in electronic form on disk (but not any server or other storage device connected to a network) or print one copy of such content for your own personal, non-commercial use, provided you keep intact all and any copyright and proprietary notices. You may not otherwise reproduce, modify, copy or distribute or use for commercial purposes any of the materials or content on the Site without our written permission.
<br>
<br>
No license is granted to you in these Terms and Conditions to use any of our trademark(s) or our affiliated companies including, without limitation, the trademarks <b>Zen & Su</b> Online (Pvt) Ltd
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <!-- material-scrolltop button -->
    <button style="left: 10px;" class="material-scrolltop bg-dark" type="button"></button>


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "101481332267271");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#exampleModalCenter').modal('show');
        });
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


</body>



</html>