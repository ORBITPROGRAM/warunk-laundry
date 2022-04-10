<?php 

// ambil id dari url
$id = $_GET['id'];

// tampilkan data seuai id
$query = mysqli_query($conn, "SELECT * FROM tb_laundry WHERE id_laundry = '$id'");
$row = mysqli_fetch_assoc($query);

$tgl = $row['tgl_terima'];
$pemasukan = $row['totalbayar'];
$catatan = $row['catatan'];
$ket_laporan = 1;

// ubah status_pembayaran transaksi laundry menjadi lunas = 1
$result = mysqli_query($conn, "UPDATE tb_laundry SET `status_pembayaran` = 1 WHERE id_laundry = '$id'");

// jika lunas maka tambah data ke tb_pemasukan
$result2 = mysqli_query($conn, "INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_laundry`, `pemasukan`) VALUES ('', '$tgl', '$ket_laporan', '$catatan', '$id', '$pemasukan')");

if ($result && $result2) {
  echo "
  <script>
    alert('Transaksi $id berhasil dilunasi');
    window.location.href = '?page=laundry';
  </script>
";
}
?>