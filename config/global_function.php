<?php
require_once('connection.php');

function getData($table_name)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM $table_name");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getDataWhere($table_name, $column, $value)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM $table_name WHERE $column='$value'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

if (isset($_GET['action']) && $_GET['action'] == 'insert') {

    /* Table rc_user */

    if ($_GET['table'] == 'rc_user') {
        $nip = $_POST['nip'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jabatan = $_POST['jabatan'];
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];

        $sql = "INSERT INTO `rc_user` (`nip`, `nama_lengkap`, `jabatan`, `password`, `hak_akses`) VALUES ('$nip', '$nama_lengkap', '$jabatan', md5($nip), '$hak_akses')";
        mysqli_query($conn, $sql);
        if ($sql) {

            $_POST['nip'] = '';
            $_POST['nama_lengkap'] = '';
            $_POST['jabatan'] = '';
            $_POST['password'] = '';
            $_POST['hak_akses'] = '';
            header("location:../p_vuser.php");
        }
    }
}

// Update data
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    if ($_GET['table'] == 'rc_user') {

        $nip = $_POST['nip'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jabatan = $_POST['jabatan'];
        $hak_akses = $_POST['hak_akses'];
        $sql = "UPDATE `rc_user` SET `nip` = '$nip', `nama_lengkap` = '$nama_lengkap', `jabatan` = '$jabatan', `hak_akses` = '$hak_akses' WHERE `nip` = '$nip'";
        mysqli_query($conn, $sql);

        if ($sql) {
            header("location:../p_vuser.php");
        }
    }
}

// Delete data
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if ($_GET['table'] == 'rc_user') {      
        $nip = $_POST['nip'];
        $sql = "DELETE FROM `rc_user` WHERE `nip` = '$nip'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../p_vuser.php");
        }
    }

    if ($_GET['table'] == 'user') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `user` WHERE `id` = '$id'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../p_vuser.php");
        }
    }

    if ($_GET['table'] == 'peminjaman') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `peminjaman` WHERE `id` = '$id'";
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:../p_vuser.php");
        }
    }
}
