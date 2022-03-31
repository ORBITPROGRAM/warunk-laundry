<main id="main" class="main">

<div class="pagetitle">
  <h1><?php echo $title; ?></h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
	  <li class="breadcrumb-item active"><?php echo $title; ?></li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

  <a href="<?php echo base_url('jabatan/add'); ?>" class="btn btn-outline-success mb-3 ">Tambah Jabatan</a>

<div class="card">
  <div class="card-body">
	<!-- Table with stripped rows -->
	<table class="table datatable">
	  <thead>
		<tr>
		  <th scope="col">NO</th>
		  <th scope="col">KODE JABATAN</th>
		  <th scope="col">NAMA JABATAN</th>
		  <th scope="col">GAJI POKOK</th>
		  <th scope="col">UANG MAKAN</th>
		  
		  <th scope="col">AKSI</th>
		</tr>
	  </thead>
	  <tbody>

	  	<?php $no = 1; ?>
		<?php foreach($jabatan as $j) :?>
		<tr>
		  <th scope="row"><?php echo $no++; ?></th>
		  <td><?php echo $j->kode_jabatan; ?></td>
		  <td><?php echo $j->nama_jabatan; ?></td>
		  <td><?php echo $j->gaji_pokok; ?></td>
		  <td><?php echo $j->uang_makan; ?></td>
		  <td>
		 		<a href="<?php echo base_url('jabatan/edit/') . $j->kode_jabatan ?>"><span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Edit</span></a>
				<a href="<?php echo base_url('jabatan/delete/') . $j->kode_jabatan ?>"><span class="badge bg-danger"><i class="bi bi-trash me-1"></i> Hapus</span></a>
		  </td>
		</tr>
		<?php endforeach; ?>
		

	  </tbody>
	</table>
	<!-- End Table with stripped rows -->

  </div>
</div>

</div>
	
  </div>
</section>

</main><!-- End #main -->

