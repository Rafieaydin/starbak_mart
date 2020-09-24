<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: tampil.php');
}
    $kode_sewa = $_GET['id'];
    
    $sql = "DELETE FROM menyewa WHERE kode_sewa ='$kode_sewa'";
    
    $query = mysqli_query($connect, $sql);
    
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: hapus.php?status=gagal');
    }
?>