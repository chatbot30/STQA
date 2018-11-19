<?php
include '../connectivity.php';

	if(isset($_POST['approve'])){
		$un = $_POST['app'];
		$sql = "select * from customerReq where un = '$un' ;";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

		$name = $row['name'];
		$mob = $row['mobile'];
		$email = $row['email'];
		$dob = $row['dob'];
		$address = $row['address'];

		$pwd = $row['pwd'];

		$sql = "insert into customer (name, address, email, mobile, dob, un) values ('$name', '$address', '$email', '$mob', '$dob', '$un')";
		$result = mysqli_query($con,$sql);

		$sql = "insert into login values ('$un', '$pwd', 0)";
		$result = mysqli_query($con,$sql);

		$sql = "delete from customerReq where un = '$un' ;";
		$result = mysqli_query($con,$sql);
		
		header('Location:customerReq.php');		
	}

	if(isset($_POST['disapprove'])){
		$un = $_POST['disapp'];
		$sql = "delete from customerReq where un = '$un' ;";
		$result = mysqli_query($con,$sql);

		header('Location:customerReq.php');	
	}

	
mysqli_close($con);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm Customers</title>
	<link rel="stylesheet" type="text/css" href="customerReq.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="confirm_cust_header" >Customer Requests</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
include '../connectivity.php';

	$result = mysqli_query($con,"select * from customerReq");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>DOB</th>
			<th>Address</th>
			<th>Approval</th>
			<th>Disapproval</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['un'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['mobile'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['dob'] . "</td>";
		echo "<td>" . $row['address'] . "</td>";

		echo "<td><form action = 'customerReq.php' method = 'POST'><input type='hidden' name='app' value='".$row["un"]."'/><input type='submit' name='approve' value='Approve' /></form></td>";
		echo "<td><form action = 'customerReq.php' method = 'POST'><input type='hidden' name='disapp' value='".$row["un"]."'/><input type='submit' name='disapprove' value='Disapprove' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

mysqli_close($con);
?>


</body>
</html>

