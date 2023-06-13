<?php
session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {

        if (isset($_GET["page"])) {
            $pageno = $_GET["page"];
        } else {
            $pageno = 1;
        }

?>
        <!doctype html>
        <html lang="en">

        <head></head>
        <link href="other/icon.png" rel="icon">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin | banner update</title>
        <link href="css/font-awesome.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        </head>

        <body>
            
            <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
                
            <?php
            require "admin_header.php";
            ?>

                <div class="app-main">

                <?php
                require "admin_sidepannel.php";
                ?>

                    <div class="app-main__outer">
                        <div class="app-main__inner">

                            <div class="row ">
                                <div class="col-md-12 ">


                                    <div class="app-page-title">
                                        <div class="page-title-wrapper">
                                            <div class="page-title-heading">
                                                <div class="page-title-icon">
                                                    <i class="fa fa-download icon-gradient bg-malibu-beach">
                                                    </i>
                                                </div>
                                                <div>Customize Banners
                                                    <div class="page-title-subheading">Update banners / sliders / images in website.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="page-title-actions">
                                            <button onclick="history.back();" type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Back">
                                                Back
                                            </button>
                                            <a href="admin.php"><button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-info" data-original-title="Dashboard">
                                                    Dashboard
                                                </button></a>

                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="main-card mb-3 card ">
                                        <div class="card-header">Home Slider </div>
                                        <div class="table-responsive">
                                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">


                                                <thead>

                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Slider Number</th>
                                                        <th class="text-center">Image Path</th>
                                                        <th class="text-center">Image Size (px)</th>
                                                        <th class="text-center">Uploaded Date</th>
                                                        <th class="text-center">Uploaded Time</th>
                                                        <th style="cursor: pointer; font-size: x-large;" class="text-center"><i style="transform: scale(1,-1);" onclick="update_banner('home_sliders');" class="fa fa-download icon-gradient bg-malibu-beach"> </i></th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <tr>
                                                        <?php
                                                        $hs1r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider1%' ");
                                                        $hs1d = $hs1r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">1</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 1</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs1d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d1 = $hs1d["date_time"];
                                                            $splitdate1 = explode(" ", $d1);
                                                            $pdate1 = $splitdate1[0];
                                                            $ptime1 = $splitdate1[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate1; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime1; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs1">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <?php
                                                        $hs2r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider2%' ");
                                                        $hs2d = $hs2r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">2</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 2</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs2d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d2 = $hs2d["date_time"];
                                                            $splitdate2 = explode(" ", $d2);
                                                            $pdate2 = $splitdate2[0];
                                                            $ptime2 = $splitdate2[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate2; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime2; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs2">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs3r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider3%' ");
                                                        $hs3d = $hs3r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">3</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 3</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs3d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d3 = $hs3d["date_time"];
                                                            $splitdate3 = explode(" ", $d3);
                                                            $pdate3 = $splitdate3[0];
                                                            $ptime03 = $splitdate3[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate3; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime03; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs3">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs4r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider4%' ");
                                                        $hs4d = $hs4r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">4</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 4</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs4d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d4 = $hs4d["date_time"];
                                                            $splitdate4 = explode(" ", $d4); 
                                                            $pdate4 = $splitdate4[0];
                                                            $ptime04 = $splitdate4[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate4; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime04; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs4">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs5r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider5%' ");
                                                        $hs5d = $hs5r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">5</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 5</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs5d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d5 = $hs5d["date_time"];
                                                            $splitdate5 = explode(" ", $d5); 
                                                            $pdate5 = $splitdate5[0];
                                                            $ptime05 = $splitdate5[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate5; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime05; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs5">
                                                        </td>
                                                    </tr>







                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    



                                </div>
                            </div>

                        </div>

                    </div>



                    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->

                </div>
            </div>

            <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
            <script src="other/script.js"></script>
            <script src="js/all.js"></script>
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
        </body>

        </html>
    <?php

} else {
    ?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php
}
?>