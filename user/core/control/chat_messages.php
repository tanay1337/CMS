<?php
session_start();
$user_email= $_SESSION['user_email'];
$from_userinfo=$_SESSION['userinfo'];
$_SESSION['authenticated']=1;

require("all_connect.php");
$sql="SELECT * FROM chat";
$result=mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
if(!$num==1)
{
echo "Sorry, the chat hasn't initiated yet. Send the first message!!";
header("refresh: 2;");
}
else
{
while($obj=mysqli_fetch_assoc($result))
{
 echo "<span style='color: #55ACEE; '><b>{$obj['from_userinfo']}</b> </span> : {$obj['chat_message']}<br>";
header("refresh: 2;");


}
}
?>