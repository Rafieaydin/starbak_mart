<?php
require '../../koneksi.php';

session_start();
!isset($_SESSION['admin']) ? header("Location: ../index.php") : '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contact = query("SELECT * FROM contact WHERE id = $id")[0];
    $nama = $_SESSION['admin']['username'];
    if (isset($_POST['submit'])) {
        if (editContacts($_POST) > 0) {
            header('Location: index.php');
            $_SESSION['alert'] = 'data anda berhasil di tambahkan';
        }
    }
}else{
    die('data tidak di temukan');
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
    <link href="../../asset/pakage/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/pakage/datatables/dataTables.bootstrap4.min.css">
    <style>
        .sidebar {
            background-image: linear-gradient(to right, #232526, #414345);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <!-- <div class="sidebar-brand-icon">
                    <i class="fas fa-user"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link " href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link " href="../projek/index.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Projek</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data skill</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data skill</h6>
                        <a class="collapse-item" href="../tag/index.php">Table tag</a>
                        <a class="collapse-item" href="index.php">Table skills</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="../Contact/index.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Contact</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- navbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small mr-3"><?= $nama ?></span>
                                <img class="img-profile rounded-circle" src="../../asset/image/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../auth/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of navbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Edit Contact</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="id" value="<?= $contact['id'] ?>" hidden>
                                    <label for="file">nama</label>
                                    <input type="text" class="form-control" id="file" name="nama" placeholder="masukan link" value="<?= $contact['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="masukan email" value="<?= $contact['email'] ?>">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nomor_telp">no telepon</label>
                                    <input type="text" class="form-control" id="nomor_telp" name="no_telp" placeholder="masukan judul" value="<?= $contact['no_telp'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">pesan</label>
                                    <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="3"><?= $contact['pesan'] ?></textarea>
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
    <script src="../../sset/pakage/jquery/jquery.min.js"></script>
    <script src="../../asset/pakage/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../asset/pakage/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../asset/pakage/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../../asset/pakage/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>