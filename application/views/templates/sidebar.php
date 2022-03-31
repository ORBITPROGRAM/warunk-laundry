
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#layanan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Layanan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="layanan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Harga Layanan</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Tipe Layanan</span>
            </a>	
		 </li>
        </ul>
      </li><!-- End Layanan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pelanggan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Pelanggan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pelanggan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Pelanggan Baru</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Repeat Order</span>
            </a>	
		 </li>
		 <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Member Bulanan</span>
            </a>	
		 </li>
        </ul>
      </li><!-- End Pelanggan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#karyawan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data Karyawan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="karyawan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('karyawan'); ?>">
              <i class="bi bi-circle"></i><span>List Karyawan</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Absensi Karyawan</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Penggajian Karyawan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Karyawan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Transaksi Pengeluaran</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Transaksi Pemasukan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Transaksi Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Data Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Pengeluaran</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Pemasukan</span>
            </a>
          </li>
          </li>
		  <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Stok Bahan Baku</span>
            </a>
          </li>
        </ul>
      </li><!-- End Laporan Nav -->

	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kurir-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Data Kurir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kurir-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Data Pengantaran Barang</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Data Penjemputan Barang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kurir Nav -->

	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pengguna-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Data Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pengguna-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>List Pengguna Aplikasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kurir Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
