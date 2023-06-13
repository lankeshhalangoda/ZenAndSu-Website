<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
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
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div style="overflow-y: scroll;" class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboard</li>
                    <li>

                        <?php
                        $activePage = basename($_SERVER['PHP_SELF'], ".php");
                        // echo $activePage;
                        ?>

                        <a href="admin.php" class="<?= ($activePage == 'admin') ? 'mm-active':''; ?>">
                            <i class="metismenu-icon fa fa-user-secret" ></i> My Dashboard
                        </a>
                        <a href="add_product.php" class="<?= ($activePage == 'add_product') ? 'mm-active':''; ?>">
                            <i class="metismenu-icon fa fa-desktop"></i> Add Products
                        </a>
                        <a href="my_products.php" class="<?= ($activePage == 'my_products') ? 'mm-active':''; ?>">
                            <i class="metismenu-icon fa fa-cubes"></i> My Products
                        </a>

                        <a href="manage_orders.php" class="<?= ($activePage == 'manage_orders') ? 'mm-active':''; ?>">
                            <i style="font-weight: bolder;" class="metismenu-icon pe-7s-tools"> </i> Manage Orders
                        </a>

                        <!-- <a href="banner_update.php" class="<?= ($activePage == 'banner_update') ? 'mm-active':''; ?>">
                            <i style="font-weight: bolder;" class="metismenu-icon pe-7s-tools"> </i> Manage Banners
                        </a> -->


                    </li>
                    <li class="app-sidebar__heading">Selling History</li>
                    <li>
                        <label style="font-weight: bold;">From Date</label>
                        <input id="fromDate" style="border: none; width: 100%; outline: none;" type="date" /> <br /><br />
                        <label style="font-weight: bold;">To Date</label>
                        <input id="toDate" style="border: none; width: 100%; outline: none;" type="date" /> <br /><br />

                        <a onclick="dailySellings();" id="historylink" style="text-align: start; border: none; width: 60%; height: 40px; cursor: pointer; background-color: #000000; border-radius: 5px; color: white; margin-left: auto; margin-right: auto; display: block;">Search</a>

                    </li>
                    <li class="app-sidebar__heading">Go To Main Page</li>
                    <li>
                        <a href="index.php">
                            <i class="metismenu-icon fa fa-home"></i> Home Page
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</body>

</html>