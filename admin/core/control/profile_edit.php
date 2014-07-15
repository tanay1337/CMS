<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<body>
<form name="profile_edit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" placeholder="First Name" name="admin_fname" style="border-radius: 6px;" required />
	<input type="text" placeholder="Last Name" name="admin_lname" style="border-radius: 6px;" required /><br>
    <input type="text" placeholder="Block" name="admin_block" style="border-radius: 6px;" required />
	<input type="text" placeholder="Flat No." name="admin_flatnumber" style="border-radius: 6px;" required /><br>
	<input type="text" placeholder="Mobile" name="admin_mobile" style="border-radius: 6px;" required />
	<input type="submit" value="Update" />
</form>
</body>

<?php
if((isset($_POST['admin_fname']))&&(isset($_POST['admin_lname']))&&(isset($_POST['admin_block']))&&(isset($_POST['admin_flatnumber']))&&(isset($_POST['admin_mobile']))) {
	$admin_fname=$_POST['admin_fname'];
	$admin_lname=$_POST['admin_lname'];
	$admin_block=$_POST['admin_block'];
	$admin_flatnumber=$_POST['admin_flatnumber'];
	$admin_mobile=$_POST['admin_mobile'];
	

require("all_connect.php");
	$sql = "UPDATE admin SET firstname='$admin_fname', lastname='$admin_lname', block='$admin_block', flatnumber='$admin_flatnumber', mobile='$admin_mobile' WHERE email='$admin_email'";
	$result = mysqli_query($con, $sql);
if(mysqli_query($con, $sql))
{
	echo "Success! Please refresh page.";
}
else {
	echo "Error updating profile information!";
}
mysqli_close($con);
}
?>







