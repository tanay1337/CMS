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
<link href="../../../extras/css/bootstrap.css" rel="stylesheet">

    <link href="../../../extras/css/sb-admin.css" rel="stylesheet">

<meta http-equiv="refresh" content="15">

</head>
<body>

<?php
require("all_connect.php");
$sql="SELECT * FROM complaint";
$sql2="SELECT * FROM complaint WHERE status='Solved'";
$sql3="SELECT * FROM complaint WHERE status!='Solved' AND complainttype='elec'";
$sql4="SELECT * FROM complaint WHERE status!='Solved' AND complainttype='plum'";
$sql5="SELECT * FROM complaint WHERE status!='Solved' AND complainttype='main'";
$sql6="SELECT * FROM complaint WHERE status!='Solved' AND complainttype='lift'";
$sql7="SELECT * FROM complaint WHERE status!='Solved' AND complainttype='club'";


$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$result3 = mysqli_query($con, $sql3);
$result4 = mysqli_query($con, $sql4);
$result5 = mysqli_query($con, $sql5);
$result6 = mysqli_query($con, $sql6);
$result7 = mysqli_query($con, $sql7);

$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);
$num3 = mysqli_num_rows($result3);
$num4 = mysqli_num_rows($result4);
$num5 = mysqli_num_rows($result5);
$num6 = mysqli_num_rows($result6);
$num7 = mysqli_num_rows($result7);


if(!$num==1 || !$num2==1) {
	echo "Fail";
}
else{
	$solvedpercent1 = (($num2/$num)*100);
	$solvedpercent = (int) $solvedpercent1;

	?>
<div id="panel-right" style="background-color: #000000; color: #ffffff; top:0; right:0; left:0; position: fixed; float: right; border:1px solid #000000; padding:10px; height: 100%; width: 240px; font-family: 'Arimo', sans-serif; ">
	
	<center>
<div id="myStat" data-dimension="160" data-info="% Solved Complaints" data-width="10" data-fontsize="20" data-fgcolor="#55ACEE" data-bgcolor="#eee" data-fill="#ffffff" data-total="100" data-part="<?php echo $solvedpercent; ?>" data-icon="long-arrow-up" data-icon-size="20" data-icon-color="#000000"></div>
<?php echo "Complaints Solved: ".$solvedpercent."%"; ?>

<br><hr>

<?php
//Pending elec problems/Total pending problems
$pendingprob=$num-$num2;
$pendelecprob1=(($num3/$pendingprob)*100);
$pendelecprob=(int) $pendelecprob1;
?>

Pending Electricty issues: <span style="color: #55ACEE;"><?php echo $pendelecprob; ?>%</span><br>
<div class="progress progress-striped active">
    <div class="progress-bar" style="width: <?php echo $pendelecprob; ?>%"></div>
</div>

<?php
//Pending plum problems/Total pending problems
$pendplumprob1=(($num4/$pendingprob)*100);
$pendplumprob=(int) $pendplumprob1;
?>
Pending Plumbing issues: <span style="color: #55ACEE;"><?php echo $pendplumprob; ?>%</span><br>


<div class="progress progress-striped active">
    <div class="progress-bar" style="width: <?php echo $pendplumprob; ?>%"></div>
</div>

<?php
//Pending main problems/Total pending problems
$pendmainprob1=(($num5/$pendingprob)*100);
$pendmainprob=(int) $pendmainprob1;
?>
Pending Maint. issues: <span style="color: #55ACEE;"><?php echo $pendmainprob; ?>%</span><br>


<div class="progress progress-striped active">
    <div class="progress-bar" style="width: <?php echo $pendmainprob; ?>%"></div>
</div>

<?php
//Pending lift problems/Total pending problems
$pendliftprob1=(($num6/$pendingprob)*100);
$pendliftprob=(int) $pendliftprob1;
?>
Pending Elevator issues: <span style="color: #55ACEE;"><?php echo $pendliftprob; ?>%</span><br>


<div class="progress progress-striped active">
    <div class="progress-bar" style="width: <?php echo $pendliftprob; ?>%"></div>
</div>

<?php
//Pending club problems/Total pending problems
$pendclubprob1=(($num7/$pendingprob)*100);
$pendclubprob=(int) $pendclubprob1;
?>
Pending Club House issues: <span style="color: #55ACEE;"><?php echo $pendclubprob; ?>%</span><br>


<div class="progress progress-striped active">
    <div class="progress-bar" style="width: <?php echo $pendclubprob; ?>%"></div>
</div>


</center>
</div>
	<?php
mysqli_close($con);
}


?>
<script>
$( document ).ready(function() {
        $('#myStat').circliful();
    });
</script>
<script src="../../../extras/js/bootstrap.js"></script>
</body>
</html>

