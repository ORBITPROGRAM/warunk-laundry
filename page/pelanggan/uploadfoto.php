<?php 

// ambil data dari url
$id = $_GET['id'];

if (isset($_POST['simpan'])) {
  $pesan_error = "";

  // jika kedua inputan kosong
  if ($_POST['foto'] == "" && $_FILES['pelangganfoto']['name'] == "") {
    $pesan_error = "Silahkan pilih salah satu <br>";

  // jika upload melalui oncam
  }elseif($_POST['foto'] !== ""){
    $img = $_POST['foto'];
    $folderPenyimpanan = "fotouser/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);

    // memberikan nama unik pada gambar
    $namafoto = uniqid() . '.png';

    $file = $folderPenyimpanan . $namafoto;

    // pindah foto ke folder fotouser/
    file_put_contents($file, $image_base64);
  
  // jika upload biasa / file upload biasa diinput
  }elseif($_FILES['pelangganfoto']['name'] !== ""){
    $namaFile = $_FILES["pelangganfoto"]["name"];
    $ukuran = $_FILES["pelangganfoto"]["size"];
    $error = $_FILES["pelangganfoto"]["error"];
    $tmp = $_FILES["pelangganfoto"]["tmp_name"];

    // belum upload gambar
    if ($error === 4) {
      $pesan_error = "Silahkan pilih salah satu";
    }

    $gambarvalid = ["jpg","jpeg","png"];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    // mengecek apakah ekstensi valid
    if (!in_array($ekstensigambar, $gambarvalid)) {
      $pesan_error = "Yang anda upload bukan gambar";
    }

    // max 2mb
    if ($ukuran > 2000000) {
      $pesan_error = "Ukuran gambar terlalu besar";
    }

    $namafoto = uniqid();
    $namafoto .= '.';
    $namafoto .= $ekstensigambar;
    
    // jika tidak ada error
    if ($pesan_error == "") {
      move_uploaded_file($tmp, 'fotouser/' .$namafoto);
    }
  }

  if ($pesan_error == "") {
    // cek foto 
    // jika foto didalam database tidak kosong
    $query = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE pelangganid = $id");
    $row = mysqli_fetch_assoc($query);
    // jika ada foto lama maka foto yg lama diganti/dihapus dengan foto yg baru
    if ($row['pelangganfoto'] != NULL || $row['pelangganfoto'] != "") {
      unlink('fotouser/'.$row['pelangganfoto']);
    }

    // simpan nama foto di db
    $namaPelanggan = $row['pelanggannama'];
    mysqli_query($conn, "UPDATE tb_pelanggan SET pelangganfoto = '$namafoto' WHERE pelangganid = $id");
    echo "
    <script>
      alert('Foto pelanggan dengan nama $namaPelanggan berhasil diupload');
      window.location.href = '?page=pelanggan';
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
                      <li class="breadcrumb-item active">Upload Foto Pelanggan</li>
                  </ol>
              </div>
              <h4 class="page-title">Upload Foto Pelanggan</h4>
          </div>
          <!-- pesan error -->
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
            
            <!-- webcam -->
            <div id="my_camera" class="mb-3"></div>

            <button type="button" class="btn btn-primary" onclick="ambilgambar()">Ambil Foto</button>

            <!-- menyimpan / input gambar -->
            <input type="hidden" name="foto" class="image-tag">

            <!-- hasil foto -->
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
                <input class="form-control" type="file" id="foto" name="pelangganfoto" onchange="previewFoto()" /> 
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10">
                <!-- menampilkan prefiew gambar -->
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