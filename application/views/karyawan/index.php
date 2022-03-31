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

<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

  <a href="<?php echo base_url('karyawan/add'); ?>" class="btn btn-outline-success mb-3 ">Tambah Karyawan</a>

<div class="card">
  <div class="card-body">
	<!-- Table with stripped rows -->
	<table class="table datatable">
	  <thead>
		<tr>
		  <th scope="col">NO</th>
		  <th scope="col">NIP</th>
		  <th scope="col">Nama</th>
		  <th scope="col">Jabatan</th>
		  
		  <th scope="col">Aksi</th>
		</tr>
	  </thead>
	  <tbody>

	  	<?php $no = 1; ?>
		<?php foreach($karyawan as $k) :?>
		<tr>
		  <th scope="row"><?php echo $no++; ?></th>
		  <td><?php echo $k->nip; ?></td>
		  <td><?php echo $k->nama_karyawan; ?></td>
		  <td><?php echo $k->kode_jabatan; ?></td>
		  <td>
		  		<a href="<?php echo base_url('user/view/') . $k->id_karyawan ?>"><span class="badge bg-info"><i class="bi bi-eye me-1"></i> Lihat</span></a>
		 		<a href="<?php echo base_url('user/edit/') . $k->id_karyawan ?>"><span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Edit</span></a>
				<a href="<?php echo base_url('user/delete/') . $k->id_karyawan ?>"><span class="badge bg-danger"><i class="bi bi-trash me-1"></i> Hapus</span></a>
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

