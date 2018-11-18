<?php
	include '../connectivity.php';
	session_start();
	$cid = $_SESSION['cid'];

	$sql = "select * from book";
	if(isset($_POST['search'])){
		$filter = $_POST['filter'];
		echo $filter;
		$sql = "select * from book where LOWER(name) like LOWER('%".$filter."%') union
				 select * from book where LOWER(author) like LOWER('%".$filter."%')";
	}
	if(isset($_POST['clear'])){
		$sql = "select * from book";
		$filter = "";	
	}
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

		$value = "Place Issue Request"; //default

		$sql1 = "select * from issued where bid = '".$row['bid']."' ";
		$result1 = mysqli_query($con,$sql1);
		if(mysqli_num_rows($result1) != 0){ //issued 
			$row1 = mysqli_fetch_array($result1);
			if($row1['cid'] == $cid)
				$value = "Issueued by you";
			else
				$value = "Issueed by somebody else";				
		}

		$sql1 = "select * from requests where bid = '".$row['bid']."' and cid = '$cid' and purpose = 'issue' ";
		$result1 = mysqli_query($con,$sql1);
		if(mysqli_num_rows($result1) != 0){ //already requested
			$value = "Requested";
		}


		$table .= "<td><form action='searchBooks.php' method='POST'>
					<input type='hidden' name='bid' value='".$row["bid"]."'/>
					<input type='submit' name='request' value='".$value."' />
					</form></td>";

		$table .= "</tr>";
		
	}
	$table .= "</table>";
	$table .= "</body>";

	if(isset($_POST['request'])){
		$bid = $_POST['bid'];
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
	<title>View Books</title>
</head>
<body>
	<div class="header">
		<h2 id="view_books_header" >View Books</h2>
	</div>
	<a id="back" href="home.php">Home</a>	

<?php
	echo '<form action="searchBooks.php" method="POST"> ';
	echo '<input type="text" name="filter" id="filter" placeholder="Enter Search text" >';
	echo '<button type="submit" name="search" id="search" >Search</button>' ;
	echo '<button type="submit" name="clear" id="clear" >Clear Filter</button>' ;
	echo '</form> ' ;
	
	echo $table;
?>

</body>
</html>

