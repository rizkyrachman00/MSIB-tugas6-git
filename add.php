<?php
// Memanggil koneksi menuju database
include_once("connection.php");

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$nama_barang_error = $jumlah_barang_error = $harga_barang_error = "";

// Inisialisasi variabel untuk menyimpan data yang akan dimasukkan
$nama_barang = $jumlah_barang = $harga_barang = "";

// Memeriksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Memvalidasi input nama barang
  if (empty($_POST["nama_barang"])) {
    $nama_barang_error = "Nama barang harus diisi.";
  } else {
    $nama_barang = $_POST["nama_barang"];
  }

  // Memvalidasi input jumlah barang
  if (empty($_POST["jumlah_barang"])) {
    $jumlah_barang_error = "Jumlah barang harus diisi.";
  } else {
    $jumlah_barang = $_POST["jumlah_barang"];
  }

  // Memvalidasi input harga barang
  if (empty($_POST["harga_barang"])) {
    $harga_barang_error = "Harga barang harus diisi.";
  } else {
    $harga_barang = $_POST["harga_barang"];
  }

  // Jika tidak ada kesalahan validasi, masukkan data ke database
  if (empty($nama_barang_error) && empty($jumlah_barang_error) && empty($harga_barang_error)) {
    $query = "INSERT INTO tbl_barang (nama_barang, jumlah_barang, harga_barang) VALUES ('$nama_barang', '$jumlah_barang', '$harga_barang')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil menambahkan data
      exit();
    } else {
      echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Barang</title>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <h2>Tambah Data Barang</h2>
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <span class="error"><?php echo $nama_barang_error; ?></span><br>
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>">

    <span class="error"><?php echo $jumlah_barang_error; ?></span><br>
    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>">

    <span class="error"><?php echo $harga_barang_error; ?></span><br>
    <label for="harga_barang">Harga Barang:</label>
    <input type="number" id="harga_barang" name="harga_barang" value="<?php echo $harga_barang; ?>">


    <input type="submit" name="submit" value="Tambahkan">
  </form>

</body>

</html>