<?php 

// memulai session
session_start();

// menghilangkan undifine error index
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// membuat keamanan, jika belum login maka kembali ke login.php
if (!isset($_SESSION['login'])) {
  header('location: login.php');
}

// menyertakan koneksi.php
include "include/koneksi.php";

// menampilkan data user yang sedang login
$id = $_SESSION['userid'];
$users = mysqli_query($conn, "SELECT * FROM tb_users WHERE userid = '$id'");
$tampilusers = mysqli_fetch_assoc($users);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <title>Kasir Warunk Laundry</title>
    <!-- <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" /> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- <link rel="icon" href="assets/images/logo1.png" type="image/png" > -->
    <link rel="shortcut icon" href="assets/images/logo1.png" type="image/png"/>

    <link href="assets/plugins/morris/morris.css" rel="stylesheet" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="assets/sweeetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweeetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- webcam -->
    <script src="assets/js/webcam.min.js"></script>

    <!-- select -->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
  </head>

  <body class="fixed-left">
    <!-- Loader -->

    <!-- Begin page -->
    <div id="wrapper">
      <!-- ========== Left Sidebar Start ========== -->
      <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
          <i class="ion-close"></i>
        </button>

        <!-- LOGO -->
        <div class="topbar-left">
          <div class="text-center">
            <a href="aplikasi.php"><img src="assets/images/logo1.png" width="160px"></a>
          </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

          <!-- memasukkan menu.php -->
          <?php include "include/menu.php"; ?>

          <div class="clearfix"></div>
        </div>
        <!-- end sidebarinner -->
      </div>
      <!-- Left Sidebar End -->

      <!-- Start right Content here -->
      <div class="content-page background">

        <!-- Start content -->
        <div class="content">
          <!-- Top Bar Start -->
          <div class="topbar bg-gray">
            <nav class="navbar-custom">
              <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                  <a
                    class="
                      nav-link
                      dropdown-toggle
                      arrow-none
                      waves-effect
                      nav-user
                    "
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                  >

                  <!-- jika foto profile ada -->
                  <?php if(!empty($tampilusers['userfoto'])) { ?>
                    <img
                      src="fotouser/<?= $tampilusers['userfoto']; ?>";
                      alt="user"
                      class="rounded-circle"
                    />
                  <?php }else{ ?>
                    <img
                      src="fotouser/default.svg";
                      alt="user"
                      class="rounded-circle"
                    />
                  <?php } ?>

                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right profile-dropdown"
                  >
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                      <h5>Welcome <?= $tampilusers['username']; ?></h5>
                    </div>
                    
                    <a class="dropdown-item" href="?page=profile&id=<?= $_SESSION['userid']; ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>Profile</a>
                    
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda ingin logout ?');"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                  </div>
                </li>
              </ul>

              <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                  <button
                    class="
                      button-menu-mobile
                      open-left
                      waves-light waves-effect
                    "
                  >
                    <i class="mdi mdi-menu"></i>
                  </button>
                </li>
              </ul>

              <div class="clearfix"></div>
            </nav>
          </div>
          <!-- Top Bar End -->

        <!-- memasukkan konten-->
        <?php include "include/konten.php"; ?>
       
        <!-- Page content Wrapper -->
        </div>
        <!-- content -->

        <footer class="footer">

          Warunk Laundry - <?= date('Y'); ?>
          
        </footer>
      </div>
      <!-- End Right content here -->
    </div>
    <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/skycons/skycons.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>

        <!-- select2 -->
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <!-- Plugins js -->
        <script src="assets/plugins/timepicker/moment.js"></script>
        <script src="assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
        <script src="assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
        <script src="assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
        <script src="assets/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript"></script>

        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
         <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="assets/plugins/datatables/jszip.min.js"></script>
         <script src="assets/plugins/datatables/pdfmake.min.js"></script>
         <script src="assets/plugins/datatables/vfs_fonts.js"></script>
         <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
         <script src="assets/plugins/datatables/buttons.print.min.js"></script>
         <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
         <!-- Datatable init js -->
         <script src="assets/pages/datatables.init.js"></script>

        <!-- Plugins Init js -->
        <script src="assets/pages/form-advanced.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    <script>
      /* BEGIN SVG WEATHER ICON */
      if (typeof Skycons !== "undefined") {
        var icons = new Skycons({ color: "#fff" }, { resizeClear: true }),
          list = [
            "clear-day",
            "clear-night",
            "partly-cloudy-day",
            "partly-cloudy-night",
            "cloudy",
            "rain",
            "sleet",
            "snow",
            "wind",
            "fog",
          ],
          i;

        for (i = list.length; i--; ) icons.set(list[i], list[i]);
        icons.play();
      }

      // scroll

      $(document).ready(function () {
        $("#boxscroll").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
        $("#boxscroll2").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
      });
    </script>

    <script>
    function previewFoto(){
      const foto = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
      imgPreview.src = e.target.result;
      }
    }

    function printContent(el){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
    </script>
  </body>
</html>
