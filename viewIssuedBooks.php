<!DOCTYPE html>
<html>
<head>
	<title>View All Issued Books</title>
	<link rel="stylesheet" type="text/css" href="viewIssuedBook.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="view_issued_books_header" >View All Issued Books</h2>
	</div>
	<a id="back" href="a_home.php">Home</a>	

<?php
	include '../connectivity.php';

	$result = mysqli_query($con,"select b.bid as bid,b.name as bname,c.cid as cid,c.name as cname,author,prize,issueDate,dueDate,fine from book as b inner join issued as i inner join customer as c on b.bid = i.bid and c.cid = i.cid ");

	echo "<table id='abc' class='x' border-collapse: collapse'>";
	echo "<tr>
			<th>Book Id</th>
			<th>Book Name</th>
			<th>Cust Id</th>
			<th>Cust Name</th>
			<th>Author</th>
			<th>Prize</th>
			<th>Issue Date</th>
			<th>Due Date</th>
			<th>Fine</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['bid'] . "</td>";
		echo "<td>" . $row['bname'] . "</td>";
		echo "<td>" . $row['cid'] . "</td>";
		echo "<td>" . $row['cname'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "<td>" . $row['prize'] . "</td>";
		echo "<td>" . $row['issueDate'] . "</td>";
		echo "<td>" . $row['dueDate'] . "</td>";
		echo "<td>" . $row['fine'] . "</td>";
		
		echo "</tr>";
		
	}
	echo "</table>";
	echo "</body>";

	mysqli_close($con);
?>


</body>
</html>

