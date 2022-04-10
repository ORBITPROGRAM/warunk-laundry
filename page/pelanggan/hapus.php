<?php

// ambil data &id= dari url
$id = $_GET['id'];

// mengambil data dari tb_pelanggan berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE pelangganid = $id");
$row = mysqli_fetch_assoc($query);
$username = $row['pelanggannama'];

// menghapus foto profile jika ada
if ($row['pelangganfoto'] != NULL || $row['pelangganfoto'] != "") {
  unlink('fotouser/'.$row['pelangganfoto']);
}
// menghapus data pelanggan
$result = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE pelangganid = $id");

if ($result) {
  echo "
  <script>
    alert('Data dengan nama $username berhasil dihapus');
    window.location.href = '?page=pelanggan';
  </script>
";
}

?>