<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Sign in</title>

    <link rel="shortcut icon" href="assets/images/logo/round-logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="other/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Alerts -->
    <link rel="stylesheet" href="assets/css/snackbar.min.css">

</head>

<body style="background-image: url('assets/images/profilebackground.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">



    <div class="container-fluid vh-100 justify-content-center">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo text-center">
                        <img src="assets/images/logo/logo_dark.png" style="width: 200px; height: auto;">
                    </div>
                    <div class="col-12">

                        <h1 class="text-center title1" style="font-family: 'calibri';">Welcome to <span class="text-danger">Zen & Su</span> Admin Panel</h1>
                        <p class="text-center">You can access Admin Panel after you sign in here. <br />
                            Please provide correct credentials to access Admin Panel.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-12 justify-content-center d-flex ">
                        <div class="row g-3 offset-lg-3">
                            <div class="col-12">
                                <h3 style="font-family: 'calibri';">Sign in to your Admin Account.</h3>
                            </div>


                            <?php
                            $e = "";
                            $p = "";
                            if (isset($_COOKIE["e"])) {
                                $e = $_COOKIE["e"];
                            }
                            if (isset($_COOKIE["p"])) {
                                $p = $_COOKIE["p"];
                            }
                            ?>

                            <div class="col-lg-8 col-12">
                                <label class="form-label">Enter your email address <span style="color: red;">*</span></label>
                                <input value="<?php echo $e; ?>" placeholder="ex: lankeshhalangoda@gmail.com" style="border-color: black;" id="e" type="email" class="form-control" />
                            </div>
                            <div class="col-lg-8 col-12">
                                <label class="form-label">Enter your password <span style="color: red;">*</span></label>
                                <input value="<?php echo $p; ?>" placeholder="********" style="border-color: black;" id="p" type="password" class="form-control" />
                            </div>

                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-grid mt-3">
                                        <button class="btn btn-danger" onclick="admin_signin();">Login</button>
                                    </div>
                                    <div class="col-12 col-lg-2 d-grid mt-3">
                                        <a href="index.php" class="btn btn-dark">Home Page</a>
                                    </div>
                                    <div class="col-12 col-lg-2 d-grid mt-3">
                                        <a href="#" onClick="history.go(-1); return false" ; class="btn btn-dark">Back</a>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">&copy;2022 Zen & Su All Rights Reserved.</p>

        </div>
    </div>







    <script src="assets/js/script.js"></script>
    <script src="other/bootstrap.bundle.js"></script>
    <!-- Alerts -->
    <script src="assets/js/snackbar.min.js"></script>
</body>

</html>