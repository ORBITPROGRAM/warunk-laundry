<?php
  $id_pengeluaran = $_GET['id'];
  // menampilkan data transaksi
  $query = "SELECT * FROM `tb_pengeluaran` WHERE `tb_pengeluaran`.`id_pengeluaran` = '$id_pengeluaran'";
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
                      <li class="breadcrumb-item active">Detail Pengeluaran Laundry</li>
                  </ol>
              </div>
              <h4 class="page-title">Detail Pengeluaran Laundry</h4>
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

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Tanggal Pengeluaran</th>
                  <th>Catatan</th>
                  <th>Pengeluaran</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= "1"; ?></td>
                  <td><?= $row['id_pengeluaran']; ?></td>
                  <td><?= $row['tgl_pengeluaran']; ?></td>
                  <td><?= $row['catatan']; ?></td>
                  <td>Rp. <?= number_format($row['pengeluaran']); ?></td>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <th colspan="4" style="text-align: center;">TOTAL PENGELUARAN</th>
                  <th>Rp. <?= number_format($row['pengeluaran']); ?></th>
                </tr>
              </tbody>
            </table>
            <a href="page/cetak_pengeluaran.php?id=<?= $row['id_pengeluaran']; ?>" class="btn btn-primary" target="_blank">Cetak Pengeluaran</a>
          </div>
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
