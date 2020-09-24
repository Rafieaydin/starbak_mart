<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_identitas = $_POST['no_identitas'];
    
    $sql = "UPDATE castomer SET nama='$nama', alamat='$alamat'
    WHERE no_identitas='$no_identitas'";
    
    $query = mysqli_query($connect, $sql);
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: sedit.php?status=gagal');
    }
}
?>
