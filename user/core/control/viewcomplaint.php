<?php
session_start();
$user_email= $_SESSION['user_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<head>
	<link href="../../../extras/css/bootstrap.css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="../../../extras/common.js"></script>
		<link rel="stylesheet" href="../../../extras/font-awesome/css/font-awesome.min.css">
		<style>
th,td
{
padding:5px;
}
</style>
</head>
<body>

	<div id="view_complaint" style="font-family: 'Arimo', sans-serif; ">
<center>
Complaints filed from account: <?php echo $user_email; ?> <br><br>
<table border="1" style="width: 580px; border:1px solid black; border-collapse:collapse;">
	<tr>
		<td><strong>C-ID</strong></td>
		<td><strong>Complaint Details</strong></td>
		<td><strong>Status</strong></td>
	</tr>
<?php
date_default_timezone_set('UTC');
$todaydate = date("d-m-y");
$email=$user_email;
require("all_connect.php");
$sql = "SELECT * FROM complaint WHERE email='$email' ORDER BY `id` DESC ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	echo "Error loading information from Bulletin Board!";
}
else {
	while($obj = mysqli_fetch_assoc($result)) { ?>

		<tr>
		<td><?php echo $obj['id']; ?></td>
		<?php if($obj['status']=='Solved') { ?>
		<td><i class='fa fa-file'></i><font color='#55ACEE' size="2"> Filed on: <?php echo $obj['complaintdate']; ?> | Solved on: <?php echo $obj['solveddate']; ?> | Solved in: <?php $solvedin = $obj['solveddate']-$obj['complaintdate']; echo $solvedin." "; if($solvedin=='1') {echo "day";} else {echo "days";} ?> </font>
		<span style="float:right; display:block;"><a href="javascript:tblHideShow2('Div<?php echo $obj['id']; ?>' ,'0')" id="more1">more &#187;</a></span>
		<div id="Div<?php echo $obj['id']; ?>"  style="display:none;width: 390px; background-color: #f5f8fa; border-radius: 6px;">
                    <p style="font-family:Arial, Helvetica, sans-serif; color:#3E3E3E; font-size:12px; font-style:normal ">
                         <?php echo $obj['complaint']; ?>             </p>

        <?php } else { ?>
        <td><i class='fa fa-file'></i><font color='#55ACEE' size="2"> Filed on: <?php echo $obj['complaintdate']; ?></font> | <i class='fa fa-clock-o'></i><font color='#55ACEE' size="2"> Pending Since: <?php $pendingsince=$todaydate-$obj['complaintdate']; echo $pendingsince." "; if($pendingsince=='1') {echo "day";} else {echo "days";} ?></font>
			<br>
			<div id="complaint" style="width: 390px; background-color: #f5f8fa; border-radius: 6px; "><?php echo $obj['complaint']; ?></div>
     
        </td>

        <?php } ?>
		
		



		<?php if($obj['status']=='Solved') { ?>
		
		<td><span class="label label-success"><?php echo $obj['status']; ?></span></td>
	
	<?php  } elseif($obj['status']=='Pending') { ?>
		
		<td><span class="label label-danger"><?php echo $obj['status']; ?></span></td>
	
	<?php  } else { ?> 
	
			
		<td><span class="label label-warning"><?php echo $obj['status']; ?></span></td>	
<?php } ?>
		</tr>

		<?php
		
		header("refresh: 10;");
		}
}
mysqli_close($con);

?>
</table>
</center>
</div>

</body> 
