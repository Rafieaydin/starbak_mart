<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: tampil.php');
}
    $kode_film = $_GET['id'];
    
    $sql = "DELETE FROM film WHERE kode_film ='$kode_film'";
    
    $query = mysqli_query($connect, $sql);
    
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: hapus.php?status=gagal');
    }
?>