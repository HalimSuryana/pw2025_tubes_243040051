<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Artikel THT - KitaSehat</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #f4fdf5;
      color: #333;
      line-height: 1.6;
    }

    header {
      background-color: #ffffff;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 8px 24px rgba(46, 125, 50, 0.2);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      font-size: 26px;
      font-weight: 700;
      color: #2e7d32;
    }

    .logo span {
      color: #66bb6a;
    }

    nav a {
      margin-left: 20px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #2e7d32;
    }

    .login-btn {
      border: 2px solid #2e7d32;
      padding: 6px 16px;
      border-radius: 20px;
      color: #2e7d32;
      font-weight: bold;
      text-decoration: none;
      margin-left: 20px;
      transition: all 0.3s ease;
    }

    .login-btn:hover {
      background-color: #2e7d32;
      color: white;
    }

    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 0 20px;
    }

    h1 {
      font-size: 36px;
      text-align: center;
      margin-bottom: 20px;
      color: #2e7d32;
    }

    /* Search Bar */
    .search-container {
      text-align: center;
      margin-bottom: 30px;
    }

    .search-container input {
      padding: 10px 16px;
      width: 80%;
      max-width: 500px;
      border: 2px solid #2e7d32;
      border-radius: 20px;
      outline: none;
    }

    .article {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 40px;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    }

    .article img {
      max-width: 300px;
      width: 100%;
      height: auto;
      border-radius: 10px;
      object-fit: cover;
    }

    .article-content {
      flex: 1;
    }

    .article-content h2 {
      font-size: 22px;
      margin-bottom: 10px;
      color: #388e3c;
    }

    .article-content p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .article-content a {
      display: inline-block;
      margin-top: 5px;
      color: #2e7d32;
      font-weight: bold;
      text-decoration: none;
    }

    .article-content a:hover {
      text-decoration: underline;
    }

    hr {
      border: none;
      border-top: 1px solid #ddd;
      margin: 20px 0;
    }

    @media (max-width: 768px) {
      .article {
        flex-direction: column;
        align-items: center;
      }

      .article img {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="logo">Kita<span>Sehat.</span></div>
  <nav>
    <a href="index.php">Beranda</a>
    <a href="#">Tentang</a>
    <a href="artikel.php">Artikel</a>
    <a href="#">Kontak</a>
    <a href="logout.php" class="login-btn">Logout</a>
  </nav>
</header>

<div class="container">
  <h1>Artikel Kesehatan THT</h1>

  <!-- Live Search -->
  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Cari artikel...">
  </div>

  <!-- Artikel 1 -->
  <div class="article">
    <img src="img/artikel1.jpg" alt="Ilustrasi THT">
    <div class="article-content">
      <h2>Kenali Masalah Umum THT dan Cara Mencegahnya</h2>
      <p>Telinga, hidung, dan tenggorokan adalah organ yang saling terhubung dan rentan terhadap infeksi. Artikel ini membahas gejala umum seperti pilek berkepanjangan, infeksi telinga, hingga sakit tenggorokan yang sering terjadi.</p>
      <a href="#">Baca Selengkapnya...</a>
    </div>
  </div>

  <!-- Artikel 2 -->
  <div class="article">
    <img src="img/artikel2.jpg" alt="Ilustrasi pemeriksaan hidung">
    <div class="article-content">
      <h2>Pentingnya Pemeriksaan THT Secara Berkala</h2>
      <p>Seringkali gangguan THT dianggap sepele. Padahal, pemeriksaan rutin dapat membantu mendeteksi masalah lebih awal, terutama bagi penderita alergi, sinusitis, dan gangguan pendengaran.</p>
      <a href="#">Baca Selengkapnya...</a>
    </div>
  </div>

  <!-- Artikel 3 -->
  <div class="article">
    <img src="img/artikel3.jpg" alt="Dokter THT sedang memeriksa pasien">
    <div class="article-content">
      <h2>Kapan Harus ke Dokter Spesialis THT?</h2>
      <p>Jangan tunda memeriksakan diri jika Anda mengalami gangguan suara, bau mulut yang menetap, mimisan, atau vertigo. Simak panduan lengkap kapan sebaiknya mengunjungi dokter THT.</p>
      <a href="#">Baca Selengkapnya...</a>
    </div>
  </div>

</div>

<!-- Live Search Script -->
<script>
  const searchInput = document.getElementById('searchInput');
  const articles = document.querySelectorAll('.article');

  searchInput.addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    articles.forEach(article => {
      const text = article.innerText.toLowerCase();
      article.style.display = text.includes(keyword) ? 'flex' : 'none';
    });
  });
</script>

</body>
</html>
