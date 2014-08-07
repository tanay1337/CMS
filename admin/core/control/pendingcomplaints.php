<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<head>
	<link href="../../../extras/css/bootstrap.css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="../../../extras/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="../../../extras/common.js"></script>
		<link rel="stylesheet" href="../../../extras/font-awesome/css/font-awesome.min.css">

<meta http-equiv="refresh" content="10">

</head>
<style>
th,td
{
padding:5px;
}
</style>
<body>

	<div id="view_complaint" style="font-family: 'Arimo', sans-serif; ">
<center>
List of Pending Complaints filed by the residents.<br><br>
<iframe src="action_status.php" height="55px" width="420x"></iframe><br><br>
<table border="1" style="width: 610px; border:1px solid black; border-collapse:collapse; ">
<table border="1" style="width: 610px; border:1px solid black; border-collapse:collapse; ">
	<tr>
		<td><strong>C-ID</strong></td>
		<td><strong>Complainant</strong></td>
		<td><strong>Complaint Details</strong></td>
		<td><strong>Status</strong></td>
		

	</tr>
<?php
date_default_timezone_set('UTC');
$todaydate = date("d-m-y");
$sstatus="Solved";
require("all_connect.php");
$sql = "SELECT * FROM complaint WHERE status!='$sstatus' ORDER BY `id` DESC ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	echo "No new Complaint!";
}
else {
	while($obj = mysqli_fetch_assoc($result)) { ?>

		<tr>
		<td><?php echo $obj['id']; ?></td>
		<td><?php echo $obj['address'] ?></td>
		<td><i class='fa fa-file'></i><font color='#55ACEE' size="2"> Filed on: <?php echo $obj['complaintdate']; ?></font> | <i class='fa fa-clock-o'></i><font color='#55ACEE' size="2"> Pending Since: <?php $pendingsince=$todaydate-$obj['complaintdate']; echo $pendingsince." "; if($pendingsince=='1') {echo "day";} else {echo "days";} ?></font>
			<br>
			<div id="complaint" style="width: 390px; background-color: #f5f8fa; border-radius: 6px; "><?php echo $obj['complaint']; ?></div>
     
        </td>
		<?php if($obj['status']=='Pending') { ?>
		<td><span class="label label-danger"><?php echo $obj['status']; ?></span></td>
	<?php } else  { ?>
		<td><span class="label label-warning"><?php echo $obj['status']; ?></span></td>
		<?php } ?>
		</tr>

		<?php
		
	
		}
}
mysqli_close($con);

?>
</table>
</center>
</div>

</body> 
