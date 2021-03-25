<?php
require '../koneksi.php';

session_start();
!isset($_SESSION['user']) ? header("Location: ../index.php") : '';

$id = $_GET['id'];
$name = $_SESSION['user']['username'];
$perusahaan = query("SELECT * FROM perusahaan WHERE id = $id")[0];
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

    <!-- costom css -->
    <link rel="stylesheet" href="../asset/css/css.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- sidebar -->
        <!-- Sidebar -->
        <?php include_once '../template/user/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- navbar -->
                <?php include_once '../template/user/navbar.php' ?>
                <!-- End of navbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="card shadow">
                        <div class="row ml-2 mt-4">
                            <div class="col-md-6">
                                <img src="<?= $perusahaan['foto'] ?>" width="500px" height="333px" alt="">
                                <div class="deskripsi mt-2 mb-5 mx-auto text-justify">
                                    <label for="" class="font-weight-bold">Deskripsi perusahan</label><br>
                                    <?= $perusahaan['deskripsi_perusahaan'] ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nama ml-3 mt-2">
                                    <label for="" class="font-weight-bold">Nama perusahaan</label> <br>
                                    <?= $perusahaan['nama'] ?>
                                </div>
                                <div class="alamat ml-3 mt-2">
                                    <label for="" class="font-weight-bold">Alamat perusahaan</label> <br>
                                    <?= $perusahaan['alamat'] ?>
                                </div>
                                <div class="email ml-3 mt-2">
                                    <label for="" class="font-weight-bold">Email perusahaan</label> <br>
                                    <?= $perusahaan['email'] ?>
                                </div>
                                <div class="nama_petinggi ml-3 mt-2">
                                    <label for="" class="font-weight-bold">Nama petingi perusahaan</label> <br>
                                    <?= $perusahaan['nama_pemimpin'] ?>
                                </div>
                                <div class="button ml-3 mt-3">
                                    <a href="dashboard.php" class="btn btn-success"><i class="fas fa-arrow-alt-circle-left"></i> kembali</a>
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

</body>

</html>