<?php include 'server_updateInfo.php';?>
<!DOCTYPE html>

<html>
<head>
	<title>Personal Info Page</title>
	<link rel="stylesheet" type="text/css" href="updateInfo.css">
</head>
<body>
	<div><img src="img2.jpg" width=100% height=100% /></div>
	<div class="header">
		<h2 id="pers_info_header">Personal Info</h2>
	</div>

	<a id="back" href="home.php">Home</a>	

	<form action='updateInfo.php' method='POST' >		
		<p id="n">Name</p>
		<input type="text" name="name" id="name" placeholder="Enter Name" value="<?php echo $name; ?>" required>

		<p id="m">Mobile</p>
		<input type="tel" name="mobile" id="mobile" placeholder="Enter Mobile No." value="<?php echo $mob; ?>" required>

		<p id="e">Email</p>
		<input type="email" name="email" id="email" placeholder="Enter Email" value="<?php echo $email; ?>">

		<p id="d">Date of birth</p>
		<input type="date" name="dob" id="dob" placeholder="Enter DOB" value="<?php echo $dob; ?>">

		<p id="a">Address</p>
		<input type="text" name="address" id="address" placeholder="Enter Address" value="<?php echo $add; ?>">


		<span id="error" class="error"><?php echo $Error;?></span>

		<button type="submit"  name="update" id="update" >Update</button><br/>
	</form>	
	
	<form method='POST' >		
		<button name="clear" id="clear" >Clear</button><br/>
		<button name="back" id="back" >Back</button>
	</form>	


</body>
</html>

