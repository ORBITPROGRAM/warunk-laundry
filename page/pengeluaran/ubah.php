<?php 

// mengambil id dari url
$id_pengeluaran = $_GET['id'];

// ambil data dari tabel pengeluaran
$query_p = mysqli_query($conn, "SELECT * FROM tb_pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");
$result = mysqli_fetch_assoc($query_p);

// ambil data
$tanggal = $result['tgl_pengeluaran'];
$catatan = $result['catatan'];
$pengeluaran = $result['pengeluaran'];

if (isset($_POST['simpan'])) {
  $tanggal = htmlentities(strip_tags(trim($_POST["tanggal"])));
  $catatan = htmlentities(strip_tags(trim($_POST["catatan"])));
  $pengeluaran = htmlentities(strip_tags(trim($_POST["pengeluaran"])));
  $pesan_error = "";

  // ubah data pengeluaran pada tb_pengeluaran
  $query = mysqli_query($conn, "UPDATE tb_pengeluaran SET tgl_pengeluaran = '$tanggal', catatan = '$catatan', pengeluaran = '$pengeluaran' WHERE id_pengeluaran = '$id_pengeluaran'");

  // ubah data pengeluaran pada tb_laporan
  $query = mysqli_query($conn, "UPDATE tb_laporan SET catatan = '$catatan', tgl_laporan = '$tanggal', pengeluaran = '$pengeluaran' WHERE id_pengeluaran = '$id_pengeluaran'");

  if ($query) {
    echo "
      <script>
        alert('Data pengeluaran dengan ID $id_pengeluaran berhasil diubah');
        window.location.href = '?page=pengeluaran';
      </script>
    ";
  }else{
    $pesan_error .= "Data pengeluaran gagal diubah !";
  }

}else{
  $pesan_error = "";
}

?>


<div class="page-content-wrapper">
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="aplikasi.php">Laundry</a></li>
                      <li class="breadcrumb-item active">Data Pengeluaran</li>
                      <li class="breadcrumb-item active">Edit Data Pengeluaran</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Data Pengeluaran</h4>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">

      <?php if ($pesan_error !== "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $pesan_error; ?>
        </div>
      <?php endif; ?>

          <form action="" method="post">
          <div class="card m-b-100">
            <div class="card-body">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input class="form-control" type="date" id="example-text-input" name="tanggal" value="<?= $tanggal; ?>" required autofocus/>
                </div>
              </div>     

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">catatan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="example-text-input" name="catatan" cols="20" rows="5" placeholder="Masukkan catatan" required><?= $catatan; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-number-input" class="col-sm-2 col-form-label">Pengeluaran (Rp)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="pengeluaran" id="pengeluaran" value="<?= $pengeluaran; ?>" required>
                </div>
              </div>

              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="?page=pengeluaran" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </form>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
</div>
<br>
