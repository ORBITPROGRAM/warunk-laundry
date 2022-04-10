<?php 

// memulai session
session_start();

// memanggil koneksi
include "include/koneksi.php";

// jika tombol login ditekan
if (isset($_POST['login'])) {
  $pesan_error = "";

  $username = htmlentities(strip_tags(trim($_POST["username"])));;
  $pass = htmlentities(strip_tags(trim($_POST["password"])));

  $login = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
  $cekUser = mysqli_num_rows($login);
  if ($cekUser > 0) {
    $row = mysqli_fetch_assoc($login);
    if (password_verify($pass, $row['userpass'])) {
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $row['userid'];
      $_SESSION['level'] = $row['level'];
      $_SESSION['tgllogin'] = date('Y-m-d H:i:s');
      $_SESSION['login'] = true;
      echo "
      <script>
        alert('Login berhasil');
        window.location.href = 'aplikasi.php';
      </script>
      ";
    }else{
      $pesan_error .= "Username / Password anda salah";
    }
  }else{
    $pesan_error .= "Username / Password anda salah";
  }
}else{
  $pesan_error = "";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <link rel="shortcut icon" href="assets/images/logo1.png" type="image/png"/>
        <title>Login Berbaju Laundry</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <style>
        .accountbg {
            background-image: url('assets/images/bglaundry.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <body class="fixed-left">
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="login.php"><img src="assets/images/logo1.png" width="200px"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-center mt-0 m-b-15">Login Berbaju Laundry</h4>

                        <?php if(!$pesan_error == "") : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $pesan_error; ?>
                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal m-t-20" action="" method="POST">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required placeholder="Username" name="username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


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

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>