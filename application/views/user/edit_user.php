<main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo $title?></h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Beranda</a></li>
	  <li class="breadcrumb-item active"><?php echo $title; ?></li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

	<div class="col-lg-12">

	<div class="card">
		<div class="card-header">
			<h5>Tambah User/Pengguna</h5>
		</div>
		<div class="card-body">
		<?php foreach ($user as $u) : ?>
			
			<form action="<?php echo base_url('user/update'); ?>" method="POST">
				<div class="col-md-12">
				<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
					<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $u->id_user; ?>">
					<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $u->nama_lengkap; ?>">
					<div class="text-danger"><?php echo form_error('nama_lengkap') ?></div>
				</div>
				<div class="col-md-12 mt-3">
				<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $u->username; ?>">
					<div class="text-danger"><?php echo form_error('username') ?></div>
				</div>
				<div class="col-md-12 mt-3">
				<label for="pasword" class="form-label">Password</label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password baru atau lama">
					<div class="text-danger"><?php echo form_error('password') ?></div>
				</div>
				<div class="col-md-12 mt-3">
					<label for="akses" class="form-label">Level</label>
					<select class="form-select" name="akses" id="akses">
						<option value>Pilih Level</option>
						<option <?php if ($u->akses == 'pimpinan') {
												echo 'SELECTED';
											} ?> value="pimpinan">Pimpinan</option>
						<option <?php if ($u->akses == 'admin') {
												echo 'SELECTED';
											} ?> value="admin">Administrator</option>
						<option <?php if ($u->akses == 'kurir') {
												echo 'SELECTED';
											} ?> value="kurir">>Kurir</option>
					</select>
				</div>
				<div class="col-md-12 mt-3">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
		
			</form>
			<?php endforeach; ?>
		</div>
	</div>

	</div>

  </div>
</section>

</main><!-- End #main -->

