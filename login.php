<?php
session_start();
require "connection.php";
?>


<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | Login</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/snackbar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">

    <style>
        .sticky-color--black{
            background-color: #2d2f3e;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
    </style>
</head>

<body>




    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>



    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

            <!-- ...:::: Start Breadcrumb Section:::... -->
            <div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #000;">
                <div class="breadcrumb-wrapper p-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-10 mt-lg-0 pt-10">
                                <h3 class="breadcrumb-title text-white fw-bold"><b>LOGIN</b></h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                            <li class="active text-warning" aria-current="page">Login</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ...:::: End Breadcrumb Section:::... -->

    <!--Error msg view-->

    <!-- <div class="alert hide">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg"><span id="errs"></span>!</span>
        <span class="close-btn">
            <span class="fas fa-times"></span>
        </span>
    </div> -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="account-login section">
        <div class="container">

            <div class="row align-content-center">
                <div class="login__form active">

                    <div class="col-12 p-2">
                        <div class="row">
                            <div class="col-12 col-lg-6 px-5" data-aos="fade-up" data-aos-delay="0">
                                <div class="row">
                                    <div class="col-12 align-self-center">
                                        <h3 class="fw-bolder">WELCOME BACK !</h3>
                                        <p class="fw-lighter fs-6 my-2">Don't have an account, <span onclick="signup_method();" id="signUp" role="button" class="text-primary">Sign Up</span></p>
                                        <!-- form login section -->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control  shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="email2" placeholder="name@example.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="username" class="form-label">Password</label>
                                                <div class="d-flex position-relative">
                                                    <input type="password" class="form-control  auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="password2" placeholder="Password">
                                                    <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100" onclick="signInProcess();">Login</button>
                                            </div>
                                            <!-- <div class="col-6 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input mt-auto" checked type="checkbox" id="remeber" />
                                                        <label class="form-check-label">Remeber me</label>
                                                    </div>
                                                </div> -->
                                            <div class="col-6 mt-3">
                                                <label class="link-primary" style="cursor: pointer;" onclick="forgotPassword();">Forgot Password?</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div data-aos="fade-down" data-aos-delay="0" class="col-6 img2">

                            </div>

                        </div>
                    </div>
                </div>
                <!--sign up-->
                <div id="signup_form1" class="register__form">

                    <div class="col-12 p-2">
                        <div class="row">
                            <div class="col-6 img">

                            </div>

                            <div class="col-12 col-lg-6 px-5">
                                <div class="row">
                                    <div class="col-12 align-self-center">
                                        <div class="row gy-2">
                                            <h3 class="fw-bolder">REGISTER HERE !</h3>
                                            <p class="fw-lighter fs-6">Have an account, <span id="signIn" role="button" class="text-primary">Sign In</span></p>

                                            <!-- form register section -->
                                            <div class="col-12 col-lg-6">
                                                <label for="username" class="form-label">First name</label>
                                                <input type="text" class="form-control  shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="fname" placeholder="First name">
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <label for="username" class="form-label">Last name</label>
                                                <input type="text" class="form-control  shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="lname" placeholder="Last name">
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="email" class="form-control  shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="email" placeholder="abc@gmail.com">
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <label for="username" class="form-label">Mobile</label>
                                                <input type="number" class="form-control  shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="mobile" placeholder="07******">
                                            </div>

                                            <div class="col-12 d-grid">
                                                <label for="username" class="form-label">Gender</label>
                                                <div class="d-flex position-relative">
                                                    <select class="form-control" id="gender">
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-6 d-grid">
                                                <label for="username" class="form-label">Password</label>
                                                <div class="d-flex position-relative">
                                                    <input type="password" class="form-control  auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="password" placeholder="Password">
                                                    <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                                                </div>
                                            </div>

                                            <div class="col-6 d-grid">
                                                <label for="username" class="form-label">Re enter password</label>
                                                <div class="d-flex position-relative">
                                                    <input type="password" class="form-control  auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" id="RePassword" placeholder="Password">
                                                    <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                                                </div>
                                            </div>



                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-3 w-100" onclick="signUp1();">Sign Up</button>
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
    </div>

    <!--model-->
    <div class="modal fade" tabindex="-1" id="forgetPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="np" />
                                <button class="btn btn-outline-primary" type="button" id="npb" onclick="showPassword1();">Show</button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="rnp" />
                                <button class="btn btn-outline-primary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Verfication code</label>
                            <input class="form-control" type="text" id="vc" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <!--model-->
    <!-- ...:::: End Customer Login Section :::... -->

    <?php
    require "footer.php";
    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/snackbar.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>

        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "100007954332999");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


</body>


</html>