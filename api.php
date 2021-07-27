<?php
// required header
header("Content-Type:application/json");
if (isset($_GET['student_id']) && $_GET['student_id']!="") {
	// get database connection
	include('connection.php');
	$student_id = $_GET['student_id'];
	$result = mysqli_query($con,
	"SELECT * FROM `tblStudents` WHERE student_id=$student_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$fname = $row['fname'];
	$lname = $row['lname'];
	$uname = $row['uname'];
	$email = $row['email'];
	$program = $row['program'];
	$contact = $row['contact'];
	response($student_id, $fname, $lname,$uname,$email,$program,$contact);
	mysqli_close($con);
	}else{
		// tell the user that the record does not exist
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($student_id,$fname,$lname,$uname,$email,$program,$contact){
	$response['student_id'] = $student_id;
	$response['fname'] = $fname;
	$response['lname'] = $lname;
	$response['uname'] = $uname;
	$response['email'] = $email;
	$response['program'] = $program;
	$response['contact'] = $contact;	
	$json_response = json_encode($response);
	echo $json_response;
}
?>
