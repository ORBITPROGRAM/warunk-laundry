<main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo $title; ?></h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href=<?php echo base_url('dashboard') ?>">Dashboard</a></li>
	  <li class="breadcrumb-item active"><?php echo $title; ?></li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

	<div class="card">
		<div class="card-body text-dark">

		<form action="<?php echo base_url('jabatan/insert')?>" method="POST" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-md-12">
					<label for="kode_jabatan" class="form-label">KODE JABATAN</label>
					<input type="text" class="form-control" id="kode_jabatan" name="kode_jabatan" placeholder="Masukan Kode Jabatan">
					<div class="text-danger"><?php echo form_error('kode_jabatan') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<label for="nama_jabatan" class="form-label">NAMA JABATAN</label>
					<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Masukan Nama Jabatan">
					<div class="text-danger"><?php echo form_error('nama_jabatan') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<label for="gaji_pokok" class="form-label">GAJI POKOK</label>
					<input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Masukan Gaji Pokok">
					<div class="text-danger"><?php echo form_error('gaji_pokok') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<label for="uang_makan" class="form-label">UANG MAKAN</label>
					<input type="number" class="form-control" id="uang_makan" name="uang_makan" placeholder="Masukan Uang Makan">
					<div class="text-danger"><?php echo form_error('uang_makan') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url() . 'jabatan' ?>" class="btn btn-secondary">Kembali</a>
				</div>
			</div>
		</form>

		</div>
	</div>

  </div>
</section>

</main><!-- End #main -->

