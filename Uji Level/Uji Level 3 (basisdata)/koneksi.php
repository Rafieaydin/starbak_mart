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
    // var_dump($_SESSION);
    // print('jangan pamer eror blok');
    foreach ($_SESSION as $key => $value) { 
        $id = explode('.',$key)[1];
        $tanggal = date("y/m/d H:i:s");
        $getData = query("SELECT * FROM stockbarang WHERE id = $id");
        foreach ($getData as $keranjang) {
            (isset($total)) ? $total = $keranjang['harga'] * $value + $total : $total = $keranjang['harga'] * $value;
        }
    }
    $ppn = $total * 0.10;
    $discount = $total * 0.10;
    ($total > 10000) ? $total = $total + $discount - $ppn : $total = $total - $ppn;
    
    $JumlahBarang = array_sum($_SESSION);
    $query = "INSERT INTO belibarang VALUES(''," . (int)$JumlahBarang . "," . (int)$total . ",'$tanggal')";
    $a = mysqli_query($conn, $query);
    
    // input order barang
    $beli_id = mysqli_insert_id($conn); // mendapat id baru
    foreach ($_SESSION as $key => $value) {
        $id_barang = explode('.', $key)[1];
        $order = "INSERT INTO orderbarang VALUES('',".(int)$id_barang.",".(int)$beli_id.",".(int)$value.", '$tanggal')";
        mysqli_query($conn, $order);
    }
    return mysqli_affected_rows($conn);
}

// admin
function hapusAdmin($id)
{
    global $conn;
    $tanggal = date("y/m/d H:i:s");
    $query = "UPDATE stockbarang SET deleted_at='$tanggal'  WHERE id = $id";
    // $query = "DELETE FROM stockbarang WHERE id = $id";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function tambahAdmin($POST)
{
    global $conn;
    $gambar = htmlspecialchars($POST['gambar']);
    $nama = htmlspecialchars($POST['nama']);
    $stock = htmlspecialchars($POST['stock']);
    $harga =  htmlspecialchars($_POST['harga']); // harga benjadi int
    $tanggal = date("y/m/d");
    $query = "INSERT INTO stockbarang VALUES('','$nama',".(int)$harga.",".(int)$stock.",'$gambar','$tanggal',NULL)";
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
    $harga = htmlspecialchars($_POST['harga']); // harga benjadi int
    $tanggal = date("y/m/d");

    $query = "UPDATE stockbarang 
                SET nama='$nama',stock='$stock',gambar='$gambar',harga='$harga'
                WHERE id = $id";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


?>