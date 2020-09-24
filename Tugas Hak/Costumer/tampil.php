<?php
include 'koneksi.php';
?>

<html>
    <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Data product</title>
        
    <link rel="stylesheet" type="text/css" href="tampil.css">
    </head>
    <body>
        <center>
    <div class="container">
        <h3 class="text">Data product</h3>
        <h4 class="text"><a href="ke.html">[+] Tambah baru</a></h4>
        <table border='1'  class="tabel">
        <tr>
            <th>no_identitas</th>
            <th>jenis_identitass</th>
            <th>nama</th>
            <th>alamat</th>
            <th>Action</th>
        </tr>
</div> 
</center>
        <?php
            $sql ="SELECT * FROM castomer";
            $query =mysqli_query($connect,$sql);
            while($pel =mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$pel['no_identitas']."</td>";
                echo "<td>".$pel['jenis_identitas']."</td>";
                echo "<td>".$pel['nama']."</td>";
                echo "<td>".$pel['alamat']."</td>";
                
                echo "<td>";
                echo "<a href='edit.php?id=".$pel['no_identitas']."'> Edit</a> | ";
                echo "<a href='hapus.php?id=".$pel['nama']."'>Hapus</a> ";


                echo"</td>";
                echo "</tr>";
            }
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>