<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");


if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}


if (!isset($_GET['id'])) {
  die("ID dokter tidak ditemukan.");
}

$id = intval($_GET['id']);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama_dokter = $_POST['nama_dokter'];
  $no_ruangan = $_POST['no_ruangan'];

  $query = "UPDATE dokter SET nama_dokter = ?, no_ruangan = ? WHERE id = ?";
  $stmt = $koneksi->prepare($query);
  $stmt->bind_param("ssi", $nama_dokter, $no_ruangan, $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "<script>alert('Data dokter berhasil diubah!'); window.location.href='admin.php';</script>";
  } else {
    echo "<script>alert('Tidak ada perubahan data.'); window.location.href='admin.php';</script>";
  }
  exit;
}


$query = "SELECT * FROM dokter WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dokter = $result->fetch_assoc();

if (!$dokter) {
  die("Data dokter tidak ditemukan.");
}
?>
<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");


if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

if (!isset($_GET['id'])) {
  die("ID pasien tidak ditemukan.");
}

$id = intval($_GET['id']);


$dokter_result = $koneksi->query("SELECT * FROM dokter");
$dokter_list = [];
while ($row = $dokter_result->fetch_assoc()) {
  $dokter_list[] = $row;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST['nama_pasien'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['no_telepon'];
  $dokter_id = $_POST['dokter_id'];

  $query = "UPDATE pasien SET nama_pasien = ?, alamat = ?, no_telepon = ?, dokter_id = ? WHERE id = ?";
  $stmt = $koneksi->prepare($query);
  $stmt->bind_param("sssii", $nama, $alamat, $telepon, $dokter_id, $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "<script>alert('Data pasien berhasil diubah!'); window.location.href='datapasien.php';</script>";
  } else {
    echo "<script>alert('Tidak ada perubahan data.'); window.location.href='datapasien.php';</script>";
  }
  exit;
}


$query = "SELECT * FROM pasien WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$pasien = $result->fetch_assoc();

if (!$pasien) {
  die("Data pasien tidak ditemukan.");
}
?>