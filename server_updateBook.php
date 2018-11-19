<?php 
include '../connectivity.php';

session_start();
$bid = $_SESSION['bid'];

$Error = "";
$name = "";			
$author = "";
$prize = "";
$year = "";
$rack = "";

$sql = "select * from book where bid = '$bid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$author = $row['author'];
$prize = $row['prize'];
$year = $row['year'];			
$rack= $row['rack'];

if(isset($_POST['update'])){
	$name = $_POST['name'];
	$author = $_POST['author'];
	$prize = $_POST['prize'];
	$year = $_POST['year'];			
	$rack= $_POST['rack'];

	$sql = "update book set name = '$name', author = '$author', prize = '$prize', year = '$year', rack ='$rack' where bid = '$bid'";
	$result = mysqli_query($con,$sql);
	
	if(!$result){
		$Error = "Something went wrong while addiing book";
	}
}

if(isset($_POST['back'])){
	header('Location:viewBooks.php');
}

mysqli_close($con);
?>

