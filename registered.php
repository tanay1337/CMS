<!DOCTYPE HTML>
<head>
  <title>
    Complaint Management System - Registered
  </title>
  <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      background: url(/extras/images/bg.jpg);
      -moz-background-size: cover;
      -webkit-background-size: cover;
      background-size: cover;
      background-position: top center !important;
      background-repeat: no-repeat !important;
      background-attachment: fixed;
    }
  </style>
</head>

<body>
  <div id="header" style="opacity: 0.8; background-color: #000000; position: absolute; height: 50px; width: 100%;  top: 0; left: 0; right:0; font-family: 'Arimo', sans-serif;">
    <div id="header_left" style="color: #f5f8fa; float: left; width: 70%; margin-top: 8px; margin-left: 5%; font-family: 'Arimo', sans-serif;">
      <font size="5px">
        <strong>
          CMS
        </strong>
      </font>
      Complaint Management System
    </div>
    
    <div id="header_right" style="position: absolute; color: #f5f8fa; float: right; width: 30%; margin-top: 4px; margin-left: 59%; font-family: 'Arimo', sans-serif;">
      <form method="POST" action="../user/welcome.php" name="user_login">
		
              
              <input type="email" name="user_email" placeholder="Email-ID" style="height:17px; width: 150px; border-radius: 6px;" required />
              
              <input type="password" name="user_password" placeholder="*****" style="height:17px; width: 150px; border-radius: 6px;" required />
              <input type="submit" value="Login" style="margin-top: 10px; width:70px; height: 25px; border-radius: 6px;" required />
              
          </form>
      </div>
      
  </div>
  
  
</body>

<?php
$firstname= htmlentities(strip_tags($_POST['firstname']));
$lastname=htmlentities(strip_tags($_POST['lastname']));
$email=$_POST['email'];
$block=htmlentities(strip_tags($_POST['block']));
$flatnumber=mysqli_real_escape_string(htmlentities(strip_tags($_POST['flatnumber'])));
$mobile=htmlentities(strip_tags($_POST['mobile']));
$password=MD5(htmlentities(strip_tags(($_POST['password'])));
$con = mysqli_connect("localhost", "root", "", "cms");
$sql="INSERT INTO users(firstname, lastname, email, block, flatnumber, mobile, password) VALUES('$firstname', '$lastname', '$email', '$block', '$flatnumber', '$mobile', '$password')";
if(mysqli_query($con, $sql))
{	?>


<div id="registered-note" style="opacity: 0.9; background-color: #f5f8fa; position:absolute; left: 30%; margin-top: 100px; border: 1px; width:500px; padding:10px; border:2px solid gray;">
  Congratulations! You have now been registered on KAG's CMS. You can now login to your account using the above login fields to file complaints and view the Bulletin Board.
  <br>
  <br>
  
  <center>
    Your Email-Id is: 
    <?php echo $email; ?>
  </center>
</div>

<?php
}
else
{
?>
<div id="registration-error" style="opacity: 0.9; background-color: #f5f8fa; position:absolute; left: 30%; margin-top: 100px; border: 1px; width:500px; padding:10px; border:2px solid gray;">
  Sorry, there was an error registering you into KAG's CMS. You will need an unique Email-Id to register into CMS. The details have been stated below.
  <br>
  <br>
  
  <center>
    The Email-Id 
    <?php echo $email; ?>
    , has already been taken.
  </center>
</div>
<?php
}
mysqli_close($con);

?>

</div>
<div id="footer" style="opacity: 0.8; position:absolute; left:0px; bottom:0px; height:30px; width:100%; background-color: #000000;">
  <div id="footer_left" style="color: #ffffff; float: center; width: 70%; margin-left: 10%; font-family: 'Arimo', sans-serif;">
    <font size="2px">
      Copyright (c) 2014 Tanay Pant. All rights reserved.
    </font>
  </div>
</div>
</body>
</html>