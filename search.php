<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");

if (isset($_GET['q'])) {
    $cari = $koneksi->real_escape_string($_GET['q']);

    $query = "SELECT nama_dokter FROM dokter WHERE nama_dokter LIKE '%$cari%' LIMIT 10";
    $hasil = $koneksi->query($query);

    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) {
            echo "<div class='result-item'>{$row['nama_dokter']}</div>";
        }
    } else {
        echo "<div class='result-item'>Tidak ditemukan</div>";
    }
}
?>