<?php 
include 'auth.php';

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

// add level
if(isset($_POST['addLevel'])){
  $student = $_POST['id'];
  $class = $_POST['class'];
  $session = $_POST['session'];
  $status = 1;
  // check if data exist
  $checkLevel = $conn->query("SELECT * FROM student_classes WHERE class_id='".$class."' ");
  if(mysqli_num_rows($checkLevel) == 0) {
    $query = $conn->query("INSERT INTO student_classes (student_id, class_id, session, status) 
    VALUE('$student', '$class', '$session', '$status')") OR die($conn->error);
    if ($query) {
      // alert message
      $_SESSION['msg'] = 'The data has been saved';
      echo "<script> window.open('levels', '_self')</script>";
    }else{
      // alert message
      $_SESSION['msg'] = 'There is problem. Try again later';
      echo "<script> window.open('levels', '_self')</script>";
    }
  }else{
    $_SESSION['msg'] = 'You already enlisted this level';
    echo "<script> window.open('levels', '_self')</script>";
  }
}

// edit level
if(isset($_POST['editLevel'])){
  $id = $_POST['id'];
  $class = $_POST['class'];
  $session = $_POST['session'];
  // check if data exist
  $checkLevel = $conn->query("UPDATE student_classes SET class_id='".$class."', session='".$session."' WHERE sclass_id='".$id."' ");
  if($checkLevel) {
    // alert message
    $_SESSION['msg'] = 'The data has been updated';
    echo "<script> window.open('levels', '_self')</script>";
  }else{
    $_SESSION['msg'] = 'There is problem. Try again later';
    echo "<script> window.open('levels?action=editClass&id=".$id."', '_self')</script>";
  }
  // var_dump($session);
}


// sign up
if(isset($_POST['addCourse'])){
  $id = $_POST['id'];
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $checkCourse = $conn->query("SELECT * FROM student_courses WHERE course_id='".$course."' and sclass_id='".$id."' and semester='".$semester."' ");
  if(mysqli_num_rows($checkCourse) == 0){ 
    $conn->query("INSERT INTO student_courses (student_id, sclass_id, course_id, semester, status) 
    VALUE('$studentid', '$id', '$course', '$semester', '1')") OR die($conn->error);
  
    $_SESSION['msg'] = 'You registered a course successfully.';
    echo "<script> window.open('levels?action=showClass&id=".$id."', '_self')</script>";
  }else{
    $_SESSION['msg'] = 'The course is already registered.';
    echo "<script> window.open('levels?action=showClass&id=".$id."', '_self')</script>";
  }
}

// actions using anchor
if(!empty($_GET['action'])){
  switch ($_GET['action']) {
    // class
    case 'DeleteClass':
        $id = $_GET['id'];
        $column = 'sclass_id'; $table = 'student_classes';
        $process = $conn->query("DELETE FROM $table WHERE $column='".$id."'") or die($conn->error);
        $_SESSION['msg'] = 'You delete data successfully.';
        header("Location:levels");
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

// add request
if(isset($_POST['request'])){
  $studentid = $_POST['id'];
  $reg = $_POST['reg'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $marital = $_POST['marital'];
  $phone = $_POST['phone'];
  $state = $_POST['state'];
  $course = $_POST['course'];
  $class = $_POST['class'];
  $gdate = $_POST['gdate'];
  $jamb = $_POST['jambrn'];
  $cjamb = $_POST['cjambrn'];
  $serve = $_POST['serve'];
  $militry = $_POST['militry'];
  $status = 1;
  $checkRequest = $conn->query("SELECT * FROM requests WHERE student_id='".$studentid."' and status=1 ");
  if(mysqli_num_rows($checkRequest) == 0){ 
    $conn->query("INSERT INTO requests (student_id, reg, fname, lname, gender, dob, marital, phone, state, course, class, gdate, jamb, cjamb, serve, militry, status) 
    VALUE('$studentid', '$reg', '$fname', '$lname', '$gender', '$dob', '$marital', '$phone', '$state', '$course', '$class', '$gdate', '$jamb', '$cjamb', '$serve', '$militry', '1')") OR die($conn->error);
  
    $_SESSION['msg'] = 'Your request has been sent successfully.';
    echo "<script> window.open('status', '_self')</script>";
  }else{
    $_SESSION['msg'] = 'You already sent a request.';
    echo "<script> window.open('request', '_self')</script>";
  }
}
?>