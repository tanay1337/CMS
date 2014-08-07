<html>
<head>
<style>
	 body {
 background: url(../../../extras/images/welcome-bg.png);
background-repeat: repeat !important;
background-attachment: fixed;
}
</style>
</head>
<body>
<div id="heading" style="color: #000000;"><center><strong>Community Chat</center></div>
<iframe src="chat_messages.php" style="height: 330px; width: 560px; margin-top:5px; "></iframe><br>
<form name="chat_message" id="chat_message" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="text" name="chat_message" placeholder="Text you wish to send..." style="width: 510px; margin-top:5px;" />
<input type="submit" value="Send" style="width: 50px; background-color: #55ACEE; color: white; margin-top:5px; "/>
</form>
<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$from_userinfo=$_SESSION['userinfo'];
$_SESSION['authenticated']=1;

if(isset($_POST['chat_message'])) {
$from_chat=$user_email;
$chat_message=htmlentities(strip_tags($_POST['chat_message']));
require("all_connect.php");
$sql="INSERT INTO chat(from_userinfo, from_email, chat_message) VALUES('$from_userinfo', '$user_email', '$chat_message')";
if(mysqli_query($con, $sql))
{
 header("refresh: 1;");
}
else
{
 echo "Error in Posting!";
}
}
?>
</body>
</html>