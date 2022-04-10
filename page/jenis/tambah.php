<?php 

// jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
  $jenis_laundry = htmlentities(strip_tags(trim($_POST["jenis_laundry"])));
  $lama_proses = htmlentities(strip_tags(trim($_POST["lama_proses"])));
  $tarif = htmlentities(strip_tags(trim($_POST["tarif"])));
  $pesan_error = "";

  // mengecek apakah ada jenis laundry yg sama
  $query_jenis = mysqli_query($conn, "SELECT * FROM tb_jenis WHERE jenis_laundry = '$jenis_laundry'");
  $result_jenis = mysqli_num_rows($query_jenis);
  if ($result_jenis > 0) {
    $pesan_error .= "Jenis <b>$jenis_laundry</b> sudah ada <br>";
  }

  // jika tidak ada error
  if ($pesan_error == "") {
    $query = mysqli_query($conn, "INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_laundry`, `lama_proses`, `tarif`) VALUES ('', '$jenis_laundry', '$lama_proses', '$tarif')");
    if ($query) {
      echo "
      <script>
        alert('Data dengan jenis $jenis_laundry berhasil ditambahkan');
        window.location.href = '?page=jenis';
      </script>
      ";

    // jika ada error
    }else{
      $pesan_error .= "Data gagal disimpan !";
    }
    
  }else{
    $pesan_error .= "Data gagal disimpan !";
  }

}else{
  $pesan_error = "";
  $jenis_laundry = "";
  $lama_proses = "";
  $tarif = "";
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
                      <li class="breadcrumb-item active">Data Jenis Laundry</li>
                      <li class="breadcrumb-item active">Tambah Jenis Laundry</li>
                  </ol>
              </div>
              <h4 class="page-title">Tambah Jenis Laundry</h4>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">

      <!-- menampilkan notifikasi pesan error jika ada -->
      <?php if ($pesan_error !== "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $pesan_error; ?>
        </div>
      <?php endif; ?>

          <form action="" method="post">
          <div class="card m-b-100">
            <div class="card-body">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Layanan Laundry</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="jenis_laundry" placeholder="Masukkan jenis laundry" value="<?= $jenis_laundry; ?>" required autofocus/>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Lama Proses (hari)</label>
                <div class="col-sm-10">
                  <input class="form-control"type="number" id="example-text-input" name="lama_proses" placeholder="Masukkan lama proses" value="<?= $lama_proses; ?>" required/>
                </div>
              </div>     

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tarif (Per Kg)</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number" id="example-text-input" name="tarif" placeholder="Masukkan tarif" value="<?= $tarif; ?>" required/>
                </div>
              </div>

              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
              <a href="?page=jenis" class="btn btn-warning">Kembali</a>
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
