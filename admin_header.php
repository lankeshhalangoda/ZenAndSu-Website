
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <!-- <div class="logo-src"></div> -->
            <img style="width: 60px;" src="assets/images/logo/logo_dark.png" />
            <!-- <span style="font-family: calibri; font-size: ;">Zen & Su</span> -->
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>

        <div class="app-header__content">
            <div class="app-header-left">

                <ul class="header-menu nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <?php
                                $admin_rs = Database::search("SELECT * FROM `admin`");
                                $admin_d = $admin_rs->fetch_assoc();
                            ?>
                            Name: <?php echo $admin_d["fname"]; ?>
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            Email: <?php echo $admin_d["email"]; ?>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">

                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <span>Admin Dashboard</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img style="width: 50px; height: auto; border-radius: 50%;" src="assets/images/admin/admin_img.png" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>