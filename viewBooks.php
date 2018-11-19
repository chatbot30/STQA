<?php
	include '../connectivity.php';

	session_start();
	if(isset($_POST['delete'])){
		$bid = $_POST['bid'];
		$result = mysqli_query($con,"delete from book where bid = '$bid'");
	}

	if(isset($_POST['update'])){
		$_SESSION['bid'] = $_POST['bid'];
		header('Location:updateBook.php');	
	}

	mysqli_close($con);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Books</title>
	<link rel="stylesheet" type="text/css" href="viewBooks.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="view_books_header" >View Books</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
	include '../connectivity.php';

	$result = mysqli_query($con,"select * from book");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
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
		echo "<tr>";
		echo "<td>" . $row['bid'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "<td>" . $row['prize'] . "</td>";
		echo "<td>" . $row['year'] . "</td>";
		echo "<td>" . $row['rack'] . "</td>";
	
		$stat = $row['status'];
/*		if($stat == "issued"){
			$res = mysqli_query($con,"select cid from issued where bid = '$bid'");
			if($r = mysqli_fetch_array($res)){
				echo "szfdxghjbk";
				$stat = $stat." by ".$r['cid'];
			}
		}
*/		echo "<td>" . $stat . "</td>";

		echo "<td><form action='viewBooks.php' method='POST'><input type='hidden' name='bid' value='".$row["bid"]."'/><input type='submit' name='update' value='Update' /></form></td>";
		echo "<td><form action='viewBooks.php' method='POST'><input type='hidden' name='bid' value='".$row["bid"]."'/><input type='submit' name='delete' value='Delete' /></form></td>";

		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

	mysqli_close($con);
?>


</body>
</html>

