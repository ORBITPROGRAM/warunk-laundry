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

	<!-- Left side columns -->
	<div class="col-lg-8">
	  <div class="row">

		<div class="card">
			<div class="card-body">
				<table class="table datatable">
					<thead>
					<tr>
						<td scope="col">No</td>
						<td scope="col">Nama Lengkap</td>
						<td scope="col">Username</td>
						<td scope="col">Level</td>
						<td scope="col">Aksi</td>
					</tr>
					</thead>
					<tbody>

					<?php $no=1;?>
					<?php foreach($user as $u) : ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $u->nama_lengkap; ?></td>
							<td><?php echo $u->username; ?></td>
							<td><?php echo $u->akses; ?></td>
							<td>
							<a href="<?php echo base_url('user/edit/') . $u->id_user ?>"><span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Edit</span></a>
							<a href="#" data-href="<?php echo base_url()?>user/delete/<?php echo  $u->id_user ?>" class="delete" ><span class="badge bg-danger"><i class="bi bi-trash me-1"></i> Hapus</span></a>
							</td>
						</tr>
					<?php endforeach; ?>

					</tbody>

				</table>
			</div>
		</div>

	  </div>
	</div><!-- End Left side columns -->

	<!-- Right side columns -->
	<div class="col-lg-4">

	<div class="card">
		<div class="card-header">
			<h5>Tambah User/Pengguna</h5>
		</div>
		<div class="card-body">
			<form action="<?php echo base_url('user/insert'); ?>" method="POST" enctype="multipart/form-data">
				<div class="col-md-12">
				<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap">
					<div class="text-danger"><?php echo form_error('nama_lengkap') ?></div>
				</div>
				<div class="col-md-12 mt-3">
				<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
					<div class="text-danger"><?php echo form_error('username') ?></div>
				</div>
				<div class="col-md-12 mt-3">
				<label for="pasword" class="form-label">Password</label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password">
					<div class="text-danger"><?php echo form_error('password') ?></div>
				</div>
				<div class="col-md-12 mt-3">
					<label for="akses" class="form-label">Level</label>
					<select class="form-select" name="akses" id="akses">
						<option value>Pilih Level</option>
						<option value="pimpinan">Pimpinan</option>
						<option value="admin">Administrator</option>
						<option value="kurir">Kurir</option>
					</select>
				</div>
				<div class="col-md-12 mt-3">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
		
			</form>
		</div>
	</div>

	</div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->

<div class="modal fade" id="modaldelete" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<div>Anda yakin menghapus data ini?</div>
				<div>Jika dihapus maka Anda akan kehilangan data ini selamanya.</div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" id="deleteuser" data-href="<?php echo base_url(); ?>user/delete/<?php echo $u->id_user; ?>" class="btn btn-danger">Hapus</a>
				</div>
				</div>
			</div>

<script>
	$(document).ready(function() {
		$(".delete").click(function() {
			var href = $(this).attr("data-href");
			$("#modaldelete").modal('show');
			$("#deleteuser").attr('href', href);
		});

	});
</script>
