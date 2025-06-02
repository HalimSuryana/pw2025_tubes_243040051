<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $gejala = $_POST['gejala'];
    

    $queryCount = "SELECT COUNT(*) as total FROM data_pasien";
    $result = $koneksi->query($queryCount);
    $row = $result->fetch_assoc();
    $totalPasien = $row['total'];
    $id_dokter = ($totalPasien % 3) + 1;

    $mysqli = "INSERT INTO data_pasien (nama, alamat, no_telepon, jenis_kelamin, gejala, id_dokter)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($mysqli);
    $stmt->bind_param("sssssi", $nama, $alamat, $no_telpon, $jenis_kelamin, $gejala, $id_dokter);

    if ($stmt->execute()) {
        echo "<script>
            alert('Pendaftaran berhasil!');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Pendaftaran Pasien</title>
  <style>
    body {
      background-image: url('img/Bg_booking.png');
      background-size: cover;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #28a745;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Form Pendaftaran Pasien</h2>

    <form action="pendaftaran.php" method="POST">
      <label>Nama:</label>
      <input type="text" name="nama" required>

      <label>Alamat:</label>
      <textarea name="alamat" rows="2" required></textarea>

      <label>No. Telepon:</label>
      <input type="tel" name="no_telpon" required>

      <label>Jenis Kelamin:</label>
      <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
      <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan

      <label>Gejala / Keluhan:</label>
      <textarea name="gejala" rows="3" required></textarea>

      <button type="submit">Daftar</button>
    </form>
  </div>

</body>
</html>