<?php
require_once('connection.php');

function login($nip, $password){
    global $conn; 
		$unip = $nip;
		$upass = $password;		
		$sql = mysqli_query($conn,"SELECT * FROM rc_user WHERE nip='$unip' AND password=md5('$upass')");
		$cek = mysqli_num_rows($sql);
		if($cek > 0 ){
            $query = mysqli_fetch_array($sql);
            $_SESSION['status'] = "login";
            $_SESSION['id_user'] = $query['id'];
            $_SESSION['nip'] = $query['nip'];
            $_SESSION['nama_lengkap'] = $query['nama_lengkap'];
            $_SESSION['hak_akses'] = $query['hak_akses'];
			return true;		
        }
		else {
			return false;
		}
}


function register($username, $password, $email, $namaLengkap, $alamat)
{
    global $conn;
    if (empty($username) || empty($password) || empty($email) || empty($namaLengkap) || empty($alamat)) {
        return false;
    }
    $sql = mysqli_query($conn, "SELECT * FROM rc_user WHERE username='$username'");
    if (mysqli_num_rows($sql) > 0) {
        return false;
    }
    $pass = md5($password);
    $query = "INSERT INTO user (username, password, email, namaLengkap, alamat) VALUES ('$username', '$pass','$email', '$namaLengkap','$alamat')";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}
?>