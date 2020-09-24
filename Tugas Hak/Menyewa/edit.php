<?php
include 'koneksi.php';
// include 'tampil.php';
    $id_film = $_GET['id'];
    $sql = "SELECT * FROM menyewa WHERE kode_sewa='$id_film'";
    $query = mysqli_query($connect,$sql);
    $pel = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        die("data tidak ditemukan");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <h3>Form edit Menyewa</h3>
    <form action="sedit.php" method="post">
        <input type="hidden" name="kode_sewa" value="<?php echo $pel['kode_sewa']?>">
        <p>
            <label>kode_sewa : <input type="text" name="kode_sewa" value="<?php echo $pel['kode_sewa']?>"></label>
        </p>
        <p>
            <label>Jenis : <input type="text" name="no_identitas" value="<?php echo $pel['no_identitas']?>"></label>
        </p>
        <p>
            <label>Tanggal sewa : <input type="date" name="tgl_sewa" value="<?php echo $pel['tgl_sewa']?>"></label>
        </p>
        <p>
            <label>Total Film : <input type="text" name="tot_film" value="<?php echo $pel['tot_film']?>"></label>
        </p>
        <p>
            <label>Tanggal Kembali : <input type="date" name="tgl_kembali" value="<?php echo $pel['tgl_kembali']?>"></label>
        </p>
            <label>Total harga : <input type="text" name="tot_harga" value="<?php echo $pel['tot_hrg']?>"></label>
        </p>
            <label>Denda : <input type="text" name="denda" value="<?php echo $pel['denda']?>"></label>
        </p>
        <input type="submit" name="simpan" value="simpan">
    </form>
</body>

</html>