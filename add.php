<?php
include('connection.php');
$fname   = $_POST['fname'];
$lname  = $_POST['lname'];
$uname=$_POST['uname'];
 $email=$_POST['email'];
 $password   = $_POST['upassword'];
$contact  = $_POST['contact'];
$program=$_POST['program'];


$sql = "INSERT INTO tblstudents (fname,lname,uname, upassword, email, program,contact)
VALUES ('$fname', '$lname', '$uname','$password', '$email', '$program','$contact')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}        
           
        ?>