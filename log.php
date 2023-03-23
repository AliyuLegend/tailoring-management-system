<?php 
include 'connection.php';
session_start();
// sign up
if(isset($_POST['register'])){
  $title= htmlspecialchars($_POST['title']);
  $phone1 = $_POST['phone1'];
  $phone2 = $_POST['phone2'];
  $address = htmlspecialchars($_POST['address']);
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $role = 'Admin';
  $status = 1;
  // check if data exist
  $checkEmail = $conn->query("SELECT * FROM staffs WHERE emailAddress='".$email."' ");
  if(mysqli_num_rows($checkEmail) == 0){ 
    $query1 = $conn->query("INSERT INTO tailors (title, phoneNumber1, phoneNumber2, address, status) VALUE('$title', '$phone1', '$phone2', '$address', '$status')") OR die($conn->error);
    $tailorId = $conn->insert_id;
    $query = $conn->query("INSERT INTO staffs (tailor_id, role, firstName, surName, gender, dateOfBirth, emailAddress, password, status) 
    VALUE('$tailorId', '$role', '$fname', '$lname', '$gender', '$dob', '$email', '$password', '$status')") OR die($conn->error);
    if ($query) {      
      // alert message
      $_SESSION['msg'] = 'Account created successfully.';
      echo "<script> window.open('index', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again later';
      echo "<script> window.open('signup', '_self')</script>";
    }
  }else{
    // alert message
    $_SESSION['msg'] = 'The email already exist';
    echo "<script> window.open('signup', '_self')</script>";
  }
   
}

// Sign in
if(isset($_POST['signin'])){
  $username = $_POST['email'];
  $password = md5($_POST['password']);
  // verify
  $query = $conn->query("SELECT * FROM staffs WHERE emailAddress='".$username."' and password='".$password."' and status='1'");
  // if the record exist
  $result = mysqli_num_rows($query);
  if($result === 1) {
    // fetching user id
    while($row = $query->fetch_assoc()){
      $staffid = $row['staff_id'];
    }
    // preparing data for login
    $_SESSION['staffid'] = $staffid;
    echo "<script>window.open('home', '_self')</script>";
  }else{
    $_SESSION['msg'] = 'There is a problem try again later.';
    echo "<script>window.open('index', '_self')</script>";
  }

}

?>