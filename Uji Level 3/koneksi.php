<?php
$server = "localhost";
$user = "root";
$password = "";
$database  = "uji_level";
$conn = mysqli_connect($server, $user, $password, $database);


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $box = [];
    while ($isi = mysqli_fetch_assoc($result)) {
        $box[] = $isi;
    }
    return $box;
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
function tambah($val){
    global $conn;
    foreach ($_SESSION as $key => $value) { 
        $id = explode('.',$key)[1];
        $tanggal = date("y/m/d H:i:s");
        $query = "INSERT INTO belibarang VALUES('',".(int)$id.",".(int)$value.",'$tanggal')";
        var_dump(mysqli_query($conn, $query));
    }
    return mysqli_affected_rows($conn);
}

// admin
function hapusAdmin($id)
{
    global $conn;
    $query = "DELETE FROM stockbarang WHERE id = $id";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function tambahAdmin($POST)
{
    global $conn;
    $gambar = htmlspecialchars($POST['gambar']);
    $nama = htmlspecialchars($POST['nama']);
    $stock = htmlspecialchars($POST['stock']);
    $harga = htmlspecialchars($POST['harga']);
    $query = "INSERT INTO stockbarang VALUES('','$nama',".(int)$stock.",".(int)$harga.",'$gambar')";
    var_dump($query);
    var_dump(mysqli_query($conn, $query));
    return mysqli_affected_rows($conn);
}

function updateAdmin($POST)
{
    global $conn;
    $id = htmlspecialchars($POST['id']);
    $gambar = htmlspecialchars($POST['gambar']);
    $nama = htmlspecialchars($POST['nama']);
    $stock = htmlspecialchars($POST['stock']);
    $harga = htmlspecialchars($POST['harga']);

    $query = "UPDATE stockbarang 
                SET nama='$nama',stock='$stock',gambar='$gambar',harga='$harga'
                WHERE id = $id";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>