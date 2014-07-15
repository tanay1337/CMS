<?php

session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<html>
<body>
<center>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="id" placeholder="ID" required>
	<input type="submit" value="Delete" />
</form>
</center>
</body>
</html>

<?php
if(isset($_POST['id'])) {
require("all_connect.php");
$id=$_POST['id'];
$sql= "SELECT * FROM bulletin WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	echo "Error in Deleting File!";
}
else {
	while($obj = mysqli_fetch_assoc($result)) {
		$filepath="../../../announcements/".$obj['filename'];
		unlink($filepath);
}
mysqli_close($con);
}
$id=$_POST['id'];
$con1 = mysqli_connect("localhost", "root", "", "cms");
$sql2 = "DELETE FROM bulletin WHERE id = '$id' ";
if(mysqli_query($con1, $sql2)) {
	
}
else {
	echo "Error in removing Database Entry!";
}
mysqli_close($con1);
}

?>
