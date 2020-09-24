<?php
include 'koneksi.php';
// include 'tampil.php';
    $id_film = $_GET['id'];
    $sql = "SELECT * FROM film WHERE kode_film='$id_film'";
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
    <h3>Form edit product</h3>
    <form action="sedit.php" method="post">
        <input type="hidden" name="kode_film" value="<?php echo $pel['kode_film']?>">
        <p>
            <label>kode_film : <input type="text" name="kode_film" value="<?php echo $pel['kode_film']?>"></label>
        </p>
        <p>
            <label>Jenis : <input type="text" name="jenis" value="<?php echo $pel['jenis']?>"></label>
        </p>
        <p>
            <label>Judul : <input type="text" name="judul" value="<?php echo $pel['judul']?>"></label>
        </p>
        <p>
            <label>Jml_keping : <input type="text" name="jml_keping" value="<?php echo $pel['jml_keping']?>"></label>
        </p>
        <p>
            <label>Jml_film : <input type="text" name="jml_film" value="<?php echo $pel['jml_film']?>"></label>
        </p>
        <input type="submit" name="simpan" value="simpan">
    </form>
</body>

</html>