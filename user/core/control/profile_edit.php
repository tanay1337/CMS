<?php
session_start();
$user_email= $_SESSION['user_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<body>
<form name="profile_edit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" placeholder="First Name" name="user_fname" style="border-radius: 6px;" required />
	<input type="text" placeholder="Last Name" name="user_lname" style="border-radius: 6px;" required /><br>
    <input type="text" placeholder="Block" name="user_block" style="border-radius: 6px;" required />
	<input type="text" placeholder="Flat No." name="user_flatnumber" style="border-radius: 6px;" required /><br>
	<input type="text" placeholder="Mobile" name="user_mobile" style="border-radius: 6px;" required />
	<input type="submit" value="Update" />
</form>
</body>

<?php
if((isset($_POST['user_fname']))&&(isset($_POST['user_lname']))&&(isset($_POST['user_block']))&&(isset($_POST['user_flatnumber']))&&(isset($_POST['user_mobile']))) {
	$user_fname=htmlentities(strip_tags($_POST['user_fname']));
	$user_lname=htmlentities(strip_tags($_POST['user_lname']));
	$user_block=htmlentities(strip_tags($_POST['user_block']));
	$user_flatnumber=htmlentities(strip_tags($_POST['user_flatnumber']));
	$user_mobile=htmlentities(strip_tags($_POST['user_mobile']));
require("all_connect.php");
	$sql = "UPDATE users SET firstname='$user_fname', lastname='$user_lname', block='$user_block', flatnumber='$user_flatnumber', mobile='$user_mobile' WHERE email='$user_email'";
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



