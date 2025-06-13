<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_dokter'];
    $ruangan = $_POST['no_ruangan'];
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];


    if ($foto) {
        $lokasi = "img/" . $foto;
        move_uploaded_file($tmp, $lokasi);
    } else {
        $foto = ""; 
    }

    $query = "INSERT INTO dokter (nama_dokter, no_ruangan, gambar) VALUES ('$nama', '$ruangan', '$gambar')";
    if ($koneksi->query($query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container py-4">

    <h2>Tambah Dokter Baru</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No Ruangan</label>
            <input type="text" name="no_ruangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Dokter (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah Dokter</button>
        <a href="admin.php" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>
