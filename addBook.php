<?php include 'server_addBook.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Book Page</title>
	<link rel="stylesheet" type="text/css" href="addBook.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="add_book_header">Add Book</h2>
	</div>

	<a id="back" href="a_home.php">Home</a>	

	<form action='addBook.php' method='POST' >		
		<p id="n">Name</p>
		<input type="text" name="name" id="name" placeholder="Enter Book Name" value="<?php echo $name; ?>" required>

		<p id="a">Author</p>
		<input type="text" name="author" id="author" placeholder="Enter Author Name" value="<?php echo $author; ?>" required>

		<p id="p">Prize</p>
		<input type="text" name="prize" id="prize" placeholder="Enter Prize" value="<?php echo $prize; ?>">

		<p id="d">Publication Year</p>
		<input type="text" name="year" id="year" placeholder="Enter Publication Year" value="<?php echo $year; ?>">

		<p id="r">Rack No.</p>
		<input type="text" name="rack" id="rack" placeholder="Enter Rack No." value="<?php echo $rack; ?>">


		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="add" id="add" >Add</button><br/>
	</form>	
	
	<form method='POST' >		
		<button name="clear" id="clear" >Clear</button><br/>
		<button name="back" id="back" >Back</button>
	</form>	


</body>
</html>

