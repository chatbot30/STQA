<?php include 'server_login.php';?>
<!DOCTYPE html>

<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="login_header">Login</h2>
	</div>

	<a id="adminLink" href="a_login.php">Admin Login</a>	

	<form action='login.php' method='POST' >	
		<p id="u">Username</p>
		<input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo $un; ?>" required>

		<p id="p">Password</p>
		<input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $pwd; ?>" required>

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="login" id="login" >Login</button><br/>
	</form>	

	<a id="RegLink" href="register.php">Not a user? Register here</a>	

</body>
</html>

