<?php 
include '../connectivity.php';

$Error = "";
$name = "";			
$author = "";
$prize = "";
$year = "";
$rack = "";

if(isset($_POST['add'])){
	$name = $_POST['name'];		
	$author = $_POST['author'];
	$prize = $_POST['prize'];
	$year = $_POST['year'];			
	$rack= $_POST['rack'];

echo $year;

	$sql = "select * from book where name = '$name' and author = '$author' and prize = '$prize' and year = '$year'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		$emp_id = "";
		$Error = "*Book already exists";
	}			
	else{
		$sql = "insert into book (name, author, prize, year, rack, status) values('$name','$author', '$prize','$year', '$rack', 'available')";
		$result = mysqli_query($con,$sql);
		
		if(!$result){
			$Error = "Something went wrong while addiing book";
		}
	}
}

if(isset($_POST['back'])){
	header('Location:a_home.php');
}

mysqli_close($con);
?>

