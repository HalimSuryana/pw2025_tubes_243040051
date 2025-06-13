<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

if (!isset($_GET['id'])) {
  die("ID dokter tidak ditemukan.");
}

$id = intval($_GET['id']);

// Ambil data dokter berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM dokter WHERE id_dokter = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dokter = $result->fetch_assoc();

if (!$dokter) {
  die("Data dokter tidak ditemukan.");
}

// Proses saat form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama_dokter = $_POST['nama_dokter'];
  $no_ruangan = $_POST['no_ruangan'];

  $stmt = $koneksi->prepare("UPDATE dokter SET nama_dokter = ?, no_ruangan = ? WHERE id_dokter = ?");
  $stmt->bind_param("ssi", $nama_dokter, $no_ruangan, $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "<script>alert('Data dokter berhasil diubah!'); window.location.href='admin.php';</script>";
  } else {
    echo "<script>alert('Tidak ada perubahan data.'); window.location.href='admin.php';</script>";
  }
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Dokter</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0fdf4;
      padding: 20px;
    }

    h2 {
      color: #1b5e20;
    }

    .form-container {
      background-color: #ffffff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 128, 0, 0.1);
      width: 400px;
      margin: auto;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #2e7d32;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #43a047;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #388e3c;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Edit Dokter</h2>
    <form method="POST">
      <label>Nama Dokter:</label>
      <input type="text" name="nama_dokter" value="<?php echo htmlspecialchars($dokter['nama_dokter']); ?>" required>

      <label>No Ruangan:</label>
      <input type="text" name="no_ruangan" value="<?php echo htmlspecialchars($dokter['no_ruangan']); ?>" required>

      <input type="submit" value="Simpan Perubahan">
    </form>
  </div>

</body>
</html>
