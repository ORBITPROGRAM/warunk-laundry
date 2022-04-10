<?php 

// jika tambah ditekan
if (isset($_POST['tambah'])) {
  // ambil data dari form
  $nama = htmlentities(strip_tags(trim($_POST["pelanggannama"])));
  $jk = htmlentities(strip_tags(trim($_POST["jk"])));
  $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
  $pelanggantelp = htmlentities(strip_tags(trim($_POST["pelanggantelp"])));
  $pesan_error = "";

  // input data ke db
  $query = mysqli_query($conn, "INSERT INTO `tb_pelanggan` (`pelangganid`, `pelanggannama`, `pelangganjk`, `pelangganalamat`, `pelanggantelp`) VALUES ('', '$nama', '$jk', '$alamat', '$pelanggantelp')");
  
  // dicek
  if ($query) {
    echo "
      <script>
        alert('Data dengan Nama $nama berhasil ditambahkan');
        window.location.href = '?page=pelanggan';
      </script>
    ";
  }else{
    $pesan_error .= "Data gagal disimpan !";
  }

}else{
  $pesan_error = "";
  $nama = "";
  $alamat = "";
  $pelanggantelp = "";
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
                      <li class="breadcrumb-item active">Data Pelanggan</li>
                      <li class="breadcrumb-item active">Tambah Pelanggan</li>
                  </ol>
              </div>
              <h4 class="page-title">Tambah Pelanggan</h4>
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="pelanggannama" placeholder="Masukkan nama pelanggan" value="<?= $nama; ?>" required autofocus/>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-9">
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="jk" class="custom-control-input" value="Laki - laki" checked>
                            <label class="custom-control-label" for="customRadio4">Laki - laki</label>
                        </div>
                    </div>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="jk" class="custom-control-input" value="Perempuan">
                            <label class="custom-control-label" for="customRadio5">Perempuan</label>
                        </div>
                    </div>
                </div>
              </div> <!--end row-->         

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="example-text-input" name="alamat" cols="20" rows="5" placeholder="Masukkan alamat" required><?= $alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="pelanggantelp" placeholder="Masukkan No.Telp" value="<?= $usertelp; ?>" required/>
                </div>
              </div>

              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
              <a href="?page=pelanggan" class="btn btn-warning">Kembali</a>
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
