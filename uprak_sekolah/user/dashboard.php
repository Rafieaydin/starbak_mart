<?php
require '../koneksi.php';

session_start();

!isset($_SESSION['user']) ? header("Location: ../index.php") : '';

$name = $_SESSION['user']['username'];
$perusahaan = query("SELECT * FROM perusahaan ORDER BY id DESC");
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
                        <h3 class=" text-dark mb-5 mt-5 text-center">List perusahaan </h3>
                        <div class="row d-flex ml-2 mr-2">
                            <?php foreach ($perusahaan as $key => $value) { ?>
                                <div class="col-md-3 mt-2 ">
                                    <a href="detail.php?id=<?= $value['id'] ?>">
                                        <div class="card">
                                            <img class="card-img-top" src="<?= $value['foto'] ?>" height="150px" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title nama_card text-center text-dark"><?= $value['nama'] ?></h5>
                                                <h5 class="card-title nama_alamat text-dark"><span class="font-weight-bold">alamat :</span> <br> <?= $value['alamat'] ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
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