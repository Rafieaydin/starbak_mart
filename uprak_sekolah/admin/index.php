<?php
require '../koneksi.php';

session_start();
!isset($_SESSION['admin']) ? header("Location: ../index.php") : '';

$perusahaan  = query("SELECT * FROM perusahaan ORDER BY id DESC");
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
                    <?php if (isset($_SESSION['alert'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['alert'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php unset($_SESSION['alert']) ?>
                        </div>
                    <?php } ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row mt-2">
                                <div class="col-md-10">
                                    <h5 class="m-0 font-weight-bold text-primary ">Data perusahaan</h5>
                                </div>
                                <div class="col-md-2">
                                    <a href="tambah.php" class="btn btn-primary btn-sm pl-2">Tambah Data
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Name</th>
                                            <!-- <th>alamat</th> -->
                                            <th>nama_pemimpin</th>
                                            <th>email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($perusahaan as $key => $value) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['nama'] ?></td>
                                                <!-- <td><?= $value['alamat'] ?></td> -->
                                                <td><?= $value['nama_pemimpin'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                                <td>
                                                    <a href="detail.php?id=<?= $value['id'] ?>" class=" btn-sm btn btn-primary btn-circle">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="edit.php?id=<?= $value['id'] ?>" class=" btn-sm btn btn-warning btn-circle">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button data-id="<?= $value['id'] ?>" class=" btn-sm btn btn-danger btn-circle hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
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

    <!-- sweet alert -->
    <script script src=" https://cdn.jsdelivr.net/npm/sweetalert2@10 "></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            $('.hapus').click(function() {
                Swal.fire({
                    title: 'Apa anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = 'hapus.php?id="' + $(this).data('id') + '"';
                        Swal.fire(
                            'success',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                    } else if (result.dismiss === Swal.DismissReason.cancel) {}
                })
            })

        })
    </script>
</body>

</html>