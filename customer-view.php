<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Customers - View Customer</title>
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
  <?php 
    include 'auth.php'; include 'components/navbar.php';
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo "<script> window.open('Customers', '_self')</script>";
    }

    // get Customer information
    $getCustomer = $conn->query("SELECT * FROM customers WHERE customer_id='".$id."' ");
    while ($row = $getCustomer->fetch_assoc()) {
        $name = $row['name'];
        $gender = $row['gender'];
        $phone = $row['phoneNumber'];
        $address = $row['address'];
    }
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="customers">Customers</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="customer-add">Add Customers</a>
        </li>
      </ol>
      <!-- table -->
      <div class="col-md-8 mx-auto">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="text-center text-primary">Customer Information</h3>
                <center>
                    <i class="fa fa-user-circle my-3" style="font-size: 70px;"></i>
                </center>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                        <li><b>Name :</b> <?= $name ?></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><b>Gender :</b> <?= $gender ?></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><b>Phone Number :</b> <?= $phone ?></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><b>Address :</b> <?= $address ?></li>
                        </ul>
                    </div>
                </div>
                <center>
                    <a href="customer-edit?id=<?= $id ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a href="process?action=DeleteCustomer&id=<?= $id ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Delete</a>
                </center>
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