<?php
session_start();
require 'koneksi.php';
$barang = query('SELECT * FROM stockbarang');

if (isset($_POST['beli'])) {
    if (tambah($_POST) > 0) { // > 0 = berhasil
        header('Location: index.php');
        session_destroy();
    } else {
        '<script>
        console.log("barang gagal di tambahkan");
        </script>';
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
    <link rel="stylesheet" href="Asset/css/style.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="asset/css/fontawesome/css/all.min.css" crossorigin="anonymous" />

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
                        <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Admin/index.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- keranjang -->
            <div class="col-md-4">
                <div class="row">
                    <div class="container ">
                        <div class="text-center  mt-2 pt-2  pb-2 color-white fw-bold  marque ">
                            <div class="marque-text">
                                ini adalah iklan | ini adalah iklan | ini adalah iklan | ini adalah iklan |ini adalah iklan | ini adalah
                                iklan |ini adalah iklan | ini adalah iklan |ini adalah iklan | ini adalah iklan |ini adalah iklan | ini
                                adalah iklan |
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="text-center  mt-2 pt-2  pb-2 color-white fw-bold stock"><i class="fas fa-shopping-cart mx-2"></i>KERANJANG</div>
                    </div>
                </div>
                <div class="keranjang mx-2 mt-2 ">
                    <div class="row ">
                        <!-- keranjang brang -->
                        <?php foreach ($_SESSION as $key => $val) {
                            // var_dump($_SESSION);
                            $getKey = $key;
                            $getID = explode(".", $key)[1];
                            $getData = query("SELECT * FROM stockbarang WHERE id = $getID");
                            foreach ($getData as $keranjang) {
                                if (isset($total)) {
                                    $total = $keranjang['harga'] * $val + $total;
                                } else {
                                    $total = $keranjang['harga'] * $val;
                                }

                        ?>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-3  mt-2 mb-2 ml-2 mr-2">
                                            <img src=" <?= $keranjang['gambar'] ?>" class="" alt="">
                                        </div>
                                        <div class="col-3">
                                            <div class="row cart-text mt-4">
                                                <?= $keranjang['nama'] ?>
                                            </div>
                                            <div class="row  cart-count">
                                                Harga : <?= rupiah($keranjang['harga']) ?>
                                            </div>
                                            <div class="row  cart-count">
                                                Total : <?= rupiah($val * $keranjang['harga']) ?>
                                            </div>

                                        </div>
                                        <div class="col-4 mt-2">
                                            <div class="input-group flex-nowrap mt-4 mr-4">
                                                <button class="input-group-text " id="addon-wrapping" onclick="tambahBarang('<?= $key ?>')"><i class="me-4 fa-xs fa fa-plus"></i></button>
                                                <input type="text" class="form-control" id="val" placeholder="1" value=" <?= $val ?>">
                                                <button class="input-group-text" id="addon-wrapping" onclick="kurangBarang('<?= $key ?>')"><i class="fa fa-sm fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-2 ">
                                            <i class="fas fa-times mt-4 fa-2x me-5" style="cursor: pointer;" onclick="hapusBarang('<?= $key ?>')"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!-- end keranjang barang -->
                    </div>

                </div>
                <span class="jumah ">
                    <table width="100%" class="ms-2 mt-2">
                        <tbody>
                            <tr>
                                <td>Discount </td>
                                <td id="diskon">
                                    <?php if (isset($total) && $total > 10000) {
                                        $discount = $total * 0.10; ?>
                                        <?= rupiah($discount) ?>
                                    <?php } else {
                                        $discount = 0; ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>PPN </td>
                                <td id="ppn">
                                    <?php if (isset($total)) {
                                        $ppn = $total * 0.20; ?>
                                        <?= rupiah($ppn) ?>
                                    <?php } else { ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr class="bg-primary text-white">
                                <td>Total</td>
                                <td id="total">
                                    <?php if (isset($total)) { ?>
                                        <?= rupiah($total + $discount - $ppn) ?>
                                    <?php } else { ?>
                                        Rp 0
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </span>
                <form action="" method="POST">
                    <button class="btn btn-md bg-primary mx-3 mt-2  text-white" name="beli" type="submit" style="width: 45%;">BAYAR</button>
                </form>
            </div>
            <!-- end keranjang -->

            <!-- tampilan kanan -->
            <div class="col-md-8">
                <!-- header -->
                <div class="row header m-0 p-0">
                    <div class="col-md-4  tanggal text-center mt-2 border   color-white fw-bold">
                        <div class="mt-2" id="tanggal"></div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group flex-nowrap search mr-3 mt-2 h-75">
                            <input type="text" class="form-control h-100" placeholder="Ex makanan ringan" id="search" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
                            <button class="btn btn-outline-dark h-100" style="width: 10%;" type="button" id="button-addon2"><i class="fa fa-search mx-auto"></i></button>
                        </div>
                    </div>
                </div>
                <!-- end header -->
                <!-- barang -->
                <div class="container brang mt-2">
                    <div class="row">
                        <?php foreach ($barang as $brg) { ?>
                            <?php if($brg['stock'] > 0) {?>
                            <div class="col-md-3" onclick="tambahBarang('val.<?= $brg['id'] ?>')">
                                <div class="card mt-2 card rounded mb-2 ml-3 mr-1 mt-2 drag">
                                    <img src=" <?= $brg['gambar'] ?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p><?= $brg['nama'] ?></p>
                                        <p><?= rupiah($brg['harga']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        <?php } ?>

                    </div>
                    <!-- end barang -->
                </div>
            </div>
            <!-- end tampilan kanan -->
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="Asset/js/jquery/dist/jquery.js"></script>
    <script src="Asset/js/main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>