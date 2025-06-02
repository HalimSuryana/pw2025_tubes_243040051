<?php

require 'function.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo "<script>
                    alert('User name berhasil login!');
                    document.location.href = 'dashboard.php';
                    </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi Pasien - Klinik Harmoni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .register-container {
            background-color: #fff;
            padding: 30px 25px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        h1 {
            margin-bottom: 25px;
            color: #2c3e50;
            font-weight: 700;
            font-size: 26px;
        }

        p {
            text-align: center;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #27ae60;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #219150;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Registrasi Pasien</h1>
        <form action="" method="post">
            <label for="username">Username</label>
            <div class="input-wrapper">
                <input type="text" name="username" id="username" required>
            </div>

            <label for="password">Password</label>
            <div class="input-wrapper">
                <input type="password" name="password" id="password" required>
                <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password', this)"></i>
            </div>

            <label for="password2">Konfirmasi Password</label>
            <div class="input-wrapper">
                <input type="password" name="password2" id="password2" required>
                <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password2', this)"></i>
            </div>

            <button type="submit" name="register">Register</button>

            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.classList.remove("bi-eye-fill");
                el.classList.add("bi-eye-slash-fill");
            } else {
                input.type = "password";
                el.classList.remove("bi-eye-slash-fill");
                el.classList.add("bi-eye-fill");
            }
        }
    </script>
</body>

</html>