<?php
// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($conn, 'SELECT * FROM tbl_barang');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas CRUD</title>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <a href="add.php">Tambah Data</a>
  <table border="1">
    <tr>
      <th>Barang</th>
      <th>Stok</th>
      <th>Harga</th>
      <th>Aksi</th> <!-- Kolom untuk aksi -->
    </tr>

    <?php
    // Loop melalui hasil query dan menampilkan data dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['nama_barang'] . "</td>";
      echo "<td>" . $row['jumlah_barang'] . "</td>";
      echo "<td>" . $row['harga_barang'] . "</td>";
      echo "<td>";
      echo "<a href='edit.php?id=" . $row['id_barang'] . "'>Edit</a>"; // Tautan edit dengan mengirimkan ID
      echo " | ";
      echo "<a href='delete.php?id=" . $row['id_barang'] . "'>Delete</a>"; // Tautan delete dengan mengirimkan ID
      echo "</td>";
      echo "</tr>";
    }

    // Membebaskan hasil query
    mysqli_free_result($result);
    ?>

  </table>

</body>

</html>