<?php
  include "../include/koneksi.php";

  $id_pengeluaran = $_GET['id'];
  // menampilkan data transaksi
  $query = "SELECT * FROM `tb_pengeluaran` WHERE `tb_pengeluaran`.`id_pengeluaran` = '$id_pengeluaran'";
  $result = mysqli_query($conn, $query); 
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengeluaran <?= $row['id_pengeluaran']; ?></title>
  <link href="../assets/plugins/morris/morris.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body onload="window.print()">
<h3>Detail Pengeluaran</h3>
<table class="table table-bordered">
<thead>
    <tr>
      <th>No</th>
      <th>ID</th>
      <th>Tanggal Pengeluaran</th>
      <th>Catatan</th>
      <th>Pengeluaran</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= "1"; ?></td>
      <td><?= $row['id_pengeluaran']; ?></td>
      <td><?= $row['tgl_pengeluaran']; ?></td>
      <td><?= $row['catatan']; ?></td>
      <td>Rp. <?= number_format($row['pengeluaran']); ?></td>
    </tr>
  </tbody>
  <tbody>
    <tr>
      <th colspan="4" style="text-align: center;">TOTAL PENGELUARAN</th>
      <th>Rp. <?= number_format($row['pengeluaran']); ?></th>
    </tr>
  </tbody>
</table>

<script src="../assets/plugins/datatables/vfs_fonts.js"></script>

</html>