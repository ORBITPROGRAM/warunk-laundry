<main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo $title; ?></h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
	  <li class="breadcrumb-item active"><?php echo $title; ?></li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<?php if (isset($error)) : ?>
					<div class="invalid-feedback"><?= $error ?></div>
<?php endif; ?>

<section class="section dashboard">
  <div class="row">

	<div class="card">
		<div class="card-body text-dark">

		<form action="<?php echo base_url('karyawan/insert')?>" method="POST" enctype="multipart/form-data">
			<div class="row mt-4">
				<div class="col-md-6">
					<label for="nip" class="form-label">Nomor Induk Pegawai</label>
					<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP">
					<div class="text-danger"><?php echo form_error('nip') ?></div>
				</div>
				<div class="col-md-6">
					<label for="nama_karyawan" class="form-label">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Lengkap">
					<div class="text-danger"><?php echo form_error('nama_karyawan') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<label for="nip" class="form-label">Jabatan</label>
					<select class="form-select" name="role" id="role">
						<option value>Pilih Role</option>
						<option value="1">Administrator</option>
						<option value="2">Audit</option>
					</select>
				</div>
				<div class="col-md-6">
					<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
					<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
					<div class="text-danger"><?php echo form_error('tgl_lahir') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
					<select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
						<option value>Pilih Jenis Kelamin</option>
						<option value="pria">Laki-laki</option>
						<option value="wanita">Perempuan</option>
					</select>
				</div>
				<div class="col-md-6">
					<label for="no_hp" class="form-label">Nomor Handphone</label>
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan Nomor Handphone">
					<div class="text-danger"><?php echo form_error('no_hp') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
					<div class="text-danger"><?php echo form_error('email') ?></div>
				</div>
				<div class="col-md-6">
					<label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
					<input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
					<div class="text-danger"><?php echo form_error('tgl_masuk') ?></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<!-- <label for="foto" class="form-label">Foto</label>
					<input class="form-control" type="" id="foto" name="foto"> -->
					<button type="submit" class="btn btn-success mt-5">Simpan</button>
					<a href="<?php echo base_url() . 'karyawan' ?>" class="btn btn-secondary mt-5">Kembali</a>
				</div>
				<div class="col-md-6">
					<label for="alamat" class="form-label">Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
					<div class="text-danger"><?php echo form_error('alamat') ?></div>
				</div>
			</div>
		</form>

		</div>
	</div>

  </div>
</section>

</main><!-- End #main -->

