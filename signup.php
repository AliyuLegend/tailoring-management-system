<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tailoring Management System - Register a New Tailor</title>
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
    <div class="col-md-6 card bg-light rounded mx-auto mt-5">
      <div class="mt-3 text-center">
        <i class="fa fa-user-circle" style="font-size: 70px;"></i>
        <h3 class="text-center ">Register a New Tailor</h3>
      </div>
      <div class="card-body p-2">
        <form method="POST" action="log.php">
          <div class="form-group row">
            <div class="col-md-12">
                <h5>Business Information</h5>
            </div>
            <div class="col-md-12">
                <label>Business Title</label>
                <input class="form-control" type="text" name="title" placeholder="Business name">
            </div>
            <div class="col-md-6">
                <label>Phone Number 1</label>
                <input class="form-control" type="text" name="phone1" required placeholder="phone number">
            </div>
            <div class="col-md-6">
                <label>Phone Number 2</label>
                <input class="form-control" type="text" name="phone2" placeholder="Phone number (optional)">
            </div>
            <div class="col-md-12">
                <label>Address</label>
                <input class="form-control" type="text" name="address" placeholder="Business Address">
            </div>
            <div class="col-md-12 mt-2">
                <h5>Admin Information</h5>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">First Name</label>
                <input class="form-control" type="text" placeholder="Your first name" name="fname">
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">Last Name</label>
                <input class="form-control" type="text" placeholder="Your last name" name="lname">
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">Date of Birth</label>
                <input class="form-control" type="date" placeholder="Your date of birth" name="dob">
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">Gender</label>
                <input class="form-control" type="text" placeholder="Your gender" name="gender">
            </div>
            <div class="col-md-7">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" type="text" placeholder="Your email address" name="email">
            </div>
            <div class="col-md-5">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
          </div>
          <center>
            <input type="submit" class="btn btn-primary btn-lg" name="register" value="Register" />
          </center>
          <div class="text-center mt-3">
            <p>Have account ? <a href="index">Sign In</a></p>
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
