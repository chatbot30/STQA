<!DOCTYPE html>

<html>
<head>
	<title>Customer Home Page</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="home_header">Customer Home</h2>
	</div>

	<p id="asCust">You are logged in as customer</p>
	<a id="chpwd" href="chpwd.php">Change Password</a>	
	<a id="logout" href="../logout.php">Logout</a>	

	<br/>
	<br/>

	<button id="updateinfo" onclick="window.location.href='searchBooks.php'">Search Books</button>
	<button id="search" onclick="window.location.href='updateInfo.php'">Update Personal Info</button>

	<br/>
	<button id="viewIssuedBooks" onclick="window.location.href='viewIssuedBooks.php'">View Issued Books</button>	
	<button id="fine" onclick="window.location.href='buyBook.php'">Buy Book</button>


</body>
</html>

