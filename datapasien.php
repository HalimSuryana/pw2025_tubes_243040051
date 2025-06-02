<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query_data_pasien = "
  SELECT data_pasien.*, dokter.nama_dokter 
  FROM data_pasien
  JOIN dokter ON data_pasien.id_dokter = dokter.id_dokter
";
$result = $koneksi->query($query_data_pasien);

$data_pasien = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data_pasien[] = $row;
    }
} else {
    echo "Query gagal: " . $koneksi->error;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #007733;">
        <div class="container">
            <a class="navbar-brand" href="#">Halaman Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="admin.php">Data Dokter</a>
                    <a class="nav-link" href="datapasien.php">Data Pasien</a>
                     <a class="nav-link" href="dashboard.php">Dashboard</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">

        <h1>Daftar Pasien</h1>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Gejala/diagnosa</th>
                    <th>No telepon</th>
                    <th>Waktu Daftar</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_pasien as $i => $mhs): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($mhs['nama']) ?></td>
                        <td><?= htmlspecialchars($mhs['alamat']) ?></td>
                        <td><?= htmlspecialchars($mhs['jenis_kelamin']) ?></td>
                        <td><?= htmlspecialchars($mhs['gejala']) ?></td>
                        <td><?= htmlspecialchars($mhs['no_telepon']) ?></td>
                        <td><?= htmlspecialchars($mhs['waktu_daftar']) ?></td>
                        <td><?= htmlspecialchars($mhs['nama_dokter']) ?></td>
                        <td>
                            <a href="edit.php" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengedit data pasien ini?')">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapus.php" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>