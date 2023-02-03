<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Manajemen Keuangan KPID Kalimantan Selatan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->

    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == "gagal") {
        echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
      } else if ($_GET['alert'] == "logout") {
        echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
      } else if ($_GET['alert'] == "belum_login") {
        echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
      }
    }
    ?>
    </center>

    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><img src="assets/logo.png" width="100px"></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk Untuk Menggunakan</p>
        <br />

        <span style="color: green;">
          <center>
            <h5>Masukkan User & Password Anda</h5>
          </center>
        </span></p>
        <form action="periksa_login.php" method="POST">
          <div class="input-group mb-3">
            <input type="username" class="form-control" placeholder="username" name="username" required="required" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
        <br />
        <span style="color: black;">
          <center>
            <h5>2022 KPID KALIMANTAN SELATAN</h5>
          </center>
        </span></p>
      </div>
    </div>
  </div>



  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>