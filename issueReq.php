<?php
include '../connectivity.php';

	if(isset($_POST['approve'])){
		$cid = $_POST['app'];
		$bid = $_POST['app1'];
		$date = date("Y-m-d");
		$dueDate = date('Y-m-d', strtotime($date. ' + 10 days'));
		
		//entry in issued table
		$sql = "insert into issued values ('$bid', '$cid', '$date', '$dueDate','0')";
		$result = mysqli_query($con,$sql);
		
		//delete all entries of the book in requests table (requests by all customers for that book)
		$sql = "delete from requests where bid = '$bid' ;";
		$result = mysqli_query($con,$sql);
		
		//book status === requested -> issued
		$sql = "update book set status = 'issued' where bid = '$bid'";
		$result = mysqli_query($con,$sql);		
	}

	if(isset($_POST['disapprove'])){
		$cid = $_POST['disapp'];
		$bid = $_POST['disapp1'];
		$sql = "delete from requests where cid = '$cid' and  bid = '$bid' and purpose  = 'issue' ;";
		$result = mysqli_query($con,$sql);
	}

	
mysqli_close($con);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Issue Requests</title>
	<link rel="stylesheet" type="text/css" href="issueReq.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="book_issue_req_header" >Book Issue Requests</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
include '../connectivity.php';
	$sql = "select c.cid as cid, c.name as cname, b.bid as bid, b.name as bname, b.prize as prize from requests as r inner join customer as c inner join book as b on r.cid=c.cid and b.bid=r.bid and r.purpose = 'issue' ";
	$result = mysqli_query($con,$sql);

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Customer Name</th>
			<th>Book Name</th>
			<th>Book Prize</th>
			<th>Customer Fine</th>
			<th>Approval</th>
			<th>Disapproval</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result))
	{
		$cid = $row['cid'];
		$result1 = mysqli_query($con, "select sum(fine) as f from issued where cid='$cid' ");
		$row1 = mysqli_fetch_array($result1);
		echo "<tr>";
		echo "<td>" . $row['cname'] . "</td>";
		echo "<td>" . $row['bname'] . "</td>";
		echo "<td>" . $row['prize'] . "</td>";
		echo "<td>" . $row1['f'] . "</td>";

		echo "<td><form action = 'issueReq.php' method = 'POST'>
				<input type='hidden' name='app' value='".$row["cid"]."'/>
				<input type='hidden' name='app1' value='".$row["bid"]."'/>
				<input type='submit' name='approve' value='Approve' /></form></td>";
		echo "<td><form action = 'issueReq.php' method = 'POST'>
				<input type='hidden' name='disapp' value='".$row["cid"]."'/>
				<input type='hidden' name='disapp1' value='".$row["bid"]."'/>
				<input type='submit' name='disapprove' value='Disapprove' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

mysqli_close($con);
?>


</body>
</html>

