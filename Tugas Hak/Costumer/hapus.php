<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: tampil.php');
}
    $no = $_GET['id'];
    
    $sql = "DELETE FROM castomer WHERE no_identitas ='$no'";
    
    $query = mysqli_query($connect, $sql);
    
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: hapus.php?status=gagal');
    }
?>