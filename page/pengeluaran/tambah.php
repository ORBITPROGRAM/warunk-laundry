<?php 

if (isset($_POST['tambah'])) {
  $id_pengeluaran = htmlentities(strip_tags(trim($_POST["id_pengeluaran"])));
  $tanggal = htmlentities(strip_tags(trim($_POST["tanggal"])));
  $catatan = htmlentities(strip_tags(trim($_POST["catatan"])));
  $pengeluaran = htmlentities(strip_tags(trim($_POST["pengeluaran"])));
  $ket_laporan = 2;
  $pesan_error = "";

  // input ke tb_pengeluaran
  $query = mysqli_query($conn, "INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `catatan`, `pengeluaran`) VALUES ('$id_pengeluaran', '$tanggal', '$catatan', '$pengeluaran')");

  // input ke tb_laporan
  $query2 = mysqli_query($conn, "INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_pengeluaran`, `pengeluaran`) VALUES ('', '$tanggal', '$ket_laporan', '$catatan', '$id_pengeluaran', '$pengeluaran')");

  // jika tidak ada error
  if ($query && $query2) {
    echo "
      <script>
        alert('Data pengeluaran dengan ID $id_pengeluaran berhasil ditambahkan');
        window.location.href = '?page=pengeluaran';
      </script>
    ";
  }else{
    $pesan_error .= "Data pengeluaran gagal disimpan !";
  }

}else{
  $pesan_error = "";
  $tanggal = "";
  $catatan = "";
  $pengeluaran = "";
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
                      <li class="breadcrumb-item active">Tambah Data Pengeluaran</li>
                  </ol>
              </div>
              <h4 class="page-title">Tambah Pengeluaran</h4>
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

            <?php 
            // mencari id_pengeluaran otomatis
            $q = mysqli_query($conn, "SELECT MAX(RIGHT(id_pengeluaran,4)) AS kd_max FROM tb_pengeluaran");
            $jml = mysqli_num_rows($q);
            $kd = "";
            if ($jml > 0) {
              while ($result = mysqli_fetch_assoc($q)) {
                $tmp = ((int)$result['kd_max']) + 1;
                $kd = sprintf("%04s", $tmp);
              }
            } else {
              $kd = "0001";
            }
            $id_pengeluaran = 'PG-' . $kd;
            ?>

            <input type="hidden" value="<?= $id_pengeluaran; ?>" name="id_pengeluaran">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input class="form-control" type="date" id="example-text-input" name="tanggal" value="<?= $tanggal; ?>" required autofocus/>
                </div>
              </div>     

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Catatan</label>
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

              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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
