<?php
function getCheckboxValue($key)
{
    return isset($_POST[$key]) ? 1 : 0;
}
?>
<div id="main-content">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Klasifikasi Arsip</h3>
                <p class="text-subtitle text-muted">
                    Halaman untuk melihat detail klasifikasi arsip
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Klasifikasi</li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Klasifikasi</th>
                            <th>Jenis Arsip</th>
                            <th>Keamanan</th>
                            <th>Unit Pengolah</th>
                            <th>JRA Aktif</th>
                            <th>JRA Inaktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT k.id, k.kode_klasifikasi, c.nama_j_c AS jenis_arsip, k.klasifikasi_keamanan, k.unit_pengolah_utama, k.jangka_waktu_aktif, k.jangka_waktu_inaktif, k.akses_penentu_kebijakan, k.akses_pelaksana_kebijakan, k.akses_pengawas, k.akses_publik, k.akses_penegak_hukum, k.akses_kantor_arsip, k.keterangan FROM klasifikasi_arsip k JOIN C_Jenis_Arsip c ON k.id_c = c.id_c";

                        $result = mysqli_query($conn, $query);
                        $data = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                        foreach ($data as $row) {
                        ?>

                            <tr>
                                <td><?= $row['kode_klasifikasi']; ?></td>
                                <td><?= $row['jenis_arsip']; ?></td>
                                <td><?= $row['klasifikasi_keamanan']; ?></td>
                                <td><?= $row['unit_pengolah_utama']; ?></td>
                                <td><?= $row['jangka_waktu_aktif']; ?></td>
                                <td><?= $row['jangka_waktu_inaktif']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $row['id']; ?>">Detail</button>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
                <?php foreach ($data as $row): ?>
                    <div class="modal fade" id="modalDetail<?= $row['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $row['id'] ?>">Detail Arsip: <?= $row['kode_klasifikasi'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm table-bordered">
                                        <tr>
                                            <th>Jenis Arsip</th>
                                            <td><?= $row['jenis_arsip'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Keamanan</th>
                                            <td><?= $row['klasifikasi_keamanan'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Unit Pengolah</th>
                                            <td><?= $row['unit_pengolah_utama'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>JRA Aktif</th>
                                            <td><?= $row['jangka_waktu_aktif'] ?> tahun</td>
                                        </tr>
                                        <tr>
                                            <th>JRA Inaktif</th>
                                            <td><?= $row['jangka_waktu_inaktif'] ?> tahun</td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <td><?= $row['keterangan'] ?? '-' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Hak Akses Pengguna</th>
                                            <td>
                                                <?php
                                                $akses = [];
                                                if ($row['akses_penentu_kebijakan']) $akses[] = "Penentu Kebijakan";
                                                if ($row['akses_pelaksana_kebijakan']) $akses[] = "Pelaksana Kebijakan";
                                                if ($row['akses_pengawas']) $akses[] = "Pengawas";
                                                if ($row['akses_publik']) $akses[] = "Publik";
                                                if ($row['akses_penegak_hukum']) $akses[] = "Penegak Hukum";
                                                if ($row['akses_kantor_arsip']) $akses[] = "Kantor Arsip";

                                                if ($akses) {
                                                    foreach ($akses as $label) {
                                                        echo "<span class='badge bg-success me-1'>$label</span>";
                                                    }
                                                } else {
                                                    echo "<span class='text-muted'>Tidak ada akses aktif</span>";
                                                }
                                                ?>

                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</div>