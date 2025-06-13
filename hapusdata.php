<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Cek apakah ID valid
    $stmt = $koneksi->prepare("DELETE FROM dokter WHERE id_dokter = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: admin.php?pesan=hapus_sukses");
    exit;
} else {
    header("Location: admin.php?pesan=hapus_gagal");
    exit;
}
