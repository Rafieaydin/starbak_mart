<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $kode_sewa = $_POST['kode_sewa'];
    $no_identitas = $_POST['no_identitas'];
    $tgl_sewa = $_POST['tgl_sewa'];
    $tot_film = $_POST['tot_film'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $tot_hrg = $_POST['tot_harga'];
    $denda = $_POST['denda'];
    
    $sql = "UPDATE menyewa SET kode_sewa ='$kode_sewa', no_identitas='$no_identitas', tgl_sewa='$tgl_sewa',tot_film='$tot_film', tgl_kembali='$tgl_kembali',tot_hrg='$tot_hrg',denda='$denda'
    WHERE kode_sewa ='$kode_sewa'";
    
    $query = mysqli_query($connect, $sql);
    if($query){
        header('Location: tampil.php');
    }else{
        header('Location: sedit.php?status=gagal');
    }
}
?>
