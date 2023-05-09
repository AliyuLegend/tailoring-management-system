<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Staffs - All Staffs</title>
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
            <a href="home">Staffs</a>
        </li>
      </ol>
      <?php
        $allStaffs = $conn->query("SELECT * FROM staffs WHERE dataClark_id='".$adminid."' ");
      ?>
      <!-- table -->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> All Staffs (<?= mysqli_num_rows($allStaffs)?>)
            <a href="staff-add" class="float-right btn btn-primary btn-sm">Add Staff</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>StaffID</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>StaffID</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                  $count = 1;
                  while ($row = $allStaffs->fetch_assoc()) {
                ?>
                <tr>
                  <td><?= $count?></td>
                  <td><?= $row['firstName'] ." ". $row['surName']?></td>
                  <td><?= $row['gender']?></td>
                  <td><?= $row['type']?></td>
                  <td><?= $row['staffID']?></td>
                  <td>
                    <a href="staff-view?id=<?= $row['staff_id']?>" class="mx-2"><i class="fa fa-eye"></i></a>
                    <a href="staff-edit?id=<?= $row['staff_id']?>" class="mx-2"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                <?php 
                    $count++;
                  }
                ?>
              </tbody>
            </table>
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
