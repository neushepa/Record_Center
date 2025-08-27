 <div id="main-content">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Input Klasifikasi Arsip</h3>
                 <p class="text-subtitle text-muted">
                     Halaman untuk mengelola data klasifikasi arsip.
                 </p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                         <li class="breadcrumb-item" aria-current="page">Klasifikasi</li>
                         <li class="breadcrumb-item active" aria-current="page">Input Baru</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">
             <div class="card-body">
                 <form method="POST" action="s_klasifikasi.php">
                     <div class="row">
                         <!-- Kolom Kiri -->
                         <div class="col-md-6">
                             <div class="mb-3">
                                 <label for="kategori" class="form-label">Kategori Arsip</label>
                                 <select name="kategori" id="kategori" class="form-select" required>
                                     <option value="">-- Pilih --</option>
                                     <option value="Substantif">Substantif</option>
                                     <option value="Fasilitatif">Fasilitatif</option>
                                 </select>
                             </div>
                             <!-- Klasifikasi level 0 -->
                             <div class="row mb-3">

                                 <div class="col-md-4">
                                     <label for="kode_j_a" class="form-label">Kode Jenis Arsip</label>
                                     <input type="text" name="kode_j_a" id="kode_j_a" class="form-control" required>
                                 </div>

                                 <div class="col-md-8">
                                     <label for="nama_j_a" class="form-label">Nama Jenis Arsip</label>
                                     <input type="text" name="nama_j_a" id="nama_j_a" class="form-control" required>
                                 </div>
                             </div>
                             <!-- Klasifikasi level 1 -->
                             <div class="row mb-3">
                                 <div class="col-md-4">
                                     <label for="kode_j_b" class="form-label">Kode Subjenis Arsip</label>
                                     <input type="text" name="kode_j_b" id="kode_j_b" class="form-control" required>
                                 </div>

                                 <div class="col-md-8">
                                     <label for="nama_j_b" class="form-label">Nama Subjenis Arsip</label>
                                     <input type="text" name="nama_j_b" id="nama_j_b" class="form-control" required>
                                 </div>
                             </div>
                             <!-- Klasifikasi level 2 -->
                             <div class="row mb-3">
                                 <div class="col-md-6">
                                     <label for="kode_d_j_c" class="form-label">Kode Detail Subjenis Arsip</label>
                                     <input type="text" name="kode_d_j_c" id="kode_d_j_c" class="form-control" required>
                                 </div>

                                 <div class="col-md-6">
                                     <label for="nama_d_j_c" class="form-label">Detail Subjenis Arsip</label>
                                     <input type="text" name="nama_d_j_c" id="nama_d_j_c" class="form-control" required>
                                 </div>
                             </div>
                            <!-- Kode Klasifikasi -->
                             <div class="mb-3">
                                 <label for="kode_klasifikasi" class="form-label">Kode Klasifikasi</label>
                                 <input type="text" name="kode_klasifikasi" id="kode_klasifikasi" class="form-control" autocomplete="off" required>
                             </div>

                             <h5>🔐 Keamanan & Hak Akses</h5>
                             <div class="mb-3">
                                 <label for="klasifikasi_keamanan" class="form-label">Klasifikasi Keamanan</label>
                                 <select name="klasifikasi_keamanan" id="klasifikasi_keamanan" class="form-select" required>
                                     <option value="Terbuka">Terbuka</option>
                                     <option value="Terbatas">Terbatas</option>
                                 </select>
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Hak Akses Pengguna</label><br>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_penentu_kebijakan" value="1" id="akses1">
                                     <label class="form-check-label" for="akses1">Penentu Kebijakan</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_pelaksana_kebijakan" value="1" id="akses2">
                                     <label class="form-check-label" for="akses2">Pelaksana Kebijakan</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_pengawas" value="1" id="akses3">
                                     <label class="form-check-label" for="akses3">Pengawas Internal/Eksternal</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_publik" value="1" id="akses4">
                                     <label class="form-check-label" for="akses4">Publik</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_penegak_hukum" value="1" id="akses5">
                                     <label class="form-check-label" for="akses5">Penegak Hukum</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" name="akses_kantor_arsip" value="1" id="akses6">
                                     <label class="form-check-label" for="akses6">Kantor Arsip</label>
                                 </div>
                             </div>


                         </div>

                         <!-- Kolom Kanan -->
                         <div class="col-md-6">
                             <div class="mb-3">
                                 <label for="hak_akses" class="form-label">Hak Akses Tambahan</label>
                                 <textarea name="hak_akses" id="hak_akses" class="form-control"></textarea>
                             </div>

                             <div class="mb-3">
                                 <label for="dasar_pertimbangan" class="form-label">Dasar Pertimbangan</label>
                                 <textarea name="dasar_pertimbangan" id="dasar_pertimbangan" class="form-control"></textarea>
                             </div>

                             <div class="mb-3">
                                 <label for="dasar_hukum" class="form-label">Dasar Hukum</label>
                                 <select name="dasar_hukum" id="dasar_hukum" class="form-select" required>
                                     <option value="Terbatas">Terbatas</option>
                                     <option value="Rahasia">Rahasia</option>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <label for="unit_pengolah_utama" class="form-label">Unit Pengolah Utama</label>
                                 <textarea name="unit_pengolah_utama" id="unit_pengolah_utama" class="form-control"> </textarea>
                             </div>

                             <div class="mb-3">
                                 <label for="unit_pengolah_pendukung" class="form-label">Unit Pengolah Pendukung</label>
                                 <textarea name="unit_pengolah_pendukung" id="unit_pengolah_pendukung" class="form-control"></textarea>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-md-6">
                                     <label for="jangka_waktu_aktif" class="form-label">Jangka Waktu Aktif (tahun)</label>
                                     <input type="number" name="jangka_waktu_aktif" id="jangka_waktu_aktif" class="form-control">
                                 </div>
                                 <div class="col-md-6">
                                     <label for="jangka_waktu_inaktif" class="form-label">Jangka Waktu Inaktif (tahun)</label>
                                     <input type="number" name="jangka_waktu_inaktif" id="jangka_waktu_inaktif" class="form-control">
                                 </div>
                             </div>

                             <div class="mb-3">
                                 <label for="keterangan" class="form-label">Keterangan JRA</label>
                                 <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                             </div>
                         </div>
                     </div>

                     <button type="submit" class="btn btn-primary mt-3">Simpan Arsip</button>
                 </form>
             </div>
         </div>
     </section>
 </div>