<?php
require '../koneksi.php';

session_start();
!isset($_SESSION['admin']) ? header("Location: ../index.php") : '';


if (isset($_POST['submit'])) {
    if (tambahAdmin($_POST) > 0) {
        header('Location: index.php');
        $_SESSION['alert'] = 'data anda berhasil di tambahkan';
    } else {
        header('Location: index.php>err');
        $_SESSION['alert'] = 'data anda gagal di tambahkan';
    }
}
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data perusahaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="masukan nama">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="masukan alamat">
                                </div>
                                <div class="form-group">
                                    <label for="foto">foto</label>
                                    <input type="text" class="form-control" name="foto" placeholder="masukan url foto">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="email" placeholder="masukan email">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemimpin">nama_pemimpin</label>
                                    <input type="text" class="form-control" name="nama_pemimpin" placeholder="masukan nama_pemimpin">
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi">Deskripsi perusahaan</label>
                                    <textarea class="form-control" name="Deskripsi" rows="3"></textarea>
                                </div>
                                <a href="index.php" class="btn btn-danger">Kembali</a>
                                <button name="submit" class="btn btn-success">Tambah</button>
                            </form>
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