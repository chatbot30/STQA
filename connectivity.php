<?php	
	//Connect to database[server,usernsme,password,database]
	$con = mysqli_connect("localhost","root","Nikita@8077","bookstore") ;
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		
//..................fine updates................
$date2 = date("Y-m-d");
$date2 = date_create($date2);

$sql = "select * from issued";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	$c = $row['cid'];
	$b = $row['bid'];
	$date1 = $row['dueDate'];
	$date1 = date_create($date1);

	$diff=date_diff($date1,$date2);
	$days =  (int)$diff->format('%a'); 

	//date1----duedate
	//date2----current date
	//fine....only if current date(2) > due date(1)....o.w. days = 0
	if(	$date2 <= $date1 ) 
		$days = 0;
		
	if($days <5){
		$f = 5*$days;
	}
	else if($days >=5 && $days <10){
		$f = 8*$days;
	}
	else if($days >=10 && $days <20){
		$f = 10*$days;
	}
	else if($days >=20 && $days <30){
		$f = 15*$days;
	}
	else{
		$f = 20*$days;	
	}
	//	echo $f;

	$sql1 = "update issued set fine = '$f' where bid = '$b' and cid = '$c'";
	$result1 = mysqli_query($con,$sql1);
}

?>

