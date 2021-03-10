<?php
session_start();
require '../koneksi.php';
$barang = query("SELECT 
GROUP_CONCAT(log_history.nama ORDER BY created_at ASC) AS nama, 
GROUP_CONCAT(log_history.stock ORDER BY created_at ASC) AS total_stock  ,
GROUP_CONCAT(log_history.harga ORDER BY created_at ASC) AS harga,
sum(log_history.total_harga)  AS total_harga,
log_history.created_at FROM log_history
GROUP BY created_at ORDER BY created_at DESC
");
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
                        <a class="nav-link text-white active" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="../Admin/index.php">Admin</a>
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
                    <div class="col-md-2  tanggal text-center mt-2 border   color-white fw-bold">
                        <div class="mt-2" id="tanggal"></div>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group flex-nowrap search  mt-2 h-75">
                            <input type="text" class="form-control h-100 filter" placeholder="Cari barang" id="filter" data-id="1" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
                            <button class="btn border-left-0 btn-outline-dark h-100" style="width: 10%;" type="button" id="button-addon2"><i class="fa fa-search mx-auto"></i></button>
                        </div>
                    </div>
                </div>
                <!-- end header -->
                <!-- barang -->
                <div class="container-fluid  mb-5  mt-2">
                    <div class="row">
                        <table id="table_id" class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>jumlah barang</th>
                                    <th>harga</th>
                                    <th>jumlah harga</th>
                                    <th>Tanggal beli</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($barang as $key => $brg) {
                                $total = $brg['total_harga'];
                                $discount = $total * 0.10;
                                $ppn = $total * 0.10;
                                ($total > 10000) ? $total = $total + $discount - $ppn : $total = $total - $ppn;
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $brg['nama'] ?></td>
                                        <td><?= $brg['total_stock'] ?></td>
                                        <td>
                                            <?php $ex = explode(',', $brg['harga']);
                                            $rupiah = [];
                                            foreach ($ex as $key => $value) {
                                                $rupiah[] = rupiah((int)$value);
                                            }
                                            echo join(',', $rupiah);
                                            ?>
                                        </td>
                                        <td><?= rupiah($total) ?></td>
                                        <td><?= date('Y/m/d', strtotime($brg['created_at'])) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end barang -->
                </div>
            </div>
            <!-- end tampilan kanan -->
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! 
        -->

    <script script src=" https://cdn.jsdelivr.net/npm/sweetalert2@10 "></script>
    <script src="../Asset/js/jquery/dist/jquery.js"></script>
    <script script script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script src="../Asset/js/main.js"></script>

    <!-- Sweet alert -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable({
                "dom": 't<"bottom"<"row"<"col-6"i><"col-6"p>>>',
            });

            $('#filter').keyup(function() {
                table
                    .column($(this).data('id'))
                    .search(this.value)
                    .draw();
            })

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
            
            $('.dataTables_empty').html('History masih kosong');
        });
    </script>
</body>

</html>