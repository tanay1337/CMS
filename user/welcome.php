<!DOCTYPE HTML>
<head>
	<title>Complaint Management System</title>
<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href="../extras/jquery-ui.css" rel="stylesheet">
<script src="../extras/jquery.min.js"></script>

<link href="../extras/css/bootstrap.css" rel="stylesheet">
    <link href="../extras/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../extras/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../extras/morris-0.4.3.min.css">
    <script src="../extras/js/jquery-1.10.2.js"></script>
    <script src="../extras/js/bootstrap.js"></script>
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
<style>
 body {
 background: url(../extras/images/welcome-bg.png);
background-repeat: repeat !important;
background-attachment: fixed;
}
</style>
<script type="text/javascript">
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=420,width=600,left=0,top=0,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
}
</script>
</head>


<?php
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$con = mysqli_connect("localhost", "root", "", "cms");
$sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password' ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
	header('Location : http://cms4society.t15.org/');
}
else {
	while($obj = mysqli_fetch_assoc($result)) { 
if(function_exists('session_start'))
{
 session_start();
}
else
{
	header('Location: http://cms4society.t15.org/');
}
	
	if(isset($_POST['user_email']) && isset($_POST['user_password']))
{ 
 if($_POST['user_email']==$user_email && $_POST['user_password']==$user_password)
 {
   $_SESSION['user_email']=$user_email;
   $_SESSION['authenticated']=1;
}
}
	if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated']!==1)
{
 header('Location: http://cms4society.t15.org/');
}
else
{
$_SESSION['authenticated']=1;
$_SESSION['address']=$obj['block']."-".$obj['flatnumber'];
$_SESSION['userinfo']=$obj['firstname']." ".$obj['lastname']." (".$obj['block']."-".$obj['flatnumber'].")";
	?>

<body>
	<div id="header" style="opacity: 0.8; background-color: #000000; position: absolute; height: 50px; width: 100%;  top: 0; left: 0; right:0; font-family: 'Arimo', sans-serif;">
		<div id="header_left" style="color: #f5f8fa; float: left; width: 70%; margin-top: 8px; margin-left: 5%; font-family: 'Arimo', sans-serif;">
			<font size="5px"><strong>CMS</strong></font> Complaint Management System
		</div>
	<ul class="nav navbar-nav navbar-right navbar-user" style="margin-right: 5%;">
             <li><a href="JavaScript:newPopup('../user/core/control/chat_main.php');"><i class="fa fa-comment"></i> Chat</a></li>
          
                <li><a href="http://cms4society.t15.org/"><i class="fa fa-power-off"></i> Log Out</a></li>
              
          </ul>
        </div>




<div id="content" style="width: 100%; font-family: 'Arimo', sans-serif;">
<div id="panel-left" style="color: #ffffff; background-color: #000000; margin-top:50px; position: fixed; float: left; border:1px solid #000000; padding:10px; height: 100%; width: 250px; top:0; left:0; right:0; font-family: 'Arimo', sans-serif;">
<center>


	<?php 
require("../user/core/control/conn.php");

	 
				$sql = "select * from users where email='$user_email'";
				$result2 = mysql_query($sql) or die ("Could not access DB: " . mysql_error());

				while ($row = mysql_fetch_assoc($result2))
				{
					
					if($row['filename']==null) {
						echo "<img src=\"../user/core/images/" . "default.JPG" . "\" alt=\"\" style=\"height: 160px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE;\" /><br />";
					}
					else {
					echo "<img src=\"../user/core/images/" . $row['filename'] . "\" alt=\"\" style=\"height: 150px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE;\" /><br />";

						}
					
				}

			?></center>


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
<iframe src="../user/core/control/profile_edit.php" style="height: 124px; width: 200px;"></iframe>
</div> 

<div id="panel" style="display: none;">
<font size="2">Upload New Profile Picture:</font>
<iframe src="../user/core/control/upload.php" style="height: 94px; width: 200px;"></iframe>
</div>

</div>

<div id="panel-center" style="margin-top: 20px; position: absolute; float: center; margin-left: 27%; font-family: 'Arimo', sans-serif;">

          <div class="col-lg-12">
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#registercomplaint" data-toggle="tab">Register Complaint</a></li>
                <li><a href="#viewcomplaint" data-toggle="tab">View your Complaints</a></li>
                
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="registercomplaint">
                  <iframe src="../user/core/control/register_complaint.php" style="height: 430px; width: 600px;"></iframe>
                </div>
                <div class="tab-pane fade" id="viewcomplaint">
                  <iframe src="../user/core/control/viewcomplaint.php" style="height: 430px; width: 600px;"></iframe>
                </div>
                
              </div>
            </div>
  </div>


<div id="panel-right" style="background-color: #000000; color: #ffffff; top:0; right:0; margin-top:50px; position: fixed; float: right; border:1px solid #000000; padding:10px; height: 100%; width: 270px; font-family: 'Arimo', sans-serif; ">
	
	<strong><center><font style="color: #ffffff;">Bulletin Board</font></center></strong><hr color="#55ACEE">
	<iframe src="../user/core/control/bulletinboard.php" style="height: 470px; width: 250px;"></iframe>

	
</div>
</div>
<?php
	}
	}
}
mysqli_close($con);
include("../extras/footer.php");
?>
</body>
