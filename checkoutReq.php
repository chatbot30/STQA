<?php
include '../connectivity.php';

	if(isset($_POST['approve'])){
		if($_POST['v'] == 'Approve'){
			$cid = $_POST['app'];
			$sql = "delete from issued where cid = '$cid' and bid in (select bid from requests where cid = '$cid' and purpose = 'checkout')";
			$result = mysqli_query($con,$sql);		

			$sql = "update book set status = 'available' where bid in (select bid from requests where cid = '$cid' and purpose = 'checkout')";
			$result = mysqli_query($con,$sql);		

			$sql = "delete from requests where cid = '$cid' and purpose = 'checkout' ";
			$result = mysqli_query($con,$sql);		
		}
		else {
			$cid = $_POST['app'];
			
		}	
	}

	
mysqli_close($con);	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout Requests</title>
	<link rel="stylesheet" type="text/css" href="checkoutReq.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="checkout_req_header" >Checkout Requests</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
include '../connectivity.php';
	$sql = "select distinct c.cid as cid , name from requests as r inner join customer as c on c.cid = r.cid and purpose = 'checkout' ";

//	$sql = "select c.cid as cid, c.name as cname, b.bid as bid, b.name as bname, b.prize as prize from requests as r inner join customer as c inner join book as b on r.cid=c.cid and b.bid=r.bid and r.purpose = 'checkout' ";
	
	
	$result = mysqli_query($con,$sql);

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Cust Id</th>
			<th>Customer Name</th>
			<th>Book / Books</th>
			<th>Total Fine</th>
			<th>Billing</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result))
	{
		$cid = $row['cid'];
		$sql = "select b.bid as bid , b.name as name from requests as r inner join book as b on b.bid = r.bid and purpose = 'checkout' and cid = '$cid' ";
		$result1 = mysqli_query($con, $sql);
		$bnames = ' ';
		while($row1 = mysqli_fetch_array($result1)){
			if($bnames == " ")
				$bnames = $row1['name'];
			else
				$bnames = $bnames . ", " . $row1['name'];				
		}
		
		$result1 = mysqli_query($con, "select sum(fine) as totalFine from issued where bid in (select b.bid as bid from requests as r inner join book as b on b.bid = r.bid and purpose = 'checkout' and cid = '$cid') ");
		$row1 = mysqli_fetch_array($result1);
		
		echo "<tr>";
		echo "<td>" . $row['cid'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $bnames . "</td>";
		echo "<td>" . $row1['totalFine'] . "</td>";

		$value = 'Go for bill';
		if( $row1['totalFine'] == 0)
			$value = 'Approve';
			
		echo "<td><form action = 'checkoutReq.php' method = 'POST'>
				<input type='hidden' name='app' value='".$row["cid"]."'/>
				<input type='hidden' name='v' value='$value'/>
				<input type='submit' name='approve' value='$value' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

mysqli_close($con);
?>


</body>
</html>

