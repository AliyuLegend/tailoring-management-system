<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tailoring Management System - Sign In</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="">
  <div class="container mt-5">
    <h2 class="text-center">Tailoring Management System</h2>
    <div class="card bg-light rounded card-login mx-auto mt-5">
      <div class="mt-3 text-center">
        <i class="fa fa-user-circle" style="font-size: 70px;"></i>
        <h3 class="text-center ">Sign In</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="log.php">
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <center>
            <input type="submit" class="btn btn-primary btn-lg" name="signin" value="Sign In" />
          </center>
          <div class="text-center mt-3">
            <a href="signup.php">Register as a Tailor</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="vendor/bootstrap-notify-3/dist/bootstrap-notify.min.js"></script>
  <?php session_start(); if (isset($_SESSION['msg'])) { $msg = $_SESSION['msg'];?>
  <script type="text/javascript">
      $(document).ready(function() {
          $.notify({
          title: "<b>Alert :</b>",
          message: "<?= $msg?>",
          icon: 'fa fa-bell',
          type: "info"
          });
      });
  </script>
  <?php  unset($_SESSION['msg']); }?>
</body>

</html>
