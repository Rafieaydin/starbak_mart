<?php
$host       ="127.0.0.1";
$user       ="test";//user pada phpmyadmin
$password    ="123";
$database   ="tugas_hak";
$connect    =mysqli_connect($host,$user,$password,$database) or die("Gagal Menghubungkan");//untuk mengecek
?>