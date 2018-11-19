<?php include 'server_a_login.php';?>
<!DOCTYPE html>

<html>
<head>
	<title>Admin Login Page</title>
	<link rel="stylesheet" type="text/css" href="a_login.css">

</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="admin_login_header">Admin Login</h2>
	</div>

	<a id="back" href="login.php">Back to customer login</a>	

	<form action='a_login.php' method='POST' >	
		<p id="u">Username</p>
		<input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo $un; ?>" required>

		<p id="p">Password</p>
		<input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $pwd; ?>" required>

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="login" id="login" >Login</button><br/>
	</form>	

</body>
</html>

