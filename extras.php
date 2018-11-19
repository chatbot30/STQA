searchBooks.php ----------------------------------------

		$bid = $row['bid'];
		$result1 = mysqli_query($con,"select * from requests where cid = '$cid' and bid = '$bid' and purpose = 'issue'");	
		if($result1){
			$status = 'requested';
		}
		else{
			$status = $row['status'];			
		}

		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['author'] . "</td>";
		echo "<td>" . $row['prize'] . "</td>";
		echo "<td>" . $row['year'] . "</td>";
		echo "<td>" . $row['rack'] . "</td>";
		echo "<td>" . $status . "</td>";

