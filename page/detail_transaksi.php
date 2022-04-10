<?php
  $id_laundry = $_GET['id'];
  // menampilkan data transaksi (join 4 tabel)
  $query = "SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`id_laundry` = '$id_laundry'";
  
  $result = mysqli_query($conn, $query); 
  $row = mysqli_fetch_assoc($result);
?>

<div class ="page-content-wrapper">
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <div class="btn-group float-right">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="#">Laundry</a></li>
                      <li class="breadcrumb-item active">Detail Transaksi Laundry</li>
                  </ol>
              </div>
              <h4 class="page-title">Detail Transaksi Laundry</h4>
          </div>
      </div>
  </div>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-body">
            <p>
              <b>Tanggal : </b> <?= date('Y-m-d'); ?>
            </p>
          <table class="table table-bordered">
            <tr>
              <th>No. Order</th>
              <td><?= $row['id_laundry']; ?></td>
            </tr>
            <tr>
              <th>Pelanggan</th>
              <td><?= $row['pelanggannama']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?= $row['pelangganalamat']; ?></td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td><?= $row['pelangganjk']; ?></td>
            </tr>
            <tr>
              <th>No. Telp</th>
              <td><?= $row['pelanggantelp']; ?></td>
            </tr>
            <tr>
              <th>Tanggal Selesai</th>
              <td><?= $row['tgl_selesai']; ?></td>
            </tr>
            <tr>
              <th>Catatan Laundry</th>
              <td><?= $row['catatan']; ?></td>
            </tr>
            <tr>
              <th>Status Pembayaran</th>
              <td><?= ($row['status_pembayaran'] == 1) ? '<nav class="badge badge-success">Lunas</nav>' : '<nav class="badge badge-danger">Belum Lunas</nav>'; ?></td>
            </tr>
            <tr>
              <th>Status Pengambilan Baju</th>
              <td><?= ($row['status_pengambilan'] == 1) ? '<nav class="badge badge-success">Sudah Diambil</nav>' : '<nav class="badge badge-danger">Belum Diambil</nav>'; ?></td>
            </tr>
            <tr>
              <th>Kasir</th>
              <td><?= $row['username']; ?></td>
            </tr>
          </table>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Terima</th>
                  <th>Jenis Layanan</th>
                  <th>Tanggal Selesai</th>
                  <th>Berat Cucian</th>
                  <th>Harga/Kg</th>
                  <th>Total Bayar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= "1"; ?></td>
                  <td><?= $row['tgl_terima']; ?></td>
                  <td><?= $row['jenis_laundry']; ?></td>
                  <td><?= $row['tgl_selesai']; ?></td>
                  <td><?= $row['jml_kilo']; ?> Kg</td>
                  <td>Rp. <?= number_format($row['tarif']); ?></td>
                  <td>Rp. <?= number_format($row['totalbayar']); ?></td>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <th colspan="6" style="text-align: center;">TOTAL PESANAN</th>
                  <th>Rp. <?= number_format($row['totalbayar']); ?></th>
                </tr>
              </tbody>
            </table>
          </div>
            <a href="page/cetak_transaksi.php?id=<?= $row['id_laundry']; ?>" class="btn btn-primary" target="_blank">Cetak Invoice</a>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end page title end breadcrumb -->
  </div>
  <!-- container -->
</div>
