 <div id="main-content">
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Daftar Pengguna Aplikasi</h3>
                 <p class="text-subtitle text-muted">
                     Halaman untuk mengelola data pengguna aplikasi Record Center
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
                 <table class="table table-striped" id="table1">
                     <thead>
                         <tr>
                             <th>NIP</th>
                             <th>Nama Lengkap</th>
                             <th>Jabatan</th>
                             <th>Hak Akses</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?php echo $row['nip']; ?></td>
                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                    <td><?php echo $row['jabatan']; ?></td>
                                    <td><?php echo $row['hak_akses']; ?></td>
                                    <td>
                                        <a href="p_edituser.php?nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="s_deleteuser.php?nip=<?php echo $row['nip']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </section>
 </div>