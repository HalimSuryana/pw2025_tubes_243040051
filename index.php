<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Klinik Harmoni</title>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>

  <header data-aos="fade-down">
    <div class="logo">klinik<span>Harmoni</span></div>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="#about">Tentang</a>
      <a href="artikel.php">Artikel</a>
      <a href="pendaftaran.php">Daftar Pasien</a>
      <a href="logout.php" class="login-btn">Logout</a>
    </nav>
  </header>

  <section class="hero" data-aos="fade-up">
    <h1>Menjaga Telinga, Hidung,<span>dan Tenggorokan Anda Tetap Harmonis</span></h1>
    <p>Kesehatan Anda, Prioritas Kami</p>
  </section>

  <section id="about">
    <section class="about" data-aos="fade-right">
      <h1><span>About</span> Us</h1>
      <div class="about-content" data-aos="fade-left" data-aos-delay="300">
        <p><strong>Selamat datang di Website klinik harmoni!</strong></p>
        <p>
          Klinik Harmoni adalah pusat layanan kesehatan Telinga, Hidung, dan Tenggorokan (THT) yang berkomitmen memberikan perawatan terbaik dengan sentuhan profesional dan empati. Berdiri dengan semangat melayani, kami menghadirkan suasana klinik yang nyaman, ramah, dan mudah diakses oleh semua kalangan.
        </p>
        <p>
          Dengan dukungan dokter spesialis THT berpengalaman serta fasilitas yang memadai, Klinik Harmoni siap membantu Anda dalam menangani berbagai keluhan kesehatan secara cepat, tepat, dan terpercaya.
        </p>
        <p>
          Kami percaya bahwa kesehatan adalah harmoni antara tubuh, pikiran, dan pelayanan. Karena itu, Klinik Harmoni hadir untuk menjadi bagian dari solusi kesehatan Anda!
        </p>
      </div>
    </section>
  </section>

  <section class="kontak" id="kontak">
    <h1 data-aos="fade-up">Dokter Kami</h1>
    <div class="dokter-list">
      <div class="card" data-aos="flip-left" data-aos-delay="100">
        <img src="img/DoketerDewa.jpg" alt="Dr. Muhammad Ali">
        <h3>Dr. Dewa Prasetyo, Sp.THT</h3>
        <p>Dokter THT</p>
        <a href="dokterkami.php" class="btn-hubungi">Lihat Detail</a>
      </div>

      <div class="card" data-aos="flip-left" data-aos-delay="200">
        <img src="img/DokterRizki.jpg" alt="Dr. Masduki">
        <h3>Dr. Dimas Prakoso, Sp.THT</h3>
        <p>Dokter THT</p>
        <a href="dokterkami.php" class="btn-hubungi">Lihat Detail</a>
      </div>

      <div class="card" data-aos="flip-left" data-aos-delay="300">
        <img src="img/Dokter agung.jpg" alt="Dr. Rahman">
        <h3>Dr. Agung Darajat, Sp.THT</h3>
        <p>Dokter THT</p>
        <a href="dokterkami.php" class="btn-hubungi">Lihat Detail</a>
      </div>

      <div class="card" data-aos="flip-left" data-aos-delay="400">
        <img src="img/DokterArife.jpg" alt="Dr. Siti">
        <h3>Dr. Arief Nugroho, Sp.THT</h3>
        <p>Dokter THT</p>
        <a href="dokterkami.php" class="btn-hubungi">Lihat Detail</a>
      </div>

      <div class="card" data-aos="flip-left" data-aos-delay="500">
        <img src="img/Dokterbudi.jpg" alt="Dr. Nur">
        <h3>Dr. Budi Hartanto F Sp.THT</h3>
        <p>Dokter THT</p>
        <a href="dokterkami.php" class="btn-hubungi">Lihat Detail</a>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3>Klinik Harmoni</h3>
        <p>Kesehatan Anda, Prioritas Kami</p>
        <p>Memberikan pelayanan kesehatan terbaik dengan fasilitas modern dan tenaga medis berpengalaman.</p>
      </div>
      <div class="footer-section">
        <h3>Kontak Kami</h3>
        <p>📍 Jl. Sehat Sejahtera No. 123, Bandung</p>
        <p>📞 (022) 1234-5678</p>
        <p>📧 info@klinikharmoni.com</p>
      </div>
      <div class="footer-section">
        <h3>Jam Operasional</h3>
        <p>Senin - Sabtu: 08.00 - 20.00</p>
        <p>Minggu: <strong>Tutup</strong></p>
      </div>
      <div class="footer-section">
        <h3>Ikuti Kami</h3>
        <p>
          <a href="#">🌐 Facebook</a><br>
          <a href="#">📷 Instagram</a><br>
          <a href="#">🐦 Twitter</a>
        </p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Klinik Harmoni. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>

</html>