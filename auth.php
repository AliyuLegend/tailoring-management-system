<?php
include 'connection.php';
session_start();
if (isset($_SESSION['adminid'])) {
  $adminid = $_SESSION['adminid'];
}else {
  echo "<script>window.open('index', '_self')</script>";
}

  $adminINFOR = $conn->query("SELECT * FROM data_clark WHERE dataClark_id='".$adminid."' ") or die($conn->error);
    while ($row = $adminINFOR->fetch_assoc()) {
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
      $btitle = $row['businessTitle'];
      $bmotto = $row['businessMotto'];
      $bphone1 = $row['businessPhone1'];
      $bphone2 = $row['businessPhone2'];
      $baddress = $row['businessAddress'];
      $blogo = $row['businessLogo'];
    }
?>