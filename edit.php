<?php
// Memanggil koneksi menuju database
include_once("connection.php");

// Cek apakah parameter ID barang telah diterima dari URL
if (isset($_GET['id'])) {
  $id_barang = $_GET['id'];

  // Memanggil data dari database berdasarkan ID
  $query = "SELECT * FROM tbl_barang WHERE id_barang = $id_barang";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nama_barang = $row['nama_barang'];
    $jumlah_barang = $row['jumlah_barang'];
    $harga_barang = $row['harga_barang'];
  } else {
    echo "Data tidak ditemukan.";
    exit();
  }
} else {
  echo "ID barang tidak diberikan.";
  exit();
}

// Proses pengiriman perubahan data jika formulir disubmit
if (isset($_POST['submit'])) {
  $nama_barang_baru = $_POST['nama_barang'];
  $jumlah_barang_baru = $_POST['jumlah_barang'];
  $harga_barang_baru = $_POST['harga_barang'];

  // Query untuk mengupdate data
  $query = "UPDATE tbl_barang SET nama_barang = '$nama_barang_baru', jumlah_barang = '$jumlah_barang_baru', harga_barang = '$harga_barang_baru' WHERE id_barang = $id_barang";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil mengedit
    exit();
  } else {
    echo "Gagal mengedit data: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Barang</title>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h2>Edit Data Barang</h2>
  <form method="POST">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>"><br>

    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>"><br>

    <label for="harga_barang">Harga Barang:</label>
    <input type="number" id="harga_barang" name="harga_barang" value="<?php echo $harga_barang; ?>"><br>

    <input type="submit" name="submit" value="Simpan Perubahan">
  </form>
</body>

</html>