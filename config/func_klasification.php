<?php
    require_once('connection.php');
?>

<?php
function getDataKlasifikasi($table_name)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM $table_name");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows[] = $row;
    }
    return $rows;
}

function getDataKlasifikasiWhere($table_name, $column, $value)
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

    if ($_GET['table'] == 'rc_klasifikasi') {
        $kode_j_c = $_POST['kode_j_c'];
        $nama_j_c = $_POST['nama_j_c'];
        $kode_d_j_c = $_POST['kode_d_j_c'];
        $nama_d_j_c = $_POST['nama_d_j_c'];

        $sql = "INSERT INTO `rc_klasifikasi` (`kode_j_c`, `nama_j_c`, `kode_d_j_c`, `nama_d_j_c`) VALUES ('$kode_j_c', '$nama_j_c', '$kode_d_j_c', '$nama_d_j_c')";
        mysqli_query($conn, $sql);
        if ($sql) {

            $_POST['kode_j_c'] = '';
            $_POST['nama_j_c'] = '';
            $_POST['kode_d_j_c'] = '';
            $_POST['nama_d_j_c'] = '';
            header("location:../p_vnklasifikasi.php");
        }
    }
}
?>