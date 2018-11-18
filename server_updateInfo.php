<?php 
include '../connectivity.php';

$Error = "";
$name = "";			
$mob = "";
$email = "";
$dob = "";
$add = "";

session_start();
$cid = $_SESSION['cid'];

$sql = "select * from customer where cid = '$cid'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) == 1){
	$row = $result->fetch_assoc();
	$name = $row['name'];				
	$mob = $row['mobile'];
	$email = $row['email'];
	$dob = $row['dob'];
	$add = $row['address'];
}

if(isset($_POST['update'])){
	$name = $_POST['name'];				
	$mob = $_POST['mobile'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$add = $_POST['address'];

		$sql = "update customer set name='$name', mobile='$mob', email='$email', dob='$dob', address='$add')";
		$result = mysqli_query($con,$sql);

	$sql = "select un from login where un = '$un' union select un from customerReq where un = '$un'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		$emp_id = "";
		$Error = "*Username already exists, please enter other Username";
	}			
	else{
		
		if(!$result){
			$Error = "Something went wrong while requesting";
		}
	}
}

if(isset($_POST['back'])){
	header('Location:home.php');
}

mysqli_close($con);
?>
