<?php
session_start();
require 'function.php'; 

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (isset($_SESSION['username']) && $_SESSION['username'] == $username) {
            $error = "Akun ini sudah login di sesi lain.";
        } else {
           
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        }
    } else {
        $error = "Username tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <title>Klinik Harmoini</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-image: url('img/bg_baru.png');
      /* background-size: cover; */
      background-position: center;
      margin: 0;
      padding: 0;
    }

    p {
      text-align: center;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .login-box {
      width: 90%;
      max-width: 400px;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
      text-align: center;
    }

    .login-box img {
      width: 170px;
      margin-bottom: 1px;
    }

    h2 {
      margin-bottom: 20px;
      color: #2c3e50;
    }

    form {
      text-align: left;
    }

    label {
      display: block;
      margin-top: 5px;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .password-wrapper {
      position: relative;
    }

    .password-wrapper i {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #777;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background-color: #27ae60;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #219150;
    }

    .error {
      color: red;
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
    }

    @media (max-width: 480px) {
      .login-box {
        padding: 20px;
      }

      h2 {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <img src="img/logo klinik.png" alt="">
      <h2></h2>
      <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <div class="password-wrapper">
          <input type="password" name="password" id="password" required>
          <i class="bi bi-eye-fill" onclick="togglePassword()"></i>
        </div>

        <button type="submit">Masuk</button>
        <p style="margin-top: 15px;">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
      </form>
      <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
      <?php endif; ?>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const icon = passwordInput.nextElementSibling;
      const isPassword = passwordInput.type === "password";

      passwordInput.type = isPassword ? "text" : "password";
      icon.classList.toggle("bi-eye-fill");
      icon.classList.toggle("bi-eye-slash-fill");
    }
  </script>
</body>

</html>
