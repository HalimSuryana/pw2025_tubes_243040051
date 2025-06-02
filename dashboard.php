<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik Harmoni</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-nav {
      flex-grow: 1;
    }

    @media (max-width: 991.98px) {
      .search-form {
        width: 100%;
        margin-top: 0.5rem;
      }
    }

    #result {
      border: 1px solid #ccc;
      max-height: 200px;
      overflow-y: auto;
      margin-top: 5px;
    }

    .result-item {
      padding: 8px;
      cursor: pointer;
    }

    .result-item:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">

      <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="#">
        <img src="img/logonav.png" alt="Logo" style="height: 11vh; width: auto;">
      </a>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#Home">Home</a>
          <a class="nav-link active" aria-current="page" href="pendaftaran.php">Daftar Pasien</a>
          <a class="nav-link active" aria-current="page" href="#">Informasi Penyakit</a>
          <a class="nav-link active" aria-current="page" href="#">Tentang Kami</a>
        </div>
      </div>
      <form action="logout.php" method="post" class="d-flex ms-auto">
        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
      </form>
    </div>
  </nav>

  <div class="container mt-3">
    <h3>Cari Dokter:</h3>
    <input type="text" class="form-control" id="search" placeholder="Ketik nama dokter...">
    <div id="result" class="shadow-sm bg-white rounded"></div>
  </div>

  <div class="container mt-5">
    <h1>Hallo Selamat Datang Di Web Klinik Harmoni Klinik THT</h1>

    <div class="d-flex justify-content-center mt-4">
      <div id="carouselExampleIndicators" class="carousel slide" style="max-width: 600px; width: 100%;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/slide.jpg" class="d-block w-100" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="Slide 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("search").addEventListener("keyup", function () {
      let query = this.value;
      if (query.length === 0) {
        document.getElementById("result").innerHTML = "";
        return;
      }

      fetch("search.php?q=" + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
          document.getElementById("result").innerHTML = data;
        });
    });
  </script>
</body>

</html>
