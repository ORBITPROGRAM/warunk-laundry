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
  <div class="row mb-4">
	<div class="col-md-12">
		<div class="card my-auto mx-5">
			<div class="card-body text-center py-5">
				<h3 class="text-success"><b>BERHASIL DITAMBAHKAN</b></h3>
				<i class="bi bi-check-circle-fill" style="font-size:150px; color:green"></i>
				
				<?php foreach($karyawan as $k) : ?>
				<h4 class="text-dark mb-4"><b>Karyawan baru yang bernama : <?php echo $k->nama_karyawan; ?></b></h4>
				<?php endforeach; ?>
				
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo base_url('karyawan'); ?>" class="btn btn-sm btn-secondary"><i class="fas fa-dollar-sign mr-1"></i>Ke List Karyawan</a>
						<a href="<?php echo base_url('karyawan/add'); ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-images mr-1"></i>Tambah Karyawan</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
  </div>
</section>

</main><!-- End #main -->

