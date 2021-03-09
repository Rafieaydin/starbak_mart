<?php
require '../koneksi.php';
session_start();
if (isset($_GET['session'])) {
    $getId = explode('.', $_GET['session'])[1];
    $getStock = query("SELECT stock FROM stockbarang WHERE id = '$getId'")[0];
    if (isset($_SESSION[$_GET['session']])) {
        if ($_SESSION[$_GET['session']] < $getStock['stock']) {
            $_SESSION[$_GET['session']]++;
            $berhasil = 'berhasil';
            echo json_encode($berhasil);
        }else {
            $gagal = 'gagal';
            echo json_encode($gagal);
        }
    }
    else if($getStock['stock']<1)
    {
        $gagal = 'gagal';
        echo json_encode($gagal);
    }
    else{
        $_SESSION[$_GET['session']] = 1;
        $berhasil = 'berhasil';
        echo json_encode($berhasil);
    }
}
?>