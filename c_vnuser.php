 <div id="main-content">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Input Baru Pengguna Aplikasi</h3>
                 <p class="text-subtitle text-muted">
                        Halaman untuk menambahkan data pengguna aplikasi Record Center
                 </p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                         <li class="breadcrumb-item" aria-current="page">User</li>
                         <li class="breadcrumb-item active" aria-current="page">View</li>
                     </ol>
                 </nav>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">
             <div class="card-body">
                <div class="row">
                    <form action="config/global_function.php?action=insert&table=rc_user" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hak_akses" class="form-label">Hak Akses</label>
                            <select class="form-select" id="hak_akses" name="hak_akses" required>
                                <option value="">Pilih Hak Akses</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
         </div>
     </section>
 </div>