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
    if (empty($result)) {
        $box[] = '';
        return $box;
    }
    
    while ($isi = mysqli_fetch_assoc($result) ) {
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

    if (empty($username and $email and $password) || empty($username) || empty($password) || empty($email)) {
        return $_SESSION['alertRegis'] = 'Data tidak boleh kosong';
    }
    if ($post['password'] != $post['password2']) {
        return $_SESSION['alertRegis'] = 'ulangi password anda';
    }

    $CekUser = query("SELECT * FROM users  WHERE role = 'user' and username = '$username'")[0];
    
    if (!empty($CekUser)) {
        return $_SESSION['alertRegis'] = 'Username sudah terdaftar';
    }

    $query = "INSERT INTO users VALUES('','$username','$email','$role','$password','$tanggal',NULL)";
    
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// fortgot password
function reset_password($post)
{
    global $conn;
    $username = htmlspecialchars($post['username']);
    $password_baru = password_hash($post['password_baru'], PASSWORD_DEFAULT);
    $password = htmlspecialchars($post['password']);
    if (empty($username  and $password and $password_baru) || empty($username) || empty($password) || empty($password_baru)) {
        return $_SESSION['alertReset'] = 'Data tidak boleh kosong';
    }
    if ($post['password_baru'] === $post['password'] ) {
        return $_SESSION['alertReset'] = 'Password baru anda tidak boleh sama';
    }

    $user = query("SELECT * FROM users WHERE username = '$username' WHERE role = 'user' and username = '$username'")[0];
    
    if (empty($user)) {
        return $_SESSION['alertReset'] = 'username tidak tersedia';
    }
    if (password_verify($password, $user['password'])) {
        $query = "UPDATE users SET password = '$password_baru' WHERE username = '$username'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        return $_SESSION['alertReset'] = 'password lama anda salah';
    }

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