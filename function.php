<?php

$conn = mysqli_connect("localhost", "root", "", "klinik_harmoni");

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Registrasi gagal: " . mysqli_error($conn) . "');</script>";
        return false;
    }

    return mysqli_affected_rows($conn);
}
