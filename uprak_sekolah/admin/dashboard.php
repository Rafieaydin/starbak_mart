<?php
require '../koneksi.php';

session_start();
!isset($_SESSION['admin']) ? header("Location: ../index.php") : '';
$perusahaan = query("SELECT COUNT(*) as jumlah FROM perusahaan")[0];
$user = query("SELECT COUNT(*) as jumlah FROM users WHERE role = 'user'")[0];
$admin = query("SELECT COUNT(*) as jumlah FROM users WHERE role = 'admin'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uprak PHP</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/pakage/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/pakage/datatables/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- sidebar -->
        <!-- Sidebar -->
        <?php include_once '../template/admin/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- navbar -->
                <?php include_once '../template/admin/navbar.php' ?>
                <!-- End of navbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah perusahaan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan['jumlah'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-building fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah user</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user['jumlah'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admin['jumlah'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="../asset/pakage/jquery/jquery.min.js"></script>
        <script src="../asset/pakage/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../asset/pakage/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../asset/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../asset/pakage/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="../asset/pakage/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>