<?php 
include 'auth.php';

/********************
      functions
********************/
function uploadPicture($target,$picname, $picture){
  $array = explode('.', $picname);
  $last = count($array) - 1;
  $ext = isset($array[$last]) ? $array[$last] : 'none';
  $original = explode('.', $picture["name"]);
  $extension = array_pop($original);
  move_uploaded_file($picture["tmp_name"], $target . $picname . ".".$extension);
  $picname =   $target .$picname . ".".$extension;
return $picname;
}
// update profile
if(isset($_POST['editProfile'])){
  
  $id = $_POST['id'];
  $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
  $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $lga = $_POST['lga'];
  $state = $_POST['state'];
  $address = $_POST['address'];
  $level = $_POST['level'];
  $faculty = $_POST['faculty'];
  $dep = $_POST['dep'];

  $query = $conn->query("UPDATE students SET fname='$fname', lname='$lname', dob='$dob', gender='$gender', phone='$phone', lga='$lga', state='$state', address='$address', level='$level', faculty='$faculty', department='$dep' WHERE student_id='".$id."'") OR die($conn->error);
  $_SESSION['msg'] = 'Your profile has been updated.';
echo "<script> window.open('profile', '_self')</script>";
}

/********************
      STAFFS
********************/ 
// add staff
if(isset($_POST['staffAdd'])){
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $staffid = $_POST['staffID'];
  $type = $_POST['type'];
  $education = $_POST['education'];
  $nationality = $_POST['nationality'];
  $address = htmlspecialchars($_POST['address']);
  // picture
  $target = "vendor/uploads/staffs/";
  $ran = mt_rand(0,999999999); $picname = "staff-" .$ran . time();
  $picture = uploadPicture($target,$picname,$_FILES["picture"]);
  // query
  $query = $conn->query("INSERT INTO staffs (dataClark_id, firstName, surName, staffID, type, dateOfBirth, gender, nationality, address, education, picture) 
    VALUE('$adminid', '$fname', '$lname', '$staffid', '$type', '$dob', '$gender', '$nationality', '$address', '$education', '$picture')") OR die($conn->error);
    if ($query) {
      // alert message
      $_SESSION['msg'] = 'The data has been saved';
      echo "<script> window.open('staffs', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again';
      echo "<script> window.open('staff-add', '_self')</script>";
    }
}

// edit staff
if(isset($_POST['staffEdit'])){
  $id = $_POST['id'];
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $education = $_POST['education'];
  $nationality = $_POST['nationality'];
  $address = htmlspecialchars($_POST['address']);
  $checkEmptyPicture = array_filter($_FILES["picture"]);

  if($_FILES["picture"]['name'] !== ''){
    // picture
    $target = "vendor/uploads/staffs/";
    $ran = mt_rand(0,999999999); $picname = "staff-" .$ran . time();
    $picture = uploadPicture($target,$picname,$_FILES["picture"]);
    // query
    $query = $conn->query("UPDATE staffs SET firstName='$fname', surName='$lname', type='$type', dateOfBirth='$dob', gender='$gender', nationality='$nationality', address='$address', education='$education', picture='$picture' WHERE staff_id='$id'") OR die($conn->error);
  }else{
    // query
    $query = $conn->query("UPDATE staffs SET firstName='$fname', surName='$lname', type='$type', dateOfBirth='$dob', gender='$gender', nationality='$nationality', address='$address', education='$education' WHERE staff_id='$id'") OR die($conn->error);
  }
  if ($query) {
      // alert message
      $_SESSION['msg'] = 'The data has been saved';
      echo "<script> window.open('staffs', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again';
      echo "<script> window.open('staff-edit', '_self')</script>";
    }
}

/********************
      CUSTOMERS
********************/ 

// add Customer
if(isset($_POST['customerAdd'])){
  $name = htmlspecialchars($_POST['name']);
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $address = htmlspecialchars($_POST['address']);
  // query
  $query = $conn->query("INSERT INTO customers (dataClark_id, name, gender, phoneNumber, address) 
    VALUE('$adminid', '$name', '$gender', '$phone', '$address')") OR die($conn->error);
    if ($query) {
      // alert message
      $_SESSION['msg'] = 'The data has been saved';
      echo "<script> window.open('customers', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again';
      echo "<script> window.open('customer-add', '_self')</script>";
    }
}

// edit customer
if(isset($_POST['customerEdit'])){
  $id = $_POST['id'];
  $name = htmlspecialchars($_POST['name']);
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $address = htmlspecialchars($_POST['address']);
  // query
  $query = $conn->query("UPDATE customers SET name='$name', gender='$gender', phoneNumber='$phone', address='$address' WHERE customer_id='$id'") OR die($conn->error);
  if ($query) {
      // alert message
      $_SESSION['msg'] = 'The data has been saved';
      echo "<script> window.open('customers', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again';
      echo "<script> window.open('customer-edit', '_self')</script>";
    }
}

// actions using anchor
if(!empty($_GET['action'])){
  switch ($_GET['action']) {
    // class
    case 'DeleteStaff':
        $id = $_GET['id'];
        $column = 'staff_id'; $table = 'staffs';
        $process = $conn->query("DELETE FROM $table WHERE $column='".$id."'") or die($conn->error);
        $_SESSION['msg'] = 'You delete data successfully.';
        echo "<script> window.open('staffs', '_self')</script>";
        break;

    // course
    case 'DeleteCourse':
        $id = $_GET['id'];
        $cid = $_GET['cid'];
        $column = 'scourse_id'; $table = 'student_courses';
        $process = $conn->query("DELETE FROM $table WHERE $column='".$id."'") or die($conn->error);
        $_SESSION['msg'] = 'You delete data successfully.';
        echo "<script> window.open('levels?action=showClass&id=".$cid."', '_self')</script>";
        break;
  }
}

?>