<?php
$koneksi = new mysqli("localhost", "root", "", "klinik_harmoni");
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $koneksi->query("DELETE FROM dokter WHERE id = $id");
}
header("Location: admin.php");
exit;