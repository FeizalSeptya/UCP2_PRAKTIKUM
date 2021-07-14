<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <title>Data Karyawan</title>
    <style>
    body {
    margin: 0;
    padding: 0;
    background: #a8a8a8 ;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: sans-serif;
  }
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                    </div>
                </div>
        </div>
    </nav>
    <div class="container data-mahasiswa mt-5">
        <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
            Tambah Data</button>
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="create.php" name="form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="Nomor KTP" class="form-label">No.KTP</label>
                                <input type="number" class="form-control" id="ktp" placeholder="Masukkan Nomor KTP" name="ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="Nomor Telpon" class="form-label">No.Telp</label>
                                <input type="number" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon" name="telpon" required>
                            </div>
                            <div class="mb-3">
                                <label for="Tahun Masuk" class="form-label">tahun masuk</label>
                                <input type="number" class="form-control" id="tahun" placeholder="Masukkan Tahun Masuk" name="tahun" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped" id="tabelMahasiswa">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor KTP</th>
                <th scope="col">Nomor Telpon</th>
                <th scope="col">Tahun Masuk</th>
                <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Memanggil config.php yang sudah kita buat
                include 'config.php';
                // Membuat variabel untuk nomor karyawan yang akan diincrement
                $no = 1;
                // Melakukan query
                $karyawan = mysqli_query($koneksi, "select * from karyawan");
                //Looping data mahasiswa
                while ($data = mysqli_fetch_array($karyawan)) {
                ?>
                    <!-- Menampilkan data karyawan ke dalam tabel -->
                    <tr>
                        <!-- Increment nomor baris $no++ -->
                        <td><?php echo $no++; ?></td>
                        <!-- Menampilkan data -->
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['ktp']; ?></td>
                        <td><?php echo $data['telpon']; ?></td>
                        <td><?php echo $data['tahun']; ?></td>
                        <!-- Kolom ini untuk aksi data karyawan -->
                        <td>
                            <!-- Aksi Edit Dan Delete, di sini menggunakan btn-sm agar tombolnya kecil -->
                            <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-dark btn-sm text-white">DETAIL</a>
                            <!-- Link untuk masuk ke halaman edit -->
                            <!-- edit.php?id=<
                            ?php echo $data['id']; ?> Mengirimkan id dari data mahasiswa ke halaman edit -->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-dark btn-sm text-white">EDIT</a>
                            <!-- Link untuk delete berdasarkan id, akan keluar confirm terlebih dahulu -->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Anda yakin Akan Menghapus Data Karyawan Ini?')">HAPUS</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <div class="footer container-fluid bg-dark">
            </div>
          </div>
        </div>
     </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>    
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable();
        } );
    </script>
</body>

</html>