<?php 

// mengambil data url id
$id = $_GET['id'];

// mengambil data dari tb_pelanggan berdasarkan id
$result = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE pelangganid = $id");
$row = mysqli_fetch_assoc($result);

  $nama = $row['pelanggannama'];
  $alamat = $row['pelangganalamat'];
  $pelanggantelp = $row['pelanggantelp'];

// jika tombol ubah ditekan
if (isset($_POST['ubah'])) {
  // menamgkap data dari form
  $nama = htmlentities(strip_tags(trim($_POST["pelanggannama"])));
  $jk = htmlentities(strip_tags(trim($_POST["pelangganjk"])));
  $alamat = htmlentities(strip_tags(trim($_POST["pelangganalamat"])));
  $pelanggantelp = htmlentities(strip_tags(trim($_POST["pelanggantelp"])));
  $pesan_error = "";

  // update data
  $query = "UPDATE `tb_pelanggan` SET
  `pelanggannama` = '$nama',
  `pelangganjk` = '$jk',
  `pelangganalamat` = '$alamat',
  `pelanggantelp` = '$pelanggantelp'
  WHERE `tb_pelanggan`.`pelangganid` = $id
  ";
  $result = mysqli_query($conn, $query);
  
  // cek keberhasilan
  if ($result) {
    echo "
    <script>
      alert('Data dengan nama $nama berhasil diubah');
      window.location.href = '?page=pelanggan';
    </script>
    ";
  // tidak berhasil, maka menampilkan pesan error
  }else{
    $pesan_error .= "Data gagal diubah !";
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
                      <li class="breadcrumb-item active">Data Pelanggan</li>
                      <li class="breadcrumb-item active">Edit Pelanggan</li>
                  </ol>
              </div>
              <h4 class="page-title">Edit Pelanggan</h4>
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="pelanggannama" placeholder="Masukkan nama" value="<?= $nama; ?>" required autofocus/>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-9">
                  <?php if($row['pelangganjk'] == "Laki - laki") { ?>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="pelangganjk" class="custom-control-input" value="Laki - laki" checked>
                            <label class="custom-control-label" for="customRadio4">Laki - laki</label>
                        </div>
                    </div>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="pelangganjk" class="custom-control-input" value="Perempuan">
                            <label class="custom-control-label" for="customRadio5">Perempuan</label>
                        </div>
                    </div>
                  <?php }else{ ?>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="pelangganjk" class="custom-control-input" value="Laki - laki">
                            <label class="custom-control-label" for="customRadio4">Laki - laki</label>
                        </div>
                    </div>
                    <div class="form-check-inline my-1">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="pelangganjk" class="custom-control-input" value="Perempuan" checked>
                            <label class="custom-control-label" for="customRadio5">Perempuan</label>
                        </div>
                    </div>
                  <?php } ?>
                </div>
              </div>      

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="example-text-input" name="pelangganalamat" cols="20" rows="5" placeholder="Masukkan alamat" required><?= $alamat; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input class="form-control" type="number"id="example-text-input" name="pelanggantelp" placeholder="Masukkan No.Telp" value="<?= $pelanggantelp; ?>" required/>
                </div>
              </div>

              <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
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
