<?php
    include 'koneksi.php';
    if(isset($_POST['simpan'])){
    $kode =$_POST['kode_film'];
    $jenis =$_POST['jenis'];
    $judul =$_POST['judul'];
    $jml_kep =$_POST['jml_keping'];
    $jml_fil =$_POST['jml_film'];
    
    
    $sql = "INSERT INTO film(kode_film,jenis,judul,jml_keping,jml_film) VALUES('$kode','$jenis','$judul','$jml_kep','$jml_fil')";
    $query =mysqli_query($connect, $sql);

    if ($query){
        header('Location: tampil.php');
    }else{
        header('Location: simpan.php?status=gagal');
    }
}
?>