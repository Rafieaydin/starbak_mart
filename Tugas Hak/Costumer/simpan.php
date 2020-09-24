<?php
    include 'koneksi.php';
    if(isset($_POST['simpan'])){
    $no =$_POST['no'];
    $jenis =$_POST['jenis'];
    $nama =$_POST['nama'];
    $alamat =$_POST['alamat'];
    
    $sql = "INSERT INTO castomer(no_identitas,jenis_identitas,nama,alamat) VALUES('$no','$jenis','$nama','$alamat')";
    $query =mysqli_query($connect, $sql);

    if ($query){
        header('Location: tampil.php');
    }else{
        header('Location: simpan.php?status=gagal');
    }
}
?>