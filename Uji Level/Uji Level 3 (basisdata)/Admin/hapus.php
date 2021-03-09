<?php
require '../koneksi.php';
$id = $_GET['id'];
if (isset($_GET['id'])) {
    if (hapusAdmin($id) > 0) {
        echo ('halo');
        header('Location: index.php');
    } else {
        header('Location: index.php?eror');
    }


}

?>