<?php 

$id = $_GET['id'];

// menghapus data pengeluaran
$result = mysqli_query($conn, "DELETE FROM tb_pengeluaran WHERE id_pengeluaran = '$id'");
// menghapus data pengeluaran di tb laporan
$result2 = mysqli_query($conn, "DELETE FROM tb_laporan WHERE id_pengeluaran = '$id'");

if ($result && $result2) {
  echo "
  <script>
    alert('Data Pengeluaran $id berhasil dihapus');
    window.location.href = '?page=pengeluaran';
  </script>
";
}

?>