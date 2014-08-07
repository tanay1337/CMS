<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<html>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="id" placeholder="ID" required>
	<input type="text" name="action_status" height="50px" width="100px" value="Solved" required>
	<input type="submit" value="Update" />
</form>
</body>
</html>

<?php
if(isset($_POST['action_status'])&&isset($_POST['id'])) {
	require("conn.php");
	date_default_timezone_set('UTC');
    $todaydate = date("d-m-y");
	$action_status=htmlentities(strip_tags($_POST['action_status']));
	$id=htmlentities(strip_tags($_POST['id']));
$sql = "UPDATE complaint SET status='$action_status' WHERE id='$id' ";

if(mysql_query($sql)) {

if($action_status=='Solved') {
$sql2 = "UPDATE complaint SET solveddate='$todaydate' WHERE id='$id' ";
$sql3 = "SELECT * FROM complaint WHERE id='$id' ";
mysql_query($sql2);

}
}
else
{
	echo "Error!";
}
}

?>