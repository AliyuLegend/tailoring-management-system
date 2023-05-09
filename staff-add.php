<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Staffs - Tailoring Management System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include 'auth.php'; include 'components/navbar.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="staffs">Staffs</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="staff-add">Add Staffs</a>
        </li>
      </ol>
      <!-- table -->
      <div class="col-md-6 mx-auto">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="text-center text-primary">Add Staff</h3>
                <form method="POST" action="process.php" enctype="multipart/form-data">
                    <div class="row">
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
                            <select class="form-control" name="gender">
                                <option value="">Choose..</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                        <?php
                          $rand2 = strtoupper(substr(uniqid(sha1(time())),0,4)); $date = date("Y"); $random = substr(mt_rand(99999,999999999),0,3);
                          $staffID = $date."-".$random .$rand2;
                        ?>
                            <label for="exampleInputEmail1">Staff ID</label>
                            <input class="form-control" type="text" value="<?= $staffID?>" name="staffID">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Type</label>
                            <select class="form-control" name="type">
                                <option value="">Choose..</option>
                                <option>Junior Staff</option>
                                <option>Senior Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Education</label>
                            <select class="form-control" name="education">
                                <option value="">Choose..</option>
                                <option>None</option>
                                <option>SSCE</option>
                                <option>National Diploma</option>
                                <option>NCE</option>
                                <option>HND</option>
                                <option>Bachelor Degree</option>
                                <option>Masters Degree</option>
                                <option>Postgraduate Degree</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Nationality</label>
                            <select class="form-control" name="nationality">
                                <option value="">Choose..</option>
                                <option>Nigeria</option>
                                <option>Niger</option>
                                <option>Benin</option>
                                <option>Cameroon</option>
                                <option>Senegal</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Address</label>
                            <input class="form-control" type="text" name="address">
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Picture</label>
                            <input class="form-control" type="file" name="picture">
                        </div>
                    </div>                    
                    <div class="text-center mt-3">
                      <center>
                          <input type="submit" class="btn btn-primary" name="staffAdd" value="Submit" />
                      </center>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include 'components/footer.php';?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="vendor/bootstrap-notify-3/dist/bootstrap-notify.min.js"></script>
  <?php  if (isset($_SESSION['msg'])) { $msg = $_SESSION['msg'];?>
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
  </div>
</body>

</html>