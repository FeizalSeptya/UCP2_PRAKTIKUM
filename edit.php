<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="index.php">List Karyawan</a>
                    </div>
                </div>
        </div>
    </nav>

    <?php
    include "./config.php";
    $id = $_GET['id'];
    $karyawan = mysqli_query($koneksi, "select * from karyawan where id='$id'");
    
    while ($data = mysqli_fetch_assoc($karyawan)) {
    ?>
        <div class="container mt-5">
        <p><a href="index.php">Home</a> / Edit Karyawan / <?php echo $data['nama']; ?></p>
        <div class="card">
            <div class="card-header">
            <p class="fw-bold">Profil Karyawan</p>
            </div>
            <div class="card-body fw-bold">
            <form action="update.php" method="post">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">No.KTP</label>
                    <input type="text" class="form-control" id="ktp" placeholder="Masukkan Nomor KTP" name="ktp" value="<?php echo $data['ktp']; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">No.Telp</label>
                    <input type="text" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon" name="telpon" value="<?php echo $data['telpon']; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">tahun masuk</label>
                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Masuk" name="tahun" value="<?php echo $data['tahun']; ?>">
                </div>
                <button type="submit" class="btn btn-dark" value="simpan">Update</button>
            </form>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>