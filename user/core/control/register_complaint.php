<?php
session_start();
$user_email= $_SESSION['user_email'];
$_SESSION['authenticated']=1;
$address=$_SESSION['address'];
?>
<!DOCTYPE HTML>
<head>
	
   </head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="register_complaint">
		<select name="block" style="height:25px; width: 200px; border-radius: 6px;">
			<option value="1">Plumbing Problem</option>
  <option value="2">Electric Problem</option>
  <option value="3">Maintainance</option>
  <option value="4">Swimming Pool</option>
  <option value="5">Other Problem</option>
</select> 
		<textarea id="text" placeholder="Your Complaint Goes Here." class="form-control" name="complaint" style="margin-top: 10px; height: 310px; width: 550px;" required ></textarea><br>
		<center><input type="submit" value="Submit" style="margin-top: 10px; width:70px; height: 30px; background-color: #55ACEE; border-radius: 6px;" /></center>
	</form>
</body>

<?php
if(isset($_POST['complaint'])) {
date_default_timezone_set('UTC');
$complaintdate = date("d-m-y");
$email=$user_email;
$status="Pending";
$complaint=$_POST['complaint'];
require("all_connect.php");
$sql="INSERT INTO complaint(address, email, complaint, complaintdate, status) VALUES('$address', '$email', '$complaint', '$complaintdate', '$status')";
if(mysqli_query($con, $sql))
{	?>

<center>Complaint Recorded!</center>

<?php
}
else
{
?>
<center>Error! Please try again later.</center>

<?php
}
mysqli_close($con);
}

?>