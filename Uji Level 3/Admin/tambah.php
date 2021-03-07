<?php
session_start();
require '../koneksi.php';

if (isset($_POST['submit'])) {
    if (tambahAdmin($_POST)>0) {
        header('Location: index.php');
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- csotom css -->
    <link rel="stylesheet" href="../Asset/css/style.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../asset/css/fontawesome/css/all.min.css" crossorigin="anonymous" />

    <!-- Data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

    <title>UJI LEVEL PHP</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1 mx-5 text-white" href="#">Starbhak Mart</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="#">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- tampilan kanan -->
            <div class="col-md-12">
                <!-- header -->
                <div class="row header m-0 p-0">
                    <!-- <a href="index.php" class="col-md-2  warnaBorder2 text-center mt-2 border   text-white fw-bold">
                        <div class="mt-2"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</div>
                    </a> -->
                    <div class="col-md-10 warnaBorder mt-2">
                        <div class="mt-2 mb-2 ms-3">Admin | Tambah Barang</div>
                    </div>
                    <div class="col-md-2  tanggal text-center mt-2 border   color-white fw-bold">
                        <div class="mt-2 mb-2" id="tanggal"></div>
                    </div>
                </div>
                <!-- end header -->
            </div>
            <!-- end tampilan kanan -->
            <!-- start form -->
            <div class="col-md-6  tambahTable mt-2 ms-3">
                <form action="" method="POST">
                    <div class="row">
                        <div class="row mt-4 mb-2">
                            <label for="" class="col-md-3">Link gambar</label>
                            <input type="text" name="gambar" class="col-md-9">
                        </div>
                        <div class="row mt-2 mb-2">
                            <label for="" class="col-md-3">Nama Barang</label>
                            <input type="text" name="nama" class="col-md-9">
                        </div>
                        <div class="row mt-2 mb-2">
                            <label for="" class="col-md-3">Stock</label>
                            <input type="text" name="stock" class="col-md-9">
                        </div>
                        <div class="row mt-2 mb-4">
                            <label for="" class="col-md-3">Harga</label>
                            <input type="text" name="harga" class="col-md-9">
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-danger mb-3"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> kembali</a>
                    <button class="btn btn-success mb-3" type="submit" name="submit">tambah</button>
                </form>
            </div>

            <!--  -->
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../Asset/js/jquery/dist/jquery.js"></script>
    <script src="../Asset/js/main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>