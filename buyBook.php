<?php
	include '../connectivity.php';
	session_start();
	$cid = $_SESSION['cid'];

	$sql = "select * from book where status != 'issued' ";
	$result = mysqli_query($con,$sql);

	$table = "<table>";
	$table .= "<tr>
			<th>Book Id</th>
			<th>Name</th>
			<th>Author</th>
			<th>Prize</th>
			<th>Pub Year</th>
			<th>Rack No</th>
			<th>Status</th>
		</tr>";
		
	while($row = mysqli_fetch_array($result))
	{
		$table .= "<tr>";
		$table .= "<td>" . $row['bid'] . "</td>";
		$table .= "<td>" . $row['name'] . "</td>";
		$table .= "<td>" . $row['author'] . "</td>";
		$table .= "<td>" . $row['prize'] . "</td>";
		$table .= "<td>" . $row['year'] . "</td>";
		$table .= "<td>" . $row['rack'] . "</td>";
		$table .= "<td>" . $row['status'] . "</td>";

		$value = "Buy"; //default

		$table .= "<td><form action='searchBooks.php' method='POST'>
					<input type='hidden' name='bid' value='".$row["bid"]."'/>
					<input type='submit' name='buy' value='".$value."' />
					</form></td>";

		$table .= "</tr>";
		
	}
	$table .= "</table>";
	$table .= "</body>";

	if(isset($_POST['buy'])){
		$bid = $_POST['bid'];


//.......
		$result = mysqli_query($con,"select status from book where bid = '$bid'");
		$row = mysqli_fetch_array($result);
		if($row['status'] != 'issued'){
			$date = date("Y-m-d");
			$sql = "insert into requests values ('$bid', '$cid', '$date', 'issue')";
			$result = mysqli_query($con,$sql);		
			if ($result){
				$result = mysqli_query($con,"update book set status = 'requested' where bid = '$bid'");
			}
		}


	}
		
	mysqli_close($con);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buy Books</title>
</head>
<body>
	<div class="header">
		<h2 id="view_books_header" >Buy Books</h2>
	</div>
	<a id="back" href="home.php">Home</a>	

<?php
	echo $table;
?>

</body>
</html>

