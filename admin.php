<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$query_dokter = "SELECT * FROM dokter";
$result_dokter = $koneksi->query($query_dokter);
$dokter = [];
if ($result_dokter && $result_dokter->num_rows > 0) {
  while ($row = $result_dokter->fetch_assoc()) {
    $dokter[] = $row;
  }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Halaman Admin</title>
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
          <a class="nav-link" href="#">Pricing</a>
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </div>
        <form action="login.php" method="post" class="d-flex ms-auto">
          <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
      </div>
    </div>
  </nav>

  <div class="container">

    <h1>Daftar Dokter</h1>
    <table class="table table-striped table-hover table-bordered">
      <thead class="table-success">
        <tr>
          <th>NO</th>
          <th>Nama Dokter</th>
          <th>No Ruangan</th>
          <th>Foto</th>
          <th>Hapus/Ganti</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $foto_dokter = [
          'img/foto_dokter1.png',
          'img/foto_dokter3.png',
          'img/foto_dokter2.png',
        ];
        ?>
        <?php foreach ($dokter as $i => $mhs): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($mhs['nama_dokter']) ?></td>
            <td><?= htmlspecialchars($mhs['no_ruangan']) ?></td>
            <td>
              <?php
              $foto = isset($foto_dokter[$i]) ? $foto_dokter[$i] : 'img/default.png';
              ?>
              <img src="<?= $foto ?>" width="60" alt="Foto Dokter <?= htmlspecialchars($mhs['nama_dokter']) ?>">
            </td>
            <td>
              <a href="edit.php" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengubah data dokter ini?')">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="hapus.php" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data dokter ini? Data yang dihapus tidak dapat dikembalikan.')">
                <i class="bi bi-trash-fill"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>