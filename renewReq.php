<?php
include '../connectivity.php';

	if(isset($_POST['approve'])){
		$cid = $_POST['app'];
		$date = date("Y-m-d");
		$dueDate = date('Y-m-d', strtotime($date. ' + 10 days'));
		
		//update issuedate and duedate in issued table
		$sql = "update issued set issueDate = '$date' and dueDate = '$dueDate' where cid = '$cid'";
		$result = mysqli_query($con,$sql);
		
		//delete all renew requests table
		$sql = "delete from requests where cid = '$cid' and purpose = 'renew' ;";
		$result = mysqli_query($con,$sql);
		
	}
	if(isset($_POST['disapprove'])){
		$cid = $_POST['app'];
		$sql = "delete from requests where cid = '$cid' and purpose = 'renew' ;";
		$result = mysqli_query($con,$sql);		
	}
	
mysqli_close($con);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Renew Requests</title>
	<link rel="stylesheet" type="text/css" href="renewReq.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="checkout_req_header" >Renew Requests</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
include '../connectivity.php';
	$sql = "select distinct c.cid as cid , name from requests as r inner join customer as c on c.cid = r.cid and purpose = 'renew' ";	
	$result = mysqli_query($con,$sql);

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Cust Id</th>
			<th>Customer Name</th>
			<th>Book</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result))
	{
		$cid = $row['cid'];
		$sql = "select b.bid as bid , b.name as name from requests as r inner join book as b on b.bid = r.bid and purpose = 'renew' and cid = '$cid' ";
		$result1 = mysqli_query($con, $sql);
		$bnames = ' ';
		while($row1 = mysqli_fetch_array($result1)){
			if($bnames == " ")
				$bnames = $row1['name'];
			else
				$bnames = $bnames . ", " . $row1['name'];				
		}
		
		
		echo "<tr>";
		echo "<td>" . $row['cid'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $bnames . "</td>";

		echo "<td><form action = 'renewReq.php' method = 'POST'>
				<input type='hidden' name='app' value='".$row["cid"]."'/>
				<input type='submit' name='approve' value='Approve' /></form></td>";

		echo "<td><form action = 'renewReq.php' method = 'POST'>
				<input type='hidden' name='app' value='".$row["cid"]."'/>
				<input type='submit' name='disapprove' value='Disapprove' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

mysqli_close($con);
?>


</body>
</html>

