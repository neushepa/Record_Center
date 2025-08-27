<?php
session_start();
$getURL = $_SERVER['REQUEST_URI'];
if ($_SESSION['status'] != "login") {
    header("location:auth.php");
}

require_once('./config/connection.php');
require_once('./config/global_function.php');
require_once('./config/user.php');
?>

<?php
// 1. Insert ke A_Jenis_Arsip
$kategori   = $_POST['kategori'];
$kode_j_a   = $_POST['kode_j_a'];
$nama_j_a   = $_POST['nama_j_a'];

$sqlA = "INSERT INTO A_Jenis_Arsip (kategori, kode_j_a, nama_j_a) 
         VALUES ('$kategori', '$kode_j_a', '$nama_j_a')";
mysqli_query($conn, $sqlA);
$id_a = mysqli_insert_id($conn);

// 2. Insert ke B_Jenis_Arsip
$kode_j_b = $_POST['kode_j_b'];
$nama_j_b = $_POST['nama_j_b'];

$sqlB = "INSERT INTO B_Jenis_Arsip (id_a, kode_j_b, nama_j_b) 
         VALUES ('$id_a', '$kode_j_b', '$nama_j_b')";
mysqli_query($conn, $sqlB);
$id_b = mysqli_insert_id($conn);

// 3. Insert ke C_Jenis_Arsip
$kode_d_j_c = $_POST['kode_d_j_c'];
$nama_d_j_c = $_POST['nama_d_j_c'];

$sqlC = "INSERT INTO C_Jenis_Arsip (id_a, id_b, kode_j_c, nama_j_c) 
         VALUES ('$id_a', '$id_b', '$kode_d_j_c', '$nama_d_j_c')";
mysqli_query($conn, $sqlC);
$id_c = mysqli_insert_id($conn);

// 4. Insert ke klasifikasi_arsip
$kode_klasifikasi = $_POST['kode_klasifikasi'];
$keamanan         = $_POST['klasifikasi_keamanan'];
$akses_penentu    = isset($_POST['akses_penentu_kebijakan']) ? 1 : 0;
$akses_pelaksana  = isset($_POST['akses_pelaksana_kebijakan']) ? 1 : 0;
$akses_pengawas   = isset($_POST['akses_pengawas']) ? 1 : 0;
$akses_publik     = isset($_POST['akses_publik']) ? 1 : 0;
$akses_hukum      = isset($_POST['akses_penegak_hukum']) ? 1 : 0;
$akses_arsip      = isset($_POST['akses_kantor_arsip']) ? 1 : 0;

$hak_akses        = $_POST['hak_akses'];
$pertimbangan     = $_POST['dasar_pertimbangan'];
$dasar_hukum      = $_POST['dasar_hukum'];
$unit_utama       = $_POST['unit_pengolah_utama'];
$unit_pendukung   = $_POST['unit_pengolah_pendukung'];
$aktif            = $_POST['jangka_waktu_aktif'];
$inaktif          = $_POST['jangka_waktu_inaktif'];
$keterangan       = $_POST['keterangan'];

$sqlK = "INSERT INTO klasifikasi_arsip (
            id_c, kode_klasifikasi, klasifikasi_keamanan,
            akses_penentu_kebijakan, akses_pelaksana_kebijakan, akses_pengawas,
            akses_publik, akses_penegak_hukum, akses_kantor_arsip,
            hak_akses, dasar_pertimbangan, dasar_hukum,
            unit_pengolah_utama, unit_pengolah_pendukung,
            jangka_waktu_aktif, jangka_waktu_inaktif, keterangan
         ) VALUES (
            '$id_c', '$kode_klasifikasi', '$keamanan',
            '$akses_penentu', '$akses_pelaksana', '$akses_pengawas',
            '$akses_publik', '$akses_hukum', '$akses_arsip',
            '$hak_akses', '$pertimbangan', '$dasar_hukum',
            '$unit_utama', '$unit_pendukung',
            '$aktif', '$inaktif', '$keterangan'
         )";

mysqli_query($conn, $sqlK);

echo "<script>alert('Data arsip berhasil disimpan!'); window.location.href='form_klasifikasi.php';</script>";
mysqli_close($conn);
?>