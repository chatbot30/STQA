<!DOCTYPE html>

<html>
<head>
	<title>Admin Home Page</title>
	<link rel="stylesheet" type="text/css" href="a_home.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="admin_home_header">Admin Home</h2>
	</div>

	<p id="asAdmin">You are logged in as admin</p>
	<a id="chpwd" href="a_chpwd.php">Change Password</a>	
	<a id="logout" href="../logout.php">Logout</a>	

	<br/>
	<br/>

	<button id="custReq" onclick="window.location.href='customerReq.php'">Customer Requests</button>
	<button id="viewCust" onclick="window.location.href='viewCust.php'">View Customers</button>
	<br/>
	
	<button id="addBook" onclick="window.location.href='addBook.php'">Add Book</button>
	<button id="viewBook" onclick="window.location.href='viewBooks.php'">View Books</button>
	<br/>
	
	<button id="iReq" onclick="window.location.href='issueReq.php'">Issue Requests</button>
	<button id="cReq" onclick="window.location.href='checkoutReq.php'">Checkout Requests</button>
	<button id="rReq" onclick="window.location.href='renewReq.php'">Renew Requests</button>
	<br/>
	
	<button id="fine" onclick="window.location.href='viewIssuedBooks.php'">View all issued books</button>
	<br/>

</body>
</html>

