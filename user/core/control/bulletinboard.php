<!DOCTYPE HTML>
<head>
	  <link rel="stylesheet" href="../../../extras/font-awesome/css/font-awesome.min.css">

</style>
</head>
<body>
<marquee behavior="scroll" direction="up" SCROLLAMOUNT="1" height="450px" loop="">
	<div id="bulletinboard" style="font-family: 'Arimo', sans-serif; color: #66757f;">

<?php
require("all_connect.php");
$sql = "SELECT * FROM bulletin ORDER BY `id` DESC ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	echo "No new information in Bulletin Board!";
}
else {
	while($obj = mysqli_fetch_assoc($result)) { ?>
	<div id="news-container" style="background-color: #f5f8fa; border-radius: 6px;">
		<?php
		echo "<strong><font color='black'>{$obj['title']}<br></font></strong>";
		echo "<font size='2' color='#66757f'>Posted on: {$obj['postdate']}</font><br><br>";
		echo "<font size='3' color='#66757f'>{$obj['summary']}</font><br><br>";
		echo "<font size='3'><a href='";
		echo "../../../announcements/" . $obj['filename'];
		echo "' target='_blank'>Download Notice as PDF <i class='fa fa-download'></i></a></font><hr color='black'>";
		header("refresh: 60;");
		?>
	</div>
	<br>
<?php
		}

}
mysqli_close($con);

?>

</div>
</marquee>
</body			

						
					
			