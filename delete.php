<?php
// Memanggil koneksi menuju database
include_once("connection.php");

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Query untuk menghapus data dari database
    $query = "DELETE FROM tbl_barang WHERE id_barang = $id_barang";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil menghapus
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID barang tidak diberikan.";
    exit();
}
?>
