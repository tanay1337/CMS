<!DOCTYPE HTML>
<head>
  <title>
    Complaint Management System - Admin Login
  </title>
  <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <style>
    body {
      background: url(../extras/images/bg.jpg);
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
    <div id="header_left" style="color: #ffffff; float: left; width: 70%; margin-top: 8px; margin-left: 14%; font-family: 'Arimo', sans-serif;">
      <font size="5px">
        <strong>
          CMS
        </strong>
      </font>
      Complaint Management System (Admin Login)
    </div>
	<div id="header_right" style="position: absolute; color: #f5f8fa; float: right; width: 30%; margin-top: 14px; margin-left: 78%; font-family: 'Arimo', sans-serif;">
      <a href="http://127.0.0.1/">
        <img src="/../../extras/images/home.jpg">
      </a>
      
      </div>
  </div>
  
  <div id="admin_login" style="opacity: 0.9; padding:10px; font-family: 'Arimo', sans-serif; background-color: #f5f8fa; margin-top: 135px; position: relative; box-shadow: 0px 0px 10px rgb(17, 17, 17); width: 450px; height: 300px; margin-left: 33%; color: #66757f;">
	Krishna Apra Gardens
      <hr>
      <br>
      <center>
        <form method="POST" action="../admin/core/welcome.php" name="admin_login">
          
          Username/ Email:
          <br>
          <input type="email" name="admin_email" placeholder="Email-ID" style="height:20px; width: 170px; border-radius: 6px;" required />
          <br>
          Password: 
          <br>
          <input type="password" name="admin_password" placeholder="*****" style="height:20px; width: 170px; border-radius: 6px;" required />
          <br>
          <input type="submit" value="Login" style="margin-top: 10px; width:70px; height: 30px; background-color: #55ACEE; border-radius: 6px;" required />
          
        </form>
        
      </center>
      <br>
      <br>
      
  </div>
</body>

<?php
include("../extras/footer.php");
?>

