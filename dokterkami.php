<?php
// Data dokter statis
$dokter = [
    [
        "nama" => "Dr.Dewa Prasetyo, Sp.THT",
        "lulusan" => "Universitas Indonesia",
        "gambar" => "img/DoketerDewa.jpg"
    ],
    [
        "nama" => "Dr. Dimas Prakoso, Sp.THT",
        "lulusan" => "Universitas Gadjah Mada",
        "gambar" => "img/DokterRizki.jpg"
    ],
    [
        "nama" => "Dr. Agung Darajat, Sp.THT",
        "lulusan" => "Universitas Airlangga",
        "gambar" => "img/Dokter agung.jpg"
    ],
    [
        "nama" => "Dr. Arief Nugroho, Sp.THT",
        "lulusan" => "Universitas Padjadjaran",
        "gambar" => "img/DokterArife.jpg"
    ],
    [
        "nama" => "Dr. Budi Hartanto F Sp.THT",
        "lulusan" => "Universitas Diponegoro",
        "gambar" => "img/Dokterbudi.jpg"
    ],
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Dokter - klinikHarmoni</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1fdf4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #2f7d32;
        }

        .logo span {
            color: #4caf50;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #2f7d32;
            font-weight: 500;
        }

        .nav-links li a:hover {
            color: #66bb6a;
        }

        #searchInput {
            padding: 7px 14px;
            border-radius: 20px;
            border: 1px solid #ccc;
            outline: none;
        }

        .judul {
            text-align: center;
            margin: 40px 0 20px;
            font-size: 26px;
            color: #2e7d32;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 30px;
            max-width: 900px;
            margin: auto;
            padding: 0 20px 60px;
        }

        .card {
            display: flex;
            gap: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            align-items: center;
        }

        .card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid #c8e6c9;
        }

        .info h2 {
            margin: 0 0 8px;
            font-size: 18px;
            color: #2e7d32;
        }

        .info p {
            margin: 0;
            color: #555;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">klinik<span>Harmoni</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#" onclick="history.back()">Kembali</a></li>
        </ul>
        <input type="text" id="searchInput" placeholder="Cari Dokter...">
    </nav>

    <h1 class="judul">Data Dokter</h1>

    <div class="container" id="dokterList">
        <?php foreach ($dokter as $d) : ?>
            <div class="card">
                <img src="<?= $d['gambar']; ?>" alt="<?= $d['nama']; ?>">
                <div class="info">
                    <h2><?= $d['nama']; ?></h2>
                    <p>Lulusan: <?= $d['lulusan']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const cards = document.querySelectorAll(".card");

        searchInput.addEventListener("keyup", function() {
            const keyword = this.value.toLowerCase();
            cards.forEach(card => {
                const name = card.querySelector("h2").textContent.toLowerCase();
                card.style.display = name.includes(keyword) ? "flex" : "none";
            });
        });
    </script>
</body>

</html>