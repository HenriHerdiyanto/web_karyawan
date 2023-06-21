<?php
session_start();
require_once 'controller/utility.php';


$error = "";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['pass'];
  // $password2 = sha1($password);
  $link = "getUser&username=" . urlencode($username) . "&password=" . urlencode($password);
  $data = getRegistran($link);
  if ($data) {
    if ($data->status == '0') {
      $error = "Pengguna tidak terdaftar";
    } else {
      $user = $data->data[0]->username;
      $id_user = $data->data[0]->id_user;
      $pass = $data->data[0]->password;
      $level = $data->data[0]->level_user;
      if ($username = $user && $password = $pass && $level = 0) {
        $_SESSION["login"] = $id_user;
        $_SESSION["user"] = $level;
        echo "<script>alert('Login Berhasil')</script>";
        echo ("<script>location.href = 'index.php';</script>");
      } elseif ($username = $user && $password = $pass && $level = 1) {
        $_SESSION["login"] = $id_user;
        $_SESSION["user"] = $level;
        echo "<script>alert('Login Berhasil')</script>";
        echo ("<script>location.href = 'kordinator.php';</script>");
      }
    }
  } else {
    echo "<script>alert('Username atau Password salah')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

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
    <div class="login-logo">
      <a href="login_user.php"><b>L<img src="assets/img/logomt.png" class="" style="width: 40px;">GIN</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block w-100" name="login">Sign In as Manager</button>
              <a class="btn btn-primary btn-block w-100" href="login_user.php">Sign In as Staff</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>