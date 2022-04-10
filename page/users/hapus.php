<?php 

// menangkap nilai id dari url
$id = $_GET['id'];
// mengambil data dari tb_pelanggan berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM tb_users WHERE userid = $id");
$row = mysqli_fetch_assoc($query);
$username = $row['username'];

// menghapus foto profile jika ada
if ($row['userfoto'] != NULL || $row['userfoto'] != "") {
  unlink('fotouser/'.$row['userfoto']);
}
// menghapus data users
$result = mysqli_query($conn, "DELETE FROM tb_users WHERE userid = $id");

if ($result) {
  echo "
  <script>
    alert('Data dengan username $username berhasil dihapus');
    window.location.href = '?page=users';
  </script>
";
}

?>