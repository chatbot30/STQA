<?php 
include 'connectivity.php';

$Error = "";
$un = "";
$pwd = "";

session_start();

if(isset($_POST['login'])){
	$un = $_POST['username'];
	$pwd = $_POST['password'];

	$sql = "select * from login where type = 1";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();
	if(($pwd == $row['pwd'])&&($un == $row['un'])){
		$_SESSION['username'] = $un;
		$_SESSION['password'] = $pwd;
		header('Location:admin/a_home.php');
	}
	else{
		$Error = "*Incorrect Username or Password";		
	}
}
mysqli_close($con);
?>

