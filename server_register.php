<?php 
include 'connectivity.php';

$Error = "";
$name = "";			
$mob = "";
$email = "";
$dob = "";
$add = "";
$un = "";
$pwd = "";

if(isset($_POST['register'])){
	$name = $_POST['name'];			
	
	$mob = $_POST['mobile'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$add = $_POST['address'];
			
	$un = $_POST['username'];
	$pwd = $_POST['password'];

	$sql = "select un from login where un = '$un' union select un from customerReq where un = '$un'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		$emp_id = "";
		$Error = "*Username already exists, please enter other Username";
	}			
	else{
		$sql = "insert into customerReq values('$un','$pwd', '$name','$mob', '$email','$dob', '$add')";
		$result = mysqli_query($con,$sql);
		
		if(!$result){
			$Error = "Something went wrong while requesting";
		}
	}
}

if(isset($_POST['back'])){
	header('Location:login.php');
}

mysqli_close($con);
?>
