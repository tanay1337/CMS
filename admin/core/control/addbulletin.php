<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>
<!DOCTYPE HTML>
<head>
	 <link rel="stylesheet" href="../../../extras/font-awesome/css/font-awesome.min.css">
	</head> 
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="add_bulletin" enctype="multipart/form-data">
		Announcement Title:<br>
		<textarea id="text" placeholder="Bulletin News Title, 50 characters!" maxlength="50" name="title" style="margin-top: 10px; height: 40px; width: 400px; background-color: #f5f8fa; border-radius: 6px;" required /></textarea><br>
<br>
Announcement Summary:<br>
		<textarea id="text" placeholder="Your Bulletin News summary, Maxmimum 150 characters!" maxlength="150" name="summary" style="margin-top: 10px; height: 100px; width: 600px; background-color: #f5f8fa; border-radius: 6px;" required /></textarea><br>
		<br>

Announcement file in PDF: <i class='fa fa-paperclip'></i><br>
<input type="file" name="pdf" required />
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<br>

		<center><input type="submit" value="Submit" style="margin-top: 10px; width:70px; height: 30px; background-color: #55ACEE; border-radius: 6px;" /></center>
	</form>
</body>

<?php

if(isset($_POST['title'])&&isset($_POST['summary'])&&isset($_FILES['pdf'])) {
date_default_timezone_set('UTC');
$postdate = date("d F, Y");
$todaydate = date("d F, Y");
$expirydate = strtotime("+14 day", strtotime($postdate));
$expirydate = date("d F, Y", $expirydate);


require("conn.php");
$date = date_create();
$TARGET_PATH = "../../../announcements/";
$announcement = $_FILES['pdf'];
$announcement['name'] = mysql_real_escape_string(date_timestamp_get($date).".PDF");
$TARGET_PATH .= $announcement['name'];
$title=$_POST['title'];
$summary=$_POST['summary'];
require("all_connect.php");
$sql="INSERT INTO bulletin(title, summary, postdate, expirydate, filename) VALUES('$title', '$summary', '$postdate', '$expirydate', '" . $announcement['name'] . "')";	

function is_valid_type($file)
{
	$valid_types = array("application/pdf", "application/x-pdf", "application/acrobat", "applications/vnd.pdf", "text/pdf", "text/x-pdf");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}


if (!is_valid_type($announcement))
{
	$_SESSION['error'] = "You must upload a PDF file!";
	header("Location: index.php");
	exit;
}

if (move_uploaded_file($announcement['tmp_name'], $TARGET_PATH)&&mysqli_query($con, $sql))
{
	echo "<center>Bulletin News posted!</center>";
	echo "<center>File Uploaded Successfully!<center>";
	exit;
}
else
{
	echo "<center>Error in posting! Please try again later.</center>";
	echo "<center>Could not upload file.  Check read/write persmissions on the directory</center>";
	exit;
}

mysqli_close($con);
}
?>
