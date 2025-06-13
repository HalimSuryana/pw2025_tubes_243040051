<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<h3 style='color:red;'>ID pasien tidak ditemukan di URL.</h3>";
  exit;
}

$id_pasien = intval($_GET['id']);

// Ambil data pasien
$stmt = $koneksi->prepare("SELECT * FROM data_pasien WHERE id_pasien = ?");
$stmt->bind_param("i", $id_pasien);
$stmt->execute();
$result = $stmt->get_result();
$pasien = $result->fetch_assoc();

if (!$pasien) {
  echo "<h3 style='color:red;'>Data pasien tidak ditemukan di database.</h3>";
  exit;
}

// Ambil daftar dokter
$dokter_result = $koneksi->query("SELECT * FROM dokter");

// Kalau form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_telepon = $_POST['no_telepon'];
  $gejala = $_POST['gejala'];
  $id_dokter = $_POST['id_dokter'];

  $stmt = $koneksi->prepare("UPDATE data_pasien SET nama=?, alamat=?, no_telepon=?, gejala=?, id_dokter=? WHERE id_pasien=?");
  $stmt->bind_param("ssssii", $nama, $alamat, $no_telepon, $gejala, $id_dokter, $id_pasien);
  $stmt->execute();

  echo "<script>alert('Data pasien berhasil diperbarui!'); window.location.href='datapasien.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Pasien</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f0f0f0;
      padding: 30px;
    }
    .form-box {
      max-width: 600px;
      background: white;
      margin: auto;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }
    input, textarea, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      background: #2e7d32;
      color: white;
      border: none;
      margin-top: 20px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background: #1b5e20;
    }
  </style>
</head>
<body>

<div class="form-box">
  <h2>Edit Data Pasien</h2>
  <form method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($pasien['nama']) ?>" required>

    <label>Alamat:</label>
    <textarea name="alamat" required><?= htmlspecialchars($pasien['alamat']) ?></textarea>

    <label>No Telepon:</label>
    <input type="text" name="no_telepon" value="<?= htmlspecialchars($pasien['no_telepon']) ?>" required>

    <label>Gejala:</label>
    <textarea name="gejala" required><?= htmlspecialchars($pasien['gejala']) ?></textarea>

    <label>Dokter:</label>
    <select name="id_dokter" required>
      <?php while ($dokter = $dokter_result->fetch_assoc()): ?>
        <option value="<?= $dokter['id_dokter'] ?>" <?= $dokter['id_dokter'] == $pasien['id_dokter'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($dokter['nama_dokter']) ?>
        </option>
      <?php endwhile; ?>
    </select>

    <input type="submit" value="Simpan Perubahan">
  </form>
</div>

</body>
</html>