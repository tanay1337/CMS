<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<html>
<head>
	<link href="../../../extras/circliful/css/jquery.circlify.css" rel="stylesheet" type="text/css" />

<script src="../../../extras/jquery-1.10.2.min.js"></script>
<script src="../../../extras/circliful/js/jquery.circliful.min.js"></script>
</head>
<body>

<?php
require("all_connect.php");
$sql="SELECT * FROM complaint";
$sql2="SELECT * FROM complaint WHERE status='Solved'";
$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);
if(!$num==1 || !$num2==1) {
	echo "Fail";
}
else{
	$solvedpercent1 = (($num2/$num)*100);
	$solvedpercent = (int) $solvedpercent1;

	?>
<div id="panel-right" style="background-color: #000000; color: #ffffff; top:0; right:0; left:0; position: fixed; float: right; border:1px solid #000000; padding:10px; height: 100%; width: 210px; font-family: 'Arimo', sans-serif; ">
	
	<center>
<div id="myStat" data-dimension="160" data-info="% Solved Complaints" data-width="10" data-fontsize="20" data-fgcolor="#55ACEE" data-bgcolor="#eee" data-fill="#ffffff" data-total="100" data-part="<?php echo $solvedpercent; ?>" data-icon="long-arrow-up" data-icon-size="20" data-icon-color="#000000"></div>
<?php echo "Complaints Solved: ".$solvedpercent."%"; ?>



</center>
</div>
	<?php
mysqli_close($con);
}
		header("refresh: 10;");

?>
<script>
$( document ).ready(function() {
        $('#myStat').circliful();
    });
</script>
</body>
</html>

