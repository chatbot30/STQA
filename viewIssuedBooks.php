<?php
	include '../connectivity.php';

	session_start();
	$cid = $_SESSION['cid'];
	
	if(isset($_POST['checkout'])){
		$bid = $_POST['bid'];

		if($_POST['v'] == 'Request Checkout'){
			$sql = "select * from requests where bid ='$bid' and cid = '$cid' and purpose = 'renew')";
			$result = mysqli_query($con,$sql);		
			
			if( mysqli_num_rows($result) == 0) {
				$date = date("Y-m-d");
				$sql = "insert into requests values ('$bid', '$cid', '$date', 'checkout')";
				$result = mysqli_query($con,$sql);		
			}
		}
		else{
			$sql = "delete from requests where bid ='$bid' and cid = '$cid' and purpose = 'checkout'";
			$result = mysqli_query($con,$sql);								
		}
	}
	
	if(isset($_POST['renew'])){
		$bid = $_POST['bid'];

		if($_POST['v'] == 'Request Renew'){
			//if fine is 0 then only allow to renew
			$sql1 = "select fine from issued where bid ='$bid' and cid = '$cid')";
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);	
			echo $row1['fine']; 				
			if($row1['fine'] == 0){
				$sql = "select * from requests where bid ='$bid' and cid = '$cid' and purpose = 'checkout')";
				$result = mysqli_query($con,$sql);		
				
				if( mysqli_num_rows($result) == 0) {
					$date = date("Y-m-d");
					$sql = "insert into requests values ('$bid', '$cid', '$date', 'renew')";
					$result = mysqli_query($con,$sql);				
				}
			}
		}
		else{
			$sql = "delete from requests where bid ='$bid' and cid = '$cid' and purpose = 'renew'";
			$result = mysqli_query($con,$sql);								
		}			
	}

	mysqli_close($con);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Issued Books</title>
	<link rel="stylesheet" type="text/css" href="viewIssuedBook.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="view_issued_books_header" >View Issued Books</h2>
	</div>
	<a id="back" href="home.php">Home</a>	

<?php
	include '../connectivity.php';

	$result = mysqli_query($con,"select * from (select b.bid as bid, cid, name, author, prize, issueDate, dueDate, fine from book as b inner join issued as i on b.bid = i.bid) as T where cid = '$cid' ");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Book Id</th>
			<th>Book Name</th>
			<th>Author</th>
			<th>Prize</th>
			<th>Issue Date</th>
			<th>Due Date</th>
			<th>Fine</th>
			<th>Checkout</th>
			<th>Renew</th>
	</tr>";
	$total = 0;
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['bid'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "<td>" . $row['prize'] . "</td>";
		echo "<td>" . $row['issueDate'] . "</td>";
		echo "<td>" . $row['dueDate'] . "</td>";
		echo "<td>" . $row['fine'] . "</td>";

		$total += $row['fine'];

		$bid = $row['bid'];
		$result1 = mysqli_query($con,"select * from requests where bid = '$bid' and cid = '$cid' and purpose = 'checkout'");
		if(mysqli_num_rows($result1) != 0){
			$value = "Cancel Checkout Req";
		}
		else{
			$value = "Request Checkout";
		}
		$result1 = mysqli_query($con,"select * from requests where bid = '$bid' and cid = '$cid' and purpose = 'renew'");
		if(mysqli_num_rows($result1) != 0){
			$value1 = "Cancel Renew Req";
		}
		else{
			$value1 = "Request Renew";
		}

		echo "<td><form action='viewIssuedBooks.php' method='POST'>
				<input type='hidden' name='bid' value='".$row["bid"]."'/>
				<input type='hidden' name='v' value='".$value."'/>
				<input type='submit' name='checkout' value='".$value."' /></form></td>";

		echo "<td><form action='viewIssuedBooks.php' method='POST'>
				<input type='hidden' name='bid' value='".$row["bid"]."'/>
				<input type='hidden' name='v' value='".$value1."'/>
				<input type='submit' name='renew' value='".$value1."' /></form></td>";
		

		echo "</tr>";
		
	}
	
	echo "<tr>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . "Total Fine" . "</td>";
	echo "<td>" . $total . "</td>";
	echo "<td>" . " " . "</td>";
	echo "<td>" . " " . "</td>";
	echo "</tr>";

	echo "</table>";
	echo "</body>";

	mysqli_close($con);
?>


</body>
</html>

