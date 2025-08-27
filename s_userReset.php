<?php
session_start();
$getURL = $_SERVER['REQUEST_URI'];
if ($_SESSION['status'] != "login") {
	header("location:auth.php");
}
require_once('./config/connection.php');
require_once('./config/global_function.php');
require_once('./config/user.php');

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    if (resetPassword($nip)) {
        echo "Password berhasil direset untuk NIP: $nip";
        header("location:p_vuser.php");
    } else {
        echo "Gagal reset password.";
        header("location:p_vuser.php");
    }
} else {
    echo "NIP tidak ditemukan.";
}

?>