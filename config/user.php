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


function resetPassword($nip){
    global $conn; 
        $unip = $nip;     
        $sql = "UPDATE `rc_user` SET `password` = md5('$unip') WHERE `nip` = '$unip'";
        mysqli_query($conn, $sql);
        if ($sql) {
            return true;        
        }
        else {
            return false;
        }
}

?>