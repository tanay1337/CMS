<?php
session_start();
$admin_email= $_SESSION['admin_email'];
$_SESSION['authenticated']=1;
?>

<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"   >
<input type="file" name="image" required />
<input type="submit" id="submit" value="Upload" />
</form>
</body>
</html>

<?php

if(isset($_FILES['image'])) {
require("conn.php");
$TARGET_PATH = "../images/";
$image = $_FILES['image'];

$image['name'] = mysql_real_escape_string($admin_email.".JPG");
$TARGET_PATH .= $image['name'];

function is_valid_type($file)
{
	$valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif", "image/png");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}


if (!is_valid_type($image))
{
	$_SESSION['error'] = "You must upload a jpeg, gif, png or bmp";
	header("Location: index.php");
	exit;
}

if (move_uploaded_file($image['tmp_name'], $TARGET_PATH))
{
	$sql = "UPDATE admin SET filename='" . $image['name'] . "' WHERE email='$admin_email'";
	$result = mysql_query($sql) or die ("Could not insert data into DB: " . mysql_error());
	echo "Done! Please refresh page.";
	exit;
}
else
{
	echo "Could not upload file.  Check read/write persmissions on the directory";
	exit;
}
}
?>

