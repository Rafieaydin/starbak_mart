<?php
    include 'koneksi.php';
    if(isset($_POST['simpan'])){
    $kode_sewa =$_POST['kode_sewa'];
    $no_identitas =$_POST['no_identitas'];
    $tgl_sewa =$_POST['tgl_sewa'];
    $tot_film =$_POST['tot_film'];
    $tgl_kembali =$_POST['tgl_kembali'];
    
    
    $sql = "INSERT INTO menyewa(kode_sewa,no_identitas,tgl_sewa,tot_film,tgl_kembali) VALUES('$kode_sewa','$no_identitas','$tgl_sewa','$tot_film','$tgl_kembali')";
    $query =mysqli_query($connect, $sql);

    if ($query){
        header('Location: tampil.php');
    }else{
        header('Location: simpan.php?status=gagal');
    }
}
?>