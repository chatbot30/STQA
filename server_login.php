<?php 
include 'connectivity.php';

$Error = "";
$un = "";
$pwd = "";

session_start();

if(isset($_POST['login'])){
	$un = $_POST['username'];
	$pwd = $_POST['password'];

	$sql = "select * from login where type = 0 and un = '$un'";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();

	if($pwd == $row['pwd']){
		$_SESSION['username'] = $un;
		$_SESSION['password'] = $pwd;
		$result = mysqli_query($con,"select cid from customer where un = '$un'");
		$row = $result->fetch_assoc();
		$_SESSION['cid'] = $row['cid'];		
		header('Location:customer/home.php');
	}
	else{
		$Error = "*Incorrect Username or Password";		
	}
	
	$sql = "select pwd from customerReq where un = '$un'";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();

	if($pwd == $row['pwd']){
		$Error = "*Your register request is yet to be confirmed by admin";			
	}	
	
}
mysqli_close($con);
?>

