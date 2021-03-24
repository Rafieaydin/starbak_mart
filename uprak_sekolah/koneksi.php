<?php
$server = "localhost";
$user = "root";
$password = "";
$database  = "uprak_pwpb";
$conn = mysqli_connect($server, $user, $password, $database);

// untuk show
function query($query)
{
    
    global $conn;
    $result = mysqli_query($conn, $query);
    
    $box = [];
    while ($isi = mysqli_fetch_assoc($result)) {
        $box[] = $isi;
    }

    return $box;
}




// register
function register($post)
{
    global $conn;
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $role = 'user';
    $password = password_hash($post['password'], PASSWORD_DEFAULT);
    $tanggal = date("y/m/d H:i:s");

    $query = "INSERT INTO users VALUES('','$username','$email','$role','$password','$tanggal',NULL)";
    
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function tambahAdmin($post){
    global $conn;
    $nama = htmlspecialchars($post['nama']);
    $alamat = htmlspecialchars($post['alamat']);
    $foto = htmlspecialchars($post['foto']);
    $email = htmlspecialchars($post['email']);
    $nama_pemimin = htmlspecialchars($post['nama_pemimpin']);
    $deskripsi = htmlspecialchars($post['Deskripsi']);
    $tanggal = date("y/m/d H:i:s");
    
    $query = "INSERT INTO perusahaan 
    VALUES('','$nama','$alamat','$foto','$email','$nama_pemimin','$deskripsi','$tanggal',NULL)";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateAdmin($post)
{
    global $conn;
    $id = htmlspecialchars($post['id']);
    $nama = htmlspecialchars($post['nama']);
    $alamat = htmlspecialchars($post['alamat']);
    $foto = htmlspecialchars($post['foto']);
    $email = htmlspecialchars($post['email']);
    $nama_pemimin = htmlspecialchars($post['nama_pemimpin']);
    $deskripsi = htmlspecialchars($post['Deskripsi']);
    $tanggal = date("y/m/d H:i:s");

    $query = "UPDATE perusahaan SET
    nama = '$nama',
    alamat = '$alamat',
    foto = '$foto',
    email = '$email',
    nama_pemimpin = '$nama_pemimin',
    deskripsi_perusahaan = '$deskripsi',
    updated_at = '$tanggal'
    WHERE id = $id
    ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteAdmin($id)
{
    global $conn;
    $query = "DELETE FROM perusahaan WHERE id = $id";
    
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>