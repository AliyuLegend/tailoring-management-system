<?php
include 'connection.php';
session_start();
if (isset($_SESSION['staffid'])) {
  $staffid = $_SESSION['staffid'];
}else {
  echo "<script>window.open('index', '_self')</script>";
}

  $staffINFOR = $conn->query("SELECT * FROM staffs WHERE staff_id='".$staffid."' ") or die($conn->error);
    while ($row = $staffINFOR->fetch_assoc()) {
      $tailorid = $row['tailor_id'];
      $role = $row['role'];
      $fname = $row['firstName'];
      $lname = $row['surName'];
      $emailAddress = $row['emailAddress'];
      $dob = $row['dateOfBirth'];
      $gender = $row['gender'];
      $maritalStatus = $row['maritalStatus'];
      $nationality = $row['nationality'];
      $address = $row['address'];
      $education = $row['education'];
      $picture = $row['picture'];
      $status = $row['status'];
    }

    $tailorINFOR = $conn->query("SELECT * FROM tailors WHERE tailor_id='".$tailorid."' ") or die($conn->error);
    while ($row = $tailorINFOR->fetch_assoc()) {
      $tailorid = $row['tailor_id'];
      $staffid = $row['staff_id'];
      $title = $row['title'];
      $motto = $row['motto'];
      $phone1 = $row['phoneNumber1'];
      $phone2 = $row['phoneNumber2'];
      $address = $row['address'];
      $logo = $row['logo'];
      $status = $row['status'];
    }
?>