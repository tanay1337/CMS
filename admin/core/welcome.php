<!DOCTYPE HTML>
<head>
	<title>Complaint Management System - Admin Control Panel</title>
<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href="../../extras/jquery-ui.css" rel="stylesheet">
<script src="../../extras/jquery.min.js"></script>

<link href="../../extras/css/bootstrap.css" rel="stylesheet">
    <link href="../../extras/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../extras/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../extras/morris-0.4.3.min.css">
    <script src="../../extras/js/jquery-1.10.2.js"></script>
    <script src="../../extras/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});

$(document).ready(function(){
  $("#slip").click(function(){
    $("#sanel").slideToggle("slow");
  });
});
</script>
<script type="text/javascript">
function newPopup(url) {
  popupWindow = window.open(
    url,'popUpWindow','height=420,width=600,left=0,top=0,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
}
</script>
<style>
 body {
 background: url(../../extras/images/welcome-bg.png);
background-repeat: repeat !important;
background-attachment: fixed;
}
</style>
</head>

<?php
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];
$con = mysqli_connect("localhost", "root", "", "cms");

$sql = "SELECT * FROM admin WHERE email = '$admin_email' AND password = '$admin_password' ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	header('Location : http://127.0.0.1/');
}
else {
	while($obj = mysqli_fetch_assoc($result)) {
	if(function_exists('session_start'))
{
 session_start();
}
else
{
	header('Location: http://127.0.0.1/');
}
	
	if(isset($_POST['admin_email']) && isset($_POST['admin_password']))
{ 
 if($_POST['admin_email']==$admin_email && $_POST['admin_password']==$admin_password)
 {
   $_SESSION['admin_email']=$admin_email;
   $_SESSION['authenticated']=1;
}
}
	if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated']!==1)
{
 header('Location: http://127.0.0.1/');
}
else
{
$_SESSION['authenticated']=1;
$_SESSION['userinfo']=$obj['firstname']." ".$obj['lastname']." (".$obj['block']."-".$obj['flatnumber'].")";
 ?>

<body>
	<div id="header" style="opacity: 0.8; background-color: #000000; position: absolute; height: 50px; width: 100%;  top: 0; left: 0; right:0; font-family: 'Arimo', sans-serif;">
		<div id="header_left" style="color: #f5f8fa; float: left; width: 70%; margin-top: 8px; margin-left: 5%; font-family: 'Arimo', sans-serif;">
			<font size="5px"><strong>CMS</strong></font> Complaint Management System -Admin CP
		</div>
	<ul class="nav navbar-nav navbar-right navbar-user" style="margin-right: 5%;">
             <li><a href="JavaScript:newPopup('../core/control/chat_main.php');"><i class="fa fa-comment"></i> Chat</a></li>
          
                <li><a href="http://127.0.0.1/"><i class="fa fa-power-off"></i> Log Out</a></li>
              
          </ul>
	</div>

<div id="content" style="width: 100%; font-family: 'Arimo', sans-serif;">
<div id="panel-left" style="color: #ffffff; background-color: #000000; margin-top:50px; position: fixed; float: left; border:1px solid #000000; padding:10px; height: 100%; width: 250px; top:0; left:0; right:0; font-family: 'Arimo', sans-serif;">
<center>


<?php 
require("../core/control/conn.php");

	 
				$sql = "select * from admin where email='$admin_email'";
				$result2 = mysql_query($sql) or die ("Could not access DB: " . mysql_error());

				while ($row = mysql_fetch_assoc($result2))
				{
					
					if($row['filename']==null) {
						echo "<img src=\"../core/images/" . "default.JPG" . "\" alt=\"\" style=\"height: 160px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE; \" /><br />";
					}
					else {
					echo "<img src=\"../core/images/" . $row['filename'] . "\" alt=\"\" style=\"height: 150px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE; \" /><br />";

						}
					
				}

			?>



</center>


<hr color="#55ACEE">
<?php
echo "<i class='fa fa-user'></i><font color='#55ACEE'> Name: </font>{$obj['firstname']} {$obj['lastname']} <br><br>";
echo "<i class='fa fa-envelope'></i><font color='#55ACEE'> Address: </font>{$obj['block']}-{$obj['flatnumber']}, Krishna Apra Gardens.<br><br>";
echo "<i class='fa fa-table'></i><font color='#55ACEE'> Mobile: </font>{$obj['mobile']}";
?>
<br>
<hr color="#55ACEE">
<center><button id="slip">Edit Profile</button><button id="flip">Edit Picture</button></center>
<div id="sanel" style="display: none;">
<iframe src="../core/control/profile_edit.php" style="height: 124px; width: 200px;"></iframe>
</div> 

<div id="panel" style="display: none;">
<font size="2">Upload New Profile Picture:</font>
<iframe src="../core/control/upload.php" style="height: 94px; width: 200px;"></iframe>
</div>




</div>

<div id="panel-center" style="margin-top: 20px; position: absolute; float: center; margin-left: 27%; font-family: 'Arimo', sans-serif;">

          <div class="col-lg-14">
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#viewpendingcomplaint" data-toggle="tab">Pending Complaints</a></li>
                <li><a href="#viewsolvedcomplaint" data-toggle="tab">Solved Complaints</a></li>
                <li><a href="#addbulletin" data-toggle="tab">Add Announcement</a></li>
                <li><a href="#managebulletin" data-toggle="tab">Manage Bulletin</a></li>

              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="viewpendingcomplaint">
                  <iframe src="../core/control/pendingcomplaints.php" style="height: 430px; width: 640px;"></iframe>
                </div>
                <div class="tab-pane fade" id="viewsolvedcomplaint">
                  <iframe src="../core/control/solvedcomplaints.php" style="height: 430px; width: 640px;"></iframe>
                </div>
                <div class="tab-pane fade" id="addbulletin">
                  <iframe src="../core/control/addbulletin.php" style="height: 430px; width: 640px;"></iframe>
                </div>
                <div class="tab-pane fade" id="managebulletin">
                  <iframe src="../core/control/managebulletin.php" style="height: 430px; width: 640px;"></iframe>
                </div>
              </div>
            </div>

</div>

<div id="panel-right" style="background-color: #000000; color: #ffffff; top:0; right:0; margin-top:50px; position: fixed; float: right; border:1px solid #000000; padding:10px; height: 100%; width: 270px; font-family: 'Arimo', sans-serif; ">
  <iframe src="../core/control/graph.php" height="88%" width="240px"></iframe>
</div>

<script src="../../extras/jquery.js"></script>
<script src="../../extras/jquery-ui.js"></script>
<script>
$( "#tabs" ).tabs();
</script>
</div>


</div>
<?php
	}
}
}
mysqli_close($con);
include("../../extras/footer.php");
?>

</body>
