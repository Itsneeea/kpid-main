<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KPID Kalsel | Dashboard</title>
    <link href="../plugins/css/fontawesome.css" rel="stylesheet">
    <link href="../plugins/css/brands.css" rel="stylesheet">
    <link href="../plugins/css/solid.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../dist/js/adminlte.js"></script>
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/fullcalendar/main.min.js"></script>
    <style>
    .pagination li {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid #ddd;
        margin-right: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-color: #fff;
        border-radius: 4px;
    }

    .pagination li:hover {
        background-color: #eee;
    }

    .pagination .active {
        background-color: #337ab7;
        color: #fff;
    }

    .dataTables_paginate {
        float: right;
        width: 100px;
    }

    .pagination {
        width: 100px;
        float: bottom;
        margin-left: 100px;
    }

    .dataTables_filter {
        width: 250px;
        margin-right: 10px;
    }
    </style>
</head><?php include '../koneksi.php';
        session_start();

        if ($_SESSION['status'] != "administrator_logedin") {
            header("location:../index.php?alert=belum_login");
        }

        ?></head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- < !-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- < !-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a></li>
            </ul>
            <!-- < !-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" data-widget="fullscreen" href="#" role="button"><i
                            class="fas fa-expand-arrows-alt"></i></a></li>
            </ul>
        </nav></a></header>
        <aside class="main-sidebar sidebar-dark-primary elevation-4"><a href="index.php" class="brand-link"><img
                    src="../assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
                    style="opacity: .8" width="120px"><span class="brand-text font-weight-light">KPID
                    KALSEL</span></a>
            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item"><a href="index.php" class="nav-link"><i
                                    class="fa-regular fa-laptop-code nav-icon"></i>
                                <p>Dashboard </p>
                            </a>

                        <li class="nav-item nav-tree"><a href="kategori.php" class="nav-link" font-size="5px"><i
                                    class="fa-regular fa-folder-open nav-icon"></i>
                                <p>KATEGORI NPHD</p>
                            </a></li>

                        <li class="nav-item"><a href="transaksi.php" class="nav-link"><i
                                    class="fa-solid fa-magnifying-glass-dollar nav-icon"></i>
                                <p>DATA TRANSAKSI</p>
                            </a></li>
                        <li class="nav-item"><a href="bank.php" class="nav-link"><i
                                    class="fa-solid fa-address-book nav-icon"></i>
                                <p>DATA AKUN</p>
                            </a></li>
                        </li>
                        <li class="nav-item nav-tree"><a href="nphd.php" class="nav-link"><i
                                    class="fa-regular fa-folder-open nav-icon"></i>
                                <p>ANGGARAN NPHD</p>
                            </a></li>
                        <li class="nav-item"><a href="bukukas.php" class="nav-link"><i
                                    class="fa-solid fa-book nav-icon"></i>
                                <p>L. BUKU KAS UMUM</p>
                            </a></li>
                        <li class="nav-item nav-tree"><a href="laporan_nphd.php?periode=1" class="nav-link"><i
                                    class="fa-regular fa-folder-open nav-icon"></i>
                                <p>L. ANGGARAN NPHD</p>
                            </a></li>
                        <li class="nav-item nav-tree"><a href="danaterpakai.php?periode=1" class="nav-link"><i
                                    class="fa-regular fa-folder-open nav-icon"></i>
                                <p>L. ANGGARAN TERPAKAI</p>
                            </a></li>
                        <li class="nav-item"><a href="laporan.php" class="nav-link"><i
                                    class="fa-solid fa-book nav-icon"></i>
                                <p>LAPORAN TRANSAKSI</p>
                            </a></li>
                        <li class="nav-item"><a href="hutang.php" class="nav-link"><i
                                    class="fa-regular fa-file-lines nav-icon"></i>
                                <p>LAPORAN HUTANG</p>
                            </a></li>
                        <li class="nav-item"><a href="piutang.php" class="nav-link"><i
                                    class="fa-regular fa-file nav-icon"></i>
                                <p>LAPORAN PIUTANG</p>
                            </a></li>
                        <li class="nav-item"><a href="user.php" class="nav-link"><i
                                    class="fa-regular fa-user-large nav-icon"></i>
                                <p>MANAJEMEN PENGGUNA</p>
                            </a></li>
                        <li class="nav-item"><a href="staff.php" class="nav-link"><i
                                    class="fa-regular fa-user-large nav-icon"></i>
                                <p>DATA STAFF</p>
                            </a></li>
                        <li class="nav-item"><a href="gantipassword.php" class="nav-link"><i
                                    class="fa-regular fa-key nav-icon"></i>
                                <p>GANTI PASSWORD</p>
                            </a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                    class="fa-regular fa-person-running nav-icon"></i>
                                <p>KELUAR</p>
                            </a></li>
                    </ul>
                    </li>
                </nav>
            </div>
        </aside>

        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="../dist/js/adminlte.js"></script>
        <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>

        <script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>

        <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="../assets/bower_components/raphael/raphael.min.js"></script>
        <script src="../assets/bower_components/morris.js/morris.min.js"></script>

        <script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


        <script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

        <script src="../assets/bower_components/moment/min/moment.min.js"></script>
        <script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

        <script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

        <script src="../assets/dist/js/adminlte.min.js"></script>
        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="../dist/js/adminlte.js"></script>
        <script src="../assets/dist/js/pages/dashboard.js"></script>
        <script src="../dist/js/pages/dashboard3.js"></script>
        <script src="../assets/dist/js/demo.js"></script>
        <script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
        <script src="../assets/bower_components/chart.js/Chart.min.js"></script>

        <script src="../plugins/jquery/jquery.min.js"></script>

        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="../dist/js/adminlte.js"></script>
</body>

</html>