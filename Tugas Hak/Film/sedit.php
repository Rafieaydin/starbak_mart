<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $kode_film = $_POST['kode_film'];
    $jenis = $_POST['jenis'];
    $judul = $_POST['judul'];
    $jml_keping = $_POST['jml_keping'];
    $jml_film = $_POST['jml_film'];
    
    
    $sql = "UPDATE film SET jenis ='$jenis', judul='$judul', jml_keping='$jml_keping', jml_film='$jml_film'
    WHERE kode_film ='$kode_film'";
    
    $query = mysqli_query($connect, $sql);
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: sedit.php?status=gagal');
    }
}
?>
