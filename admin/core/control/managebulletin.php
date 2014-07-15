<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<head>
	<link href="../../../extras/css/bootstrap.css" rel="stylesheet">
</head>
<body>

	<div id="view_complaint" style="font-family: 'Arimo', sans-serif; ">
<center>
List of Announcements made by the RWA.<br><br>
<iframe src="action_bulletin.php" height="55px" width="420x"></iframe><br><br>
<table border="1" style="width: 610px; border:1px solid black; border-collapse:collapse;">
<table border="1" style="width: 610px; border:1px solid black; border-collapse:collapse;">
	<tr>
		<td><strong>News ID</strong></td>
		<td><strong>Title</strong></td>
		<td><strong>Posted On</strong></td>
		<td><strong>Status</strong></td>
		

	</tr>
<?php
require("all_connect.php");
$sql = "SELECT * FROM bulletin";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	echo "No announcement in record!";
}
else {
	while($obj = mysqli_fetch_assoc($result)) { ?>

		<tr>
		<td><?php echo $obj['id']; ?></td>
		<td><?php echo $obj['title'] ?></td>
		<td><?php echo $obj['postdate']; ?></td>
<?php 
date_default_timezone_set('UTC');
$todaydate1 = date("d F, Y");
$todaydate = strtotime($todaydate1);
$expirydate = strtotime($obj['expirydate']);
?>

<?php if($todaydate < $expirydate) { ?>
		<td><span class="label label-info">New</span></td>
<?php } else {  ?>
		<td><span class="label label-default">Old</span></td>
<?php } ?>
		</tr>

		<?php
		
		header("refresh: 20;");
		}
}
mysqli_close($con);

?>
</table>
</center>
</div>

</body> 
