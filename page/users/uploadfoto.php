<?php 

// ambil data id dari url
$id = $_GET['id'];

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  $pesan_error = "";

  // jika kedua inputan kosong
  if ($_POST['foto'] == "" && $_FILES['userfoto']['name'] == "") {
    $pesan_error = "Silahkan pilih salah satu <br>";

  // jika upload melalui oncam
  }elseif($_POST['foto'] !== ""){
    $img = $_POST['foto'];
    $folderPenyimpanan = "fotouser/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $namafoto = uniqid() . '.png'; // mengubah nama menjadi unik

    $file = $folderPenyimpanan . $namafoto;
    // pindah foto ke folder
    file_put_contents($file, $image_base64);
  
  // jika upload biasa
  }elseif($_FILES['userfoto']['name'] !== ""){
    $namaFile = $_FILES["userfoto"]["name"];
    $ukuran = $_FILES["userfoto"]["size"];
    $error = $_FILES["userfoto"]["error"];
    $tmp = $_FILES["userfoto"]["tmp_name"];

    if ($error === 4) {
      $pesan_error = "Silahkan pilih salah satu";
    }

    $gambarvalid = ["jpg","jpeg","png"];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    // mengecek ekstensi valid
    if (!in_array($ekstensigambar, $gambarvalid)) {
      $pesan_error = "Yang anda upload bukan gambar";
    }

    // max 2mb
    if ($ukuran > 2000000) {
      $pesan_error = "Ukuran gambar terlalu besar";
    }

    // mengubah nama menjadi unik
    $namafoto = uniqid();
    $namafoto .= '.';
    $namafoto .= $ekstensigambar;
    
    // jika tidak ada error
    if ($pesan_error == "") {
      // pindah file ke folder
      move_uploaded_file($tmp, 'fotouser/' .$namafoto);
    }
  }

  if ($pesan_error == "") {
    // cek foto 
    // jika foto didalam database tidak kosong
    $query = mysqli_query($conn, "SELECT * FROM tb_users WHERE userid = $id");
    $row = mysqli_fetch_assoc($query);
    if ($row['userfoto'] != NULL || $row['userfoto'] != "") {
      unlink('fotouser/'.$row['userfoto']);
    }

    // simpan foto di db
    $namaAdmin = $row['username'];
    mysqli_query($conn, "UPDATE tb_users SET userfoto = '$namafoto' WHERE userid = $id");
    echo "
    <script>
      alert('Foto dengan username $namaAdmin berhasil diupload');
      window.location.href = '?page=users';
    </script>
    ";
  }

}else{
  $pesan_error = "";
}

?>

<div class ="page-content-wrapper">
  <div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Laundry</a></li>
                      <li class="breadcrumb-item active">Upload Foto User</li>
                  </ol>
              </div>
              <h4 class="page-title">Upload Foto User</h4>
          </div>
          <!-- pesan error tidak kosong -->
          <?php if ($pesan_error !== "") : ?>
            <div class="alert alert-danger" role="alert">
              <?= $pesan_error; ?>
            </div>
          <?php endif; ?>
      </div>
  </div>

    <div class="row">
      <div class="col-6">
        <div class="card m-b-30">
          <div class="card-body">
          <h4 class="page-title">Webcam</h4>
          
            <form action="" method="post" enctype="multipart/form-data">
            
            <!-- menampilkan webcam -->
            <div id="my_camera" class="mb-3"></div>

            <!-- ambil foto -->
            <button type="button" class="btn btn-primary" onclick="ambilgambar()">Ambil Foto</button>
            <input type="hidden" name="foto" class="image-tag">

            <!-- menampilkan hasil foto -->
            <div id="results" class="mt-3 mb-3"></div>
          
            <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
          </div>
        </div>
      </div>
      <!-- end col -->

      <div class="col-6">
      <div class="card m-b-30">
        <div class="card-body">
          <h4 class="page-title">Upload Foto Biasa</h4>
            <!-- upload gambar -->
            <div class="form-group row">
              <div class="col-sm-10">
                <input class="form-control" type="file" id="foto" name="userfoto" onchange="previewFoto()" /> 
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10">
                <img src="fotouser/default.svg" class="img-thumbnail img-preview">
              </div>
            </div>
        
            <button class="btn btn-success" type="submit" name="simpan">Simpan</button>

          </form>
        </div>
      </div>
      </div>
    </div>
      <!-- end row -->
    
    </div> <!-- end container -->
    <!-- end page title end breadcrumb -->
</div>

<!-- script untuk menggunakan webcam -->
<script language="JavaScript">
    Webcam.set({
        width: 470,
        height: 370,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function ambilgambar() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>