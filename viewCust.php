<!DOCTYPE html>
<html>
<head>
	<title>View Customers</title>
	<link rel="stylesheet" type="text/css" href="viewCust.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="view_cust_header" >View Requests</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
	include '../connectivity.php';

	$result = mysqli_query($con,"select * from customer");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Cust Id</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>DOB</th>
			<th>Address</th>
	</tr>";
	//		<th>Approval</th>
	//		<th>Disapproval</th>

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['cid'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['mobile'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['dob'] . "</td>";
		echo "<td>" . $row['address'] . "</td>";

	//	echo "<td><form action = 'confirm_customers.php' method = 'POST'><input type='hidden' name='app' value='".$row["un"]."'/><input type='submit' name='approve' value='Approve' /></form></td>";
	//	echo "<td><form action = 'confirm_customers.php' method = 'POST'><input type='hidden' name='disapp' value='".$row["un"]."'/><input type='submit' name='disapprove' value='Disapprove' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

	mysqli_close($con);
?>


</body>
</html>

