<?php include 'server_register.php';?>

<!DOCTYPE html>

<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="register.css">

</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="register_header">Register</h2>
	</div>

	<a id="backtologin" href="login.php">Back to login</a>	

	<form action='register.php' method='POST' >		
		<p id="n">Name</p>
		<input type="text" pattern="[A-Za-z]{1,15}" name="name" id="name" placeholder="Enter Name" value="<?php echo $name; ?>" required>

		<p id="m">Mobile</p>
		<input type="text" pattern= "^\d{10}$" name="mobile" id="mobile" placeholder="Enter Mobile No." value="<?php echo $mob; ?>" required>

		<p id="e">Email</p>
		<input type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo $email; ?>" required>

		<p id="d">Date of birth</p>
		<input type="date" name="dob" id="dob" placeholder="Enter DOB" value="<?php echo $dob; ?>" required>

		<p id="a">Address</p>
		<input type="text" name="address" id="address" placeholder="Enter Address" value="<?php echo $add; ?>" required>

		<p id="u">Username</p>
		<input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo $un; ?>" required>

		<p id="p">Password</p>
		<input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $pwd; ?>" required>

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="register" id="register" >Register</button><br/>
	</form>	

	<form method='POST' >		
		<button name="clear" id="clear" >Clear</button><br/>
		<button name="back" id="back" >Back</button>
	</form>	

</body>
</html>



