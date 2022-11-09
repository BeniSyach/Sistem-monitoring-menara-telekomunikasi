<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $title ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="/assets/img/logo.png">

    <link href="/assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/backend/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/backend/css/style.css" rel="stylesheet" type="text/css">


    <link href="/assets/backend/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <script src="/assets/backend/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <script src="/assets/backend/js/jquery.min.js"></script>

    <link rel="stylesheet" href="/assets/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="/assets/leaflet-locatecontrol/src/L.Control.Locate.js"></script>

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <!-- <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a> -->
                    <a href="/admin" class="logo"><img src="/assets/img/simentel.png" width="50%" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <?= $this->include('admin/layout/menu') ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <?= $this->include('admin/layout/topbar') ?>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <?= $this->renderSection('isi'); ?>
                        </div>
                        <!-- end page title end breadcrumb -->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                © 2022 Sistem Informasi Monitoring dan Pengendalian Menara Telekomunikasi Kabupaten Serdang Bedagai.
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->



    <!-- jQuery  -->

    <script src="/assets/backend/js/popper.min.js"></script>
    <script src="/assets/backend/js/bootstrap.min.js"></script>
    <script src="/assets/backend/js/modernizr.min.js"></script>
    <script src="/assets/backend/js/detect.js"></script>
    <script src="/assets/backend/js/fastclick.js"></script>
    <script src="/assets/backend/js/jquery.slimscroll.js"></script>
    <script src="/assets/backend/js/jquery.blockUI.js"></script>
    <script src="/assets/backend/js/waves.js"></script>
    <script src="/assets/backend/js/jquery.nicescroll.js"></script>
    <script src="/assets/backend/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="/assets/backend/js/app.js"></script>

</body>

</html>