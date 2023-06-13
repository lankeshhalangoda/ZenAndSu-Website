<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html lang="eng">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | Contact Us</title>

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
                        <h3 class="breadcrumb-title text-white fw-bold"><b>Contact Us</b></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                    <li class="active text-warning" aria-current="page">Contact Us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Breadcrumb Section:::... -->


    <!-- ...::::Start Contact Section:::... -->
    <div class="contact-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <!-- Start Contact Details -->
                    <div class="contact-details-wrapper" data-aos="fade-up" data-aos-delay="0">
                        <div class="contact-details">
                            <h1 class="mb-3">Stay In Touch</h1>
                            <p class="mb-3">We’re here to help and answer any question you have.
                                We look forward to hear from you.</p>
                            <h5 class="mb-3"><b>SHOP ADDRESS</b></h5>


                            <div class="contact-details-single-item ">
                                <div class="contact-details-icon bg-dark">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <p class="mt-1">286 Mandala Pl, Nugegoda</p>
                                </div>
                            </div>

                            <h5 class="mb-3"><b>CONTACT INFORMATION</b></h5>
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item ">
                                <div class="contact-details-icon bg-dark">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <a href="tel:+94117896655">
                                        +94117896655</a>
                                </div>
                            </div>
                            <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon bg-dark">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <a href="mailto:lankeshhalangoda@gmail.com">yash@zenandsu.com</a>

                                </div>
                            </div>
                            <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <!-- End Contact Details Single Item -->
                        </div>
                        <!-- Start Contact Social Link -->
                        <div class="contact-social">
                            <h4>Follow Us</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/zenandsuholdings"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="tel:+94705831038"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="https://www.instagram.com/in/zenandsu"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="tel:+94117896655" ><i class="fa fa-phone"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Contact Social Link -->
                    </div>
                    <!-- End Contact Details -->
                </div>


                <div class="col-lg-8">
                    <div class="map-section" data-aos="fade-up" data-aos-delay="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">

                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.63544509461!2d79.9266596!3d6.8715605!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa39cfe966beb842c!2sZen%20%26%20Su%20Holdings!5e0!3m2!1sen!2slk!4v1671468645923!5m2!1sen!2slk" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- ...::::ENd Contact Section:::... -->

    <?php
    require "company_logo.php";
    require "footer.php";
    ?>

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