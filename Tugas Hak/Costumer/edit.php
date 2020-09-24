<?php
include 'koneksi.php';
// include 'tampil.php';
    $no = $_GET['id'];
    $sql = "SELECT * FROM castomer WHERE no_identitas='$no'";
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
    <h3>Form edit Costumer</h3>
    <form action="sedit.php" method="post">
        <input type="hidden" name="no_identitas" value="<?php echo $pel['no_identitas']?>">
        <p>
            <label>Nama : <input type="text" name="nama" value="<?php echo $pel['nama']?>"></label>
        </p>
        <p>
            <label>Alamat : <input type="text" name="alamat" value="<?php echo $pel['alamat']?>"></label>
        </p>
        <p>
        <input type="submit" name="simpan" value="simpan">
    </form>
</body>

</html>