<?php 

// ambil id dari url
$id = $_GET['id'];

// ubah status pengambilan baju
$result = mysqli_query($conn, "UPDATE tb_laundry SET `status_pengambilan` = 1 WHERE id_laundry = '$id'");

if ($result) {
  echo "
  <script>
    alert('Baju milik ID transaksi $id telah diambil');
    window.location.href = '?page=laundry';
  </script>
";
}
?>