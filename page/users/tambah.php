<?php 

// jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
  $username = htmlentities(strip_tags(trim($_POST["username"])));
  $nama = htmlentities(strip_tags(trim($_POST["nama"])));
  $jk = htmlentities(strip_tags(trim($_POST["jk"])));
  $userpass = htmlentities(strip_tags(trim($_POST["userpass"])));
  $userpass2 = htmlentities(strip_tags(trim($_POST["userpass2"])));
  $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
  $usertelp = htmlentities(strip_tags(trim($_POST["usertelp"])));
  $level = htmlentities(strip_tags(trim($_POST["level"])));
  $pesan_error = "";
  $pesan_error_user = "";
  $pesan_error_pass = "";

  $query_username = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
  $result_username = mysqli_num_rows($query_username);
  // jika username ada yg sama
  if ($result_username > 0) {
    $pesan_error_user = "Username <b>$username</b> sudah digunakan <br>";
  }

  // jika pass tidak sama
  if ($userpass !== $userpass2) {
    $pesan_error_pass = "Retype password tidak sesuai <br>";
  }

  // jika tidak ada error
  if ($pesan_error_user == "" && $pesan_error_pass == "") {
    // enkripsi password
    $password = password_hash($userpass, PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "INSERT INTO `tb_users`(`userid`, `username`, `userpass`, `nama`, `jk`, `alamat`, `usertelp`, `level`) VALUES ('', '$username', '$password', '$nama', '$jk', '$alamat', '$usertelp', '$level')");
    if ($query) {
      echo "
      <script>
        alert('Data dengan username $username berhasil ditambahkan');
        window.location.href = '?page=users';
      </script>
      ";
    }else{
      $pesan_error .= "Data gagal disimpan !";
    }
  
  // jika error menampilkan pesan error
  }else{
    $pesan_error .= "Data gagal disimpan !";
  }

}else{
  $pesan_error = "";
  $username = "";
  $nama = "";
  $userpass = "";
  $userpass2 = "";
  $alamat = "";
  $usertelp = "";
  $pesan_error_user = "";
  $pesan_error_pass = "";
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
                      <li class="breadcrumb-item active">Data Users</li>
                      <li class="breadcrumb-item active">Tambah User</li>
                  </ol>
              </div>
              <h4 class="page-title">Tambah Users</h4>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-12">

      <!-- jika pesan error tidak kosong -->
      <?php if ($pesan_error !== "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $pesan_error; ?>
        </div>
      <?php endif; ?>

          <form action="" method="post">
          <div class="card m-b-100">
            <div class="card-body">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input class="form-control <?= ($pesan_error_user) ? 'is-invalid' : ''; ?>" type="text"id="example-text-input" name="username" placeholder="Masukkan username" autofocus required value="<?= $username; ?>" />
                  
                  <div class="invalid-feedback">
                    <?= $pesan_error_user; ?>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <div>
                      <input class="form-control" type="password"id="example-text-input" name="userpass" placeholder="Masukkan password" required value="<?= $userpass; ?>" />  
                    </div>
                    <div class="m-t-10">
                      <input class="form-control <?= ($pesan_error_pass) ? 'is-invalid' : ''; ?>" type="password"id="example-text-input" name="userpass2" placeholder="Retype password" value="<?= $userpass2; ?>" required/>
                      <div class="invalid-feedback">
                        <?= $pesan_error_pass; ?>
                      </div>
                    </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input class="form-control"type="text"id="example-text-input" name="nama" placeholder="Masukkan nama" value="<?= $nama; ?>" required/>
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
                  <input class="form-control" type="number"id="example-text-input" name="usertelp" placeholder="Masukkan No.Telp" value="<?= $usertelp; ?>" required/>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <select name="level" class="form-control">
                    <option value='admin' selected>Admin</option>
                    <option value='kasir'>Kasir</option>
                  </select>
                </div>
              </div>

              <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
              <a href="?page=users" class="btn btn-warning">Kembali</a>
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
