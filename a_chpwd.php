<!DOCTYPE html>

<html>
<head>
	<title>Change Password Page</title>
	<link rel="stylesheet" type="text/css" href="a_chpwd.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="chpwd_header">Change Password</h2>
	</div>

	<a id="back" href="a_home.php">Home</a>	

	<form action='a_chpwd.php' method='POST' >		

		<p id="cp">Current Password</p>
		<input type="password" name="curr_password" id="curr_password" placeholder="Enter Current Password" value="<?php echo $cp; ?>" required>

		<p id="np">New Password</p>
		<input type="password" name="new_password" id="new_password" placeholder="Enter New Password" value="<?php echo $np; ?>" required>

		<p id="cnp">Confirm New Password</p>
		<input type="password" name="conf_new_password" id="conf_new_password" placeholder="Renter New Password" value="<?php echo $cnp; ?>" required>

		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="change" id="change" >Change</button><br/>
	</form>	

</body>
</html>


