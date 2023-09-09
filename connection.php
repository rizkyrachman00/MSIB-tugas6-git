<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "toko_bangunan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Sekarang Anda dapat melakukan operasi database di sini

// // Menutup koneksi
// $conn->close();
?>
