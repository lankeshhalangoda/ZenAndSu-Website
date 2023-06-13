<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html lang="eng">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Zen & Su | my account</title>
    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/snackbar.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .sticky-color--black{
            background-color: black;
        }
        .wrapper{
            height: 50px;
        }
    </style>

</head>

<body>
    <?php
    require "large_header.php";
    require "mobile_header.php";
    ?>

    <?php

    if (isset($_SESSION["u"])) {
    ?>
        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>

                 <!-- ...:::: Start Breadcrumb Section:::... -->
                 <div class="breadcrumb-section breadcrumb-bg-color--golden" style="background-color: #969696;">
                <div class="breadcrumb-wrapper p-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-10 mt-lg-0 pt-10">
                                <h3 class="breadcrumb-title text-white fw-bold">MY ACCOUNT</h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li class="fw-bold text-white"><a href="index.php" class="text-white">Home</a></li>
                                            <li class="active text-warning" aria-current="page">MY ACCOUNT</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ...:::: End Breadcrumb Section:::... -->

        <div id="load">


            <!-- ...:::: Start Account Dashboard Section:::... -->
            <div class="account-dashboard mt-7">
                <div class="container">
                    <div class="row mb-9 mt-9">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                                <ul role="tablist" class="nav flex-column dashboard-list">

                                    <li><a href="#account-details" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2 active bg-secondary">Account details</a>
                                    <li><a href="logout.php" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2 ">logout</a></li>
                                    <li><a href="#" onclick="deleteuseraccount();" class="nav-link btn btn-block btn-md btn-black-default-hover mt-2">Delete Your Account</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                                <div class="tab-pane fade active" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <?php

                                                $usinfo = $_SESSION["u"];
                                                ?>
                                                <div>
                                                    <p>Update Your Profile Details</a></p>
                                                    <br>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="default-form-box mb-20 col-12 col-md-6">
                                                                <label>First Name</label>
                                                                <input type="text" name="first-name" id="fname" value="<?php echo $usinfo["fname"] ?>">
                                                            </div>
                                                            <div class="default-form-box mb-20 col-12 col-md-6">
                                                                <label>Last Name</label>
                                                                <input type="text" name="last-name" id="lname" value="<?php echo $usinfo["lname"] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="default-form-box col-6 mb-20">
                                                            <label>Mobile</label>
                                                            <input type="text" id="mobile" name="mobile" value="<?php echo $usinfo["mobile"] ?>">
                                                        </div>
                                                        <div class="default-form-box col-6 mb-20">
                                                            <label>Gender</label>
                                                            <?php
                                                            $gen = Database::search("SELECT * FROM gender WHERE `id` = '" . $usinfo["gender_id"] . "'");
                                                            $genrs = $gen->fetch_assoc();
                                                            ?>
                                                            <input type="text" disabled name="mobile" value="<?php echo $genrs["name"] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="default-form-box mb-20 col-12 col-md-6">
                                                                <label>Email</label>
                                                                <input type="text" id="email" name="email-name" value="<?php echo $usinfo["email"] ?>" disabled>
                                                            </div>
                                                            <div class="default-form-box mb-20 col-12 col-md-6">
                                                                <label>Password</label>
                                                                <input type="text" name="user-password" value="<?php echo $usinfo["password"] ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="default-form-box mb-20">
                                                        <label>Registered Date & Time</label>
                                                        <input type="text" name="reg-date" value="<?php echo $usinfo["register_date"] ?>" disabled>
                                                    </div>
                                                    <?php

                                                    $uid = $_SESSION["u"]["id"];
                                                    $addressrs = Database::search("SELECT * FROM  user_has_address WHERE `user_id` ='" . $uid . "'");
                                                    $n = $addressrs->num_rows;

                                                    if ($n == 1) {

                                                        $d = $addressrs->fetch_assoc();

                                                    ?>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Address Line 1 (with district)</label>
                                                                    <input placeholder="Enter a correct shipping address" type="text" id="line1" name="add-1" value="<?php echo $d["line1"] ?>">
                                                                </div>

                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Your City</label>
                                                                    <input placeholder="Enter your city" type="text" id="line2" name="add-2" value="<?php echo $d["line2"] ?>">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Address Line 1 (with district)</label>
                                                                    <input placeholder="Enter a correct shipping address" type="text" id="line1" name="add-1">
                                                                </div>
                                                                <div class="default-form-box mb-20 col-12 col-md-6">
                                                                    <label>Your City</label>
                                                                    <input placeholder="Enter your city" type="text" id="line2" name="add-2">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    <?php
                                                    }
                                                    ?>
                                                    <br />

                                                    <div class="mt-3">
                                                        <button class="btn btn-md btn-black-default-hover" onclick="updateProfile();">Update Profile</button>
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


            <!-- Modal -->
            <div class="modal fade" id="deleteacc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Delete Account</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure about this</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-golden" onclick="deleteaccount();">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <!-- Modal -->
            <div class="modal fade" id="md" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Alert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="inner">

                        </div>
                        <div class="modal-footer">
                            <button onclick="refreshacc();" type="button" class="btn btn-black-default-hover" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require "footer.php";
        ?>

        <!-- material-scrolltop button -->
        <button style="left: 23px;" class="material-scrolltop bg-dark" type="button"></button>
        
    <?php

    } else {
    ?>
        <script>
            window.location = "login.php";
        </script>
    <?php
    }

    ?>

    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <script src="assets/js/snackbar.min.js"></script>
    <!-- Main JS -->

    <script src="assets/js/main.js"></script>
    <script src="assets/js/account.js"></script>

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