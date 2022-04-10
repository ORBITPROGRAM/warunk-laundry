<?php 

$id = $_GET['id'];

// menghapus data transaksi laundry
$result = mysqli_query($conn, "DELETE FROM tb_laundry WHERE id_laundry = '$id'");

if ($result) {
  echo "
  <script>
    alert('Data Transaksi berhasil dihapus');
    window.location.href = '?page=laundry';
  </script>
";
}

?>