<?php

// memanggil koneksi
include "../../include/koneksi.php";

// autofill / mengisi data otomatis pada field transaksi

// menangkap data idjenis dari laundry/tambah.php
$idjenis = $_GET['idjenis'];

$query_jenis = mysqli_query($conn, "SELECT * FROM tb_jenis WHERE kd_jenis = '$idjenis'");
$hasil_jenis = mysqli_fetch_assoc($query_jenis);

// jika tarif tidak kosong
if ($hasil_jenis) {
  $lama_proses = $hasil_jenis['lama_proses'];

  // tanggal hari ini + lama proses
  $tglselesai = date('Y-m-d', strtotime('+'.$lama_proses.' day'));

  $data = [
    'sukses' => [
      'tarif' => $hasil_jenis['tarif'],
      'tgl_selesai' => $tglselesai
    ]
  ];
  
}elseif(!$hasil_jenis){
  $data = [
    'gagal' => 'gagal'
  ];
}

// data dikirim kembali ke laundry/tambah.php
echo json_encode($data);

?>