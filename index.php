<!DOCTYPE HTML>
<head>
  <title>
    Complaint Management System
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
	
  </div>
  
  <div id="user_login" style="opacity: 0.9; padding-top:100px; padding:10px; font-family: 'Arimo', sans-serif; background-color: #f5f8fa; margin-top: 135px; position: relative; box-shadow: 0px 0px 10px rgb(17, 17, 17); width: 450px; height: 300px; margin-left: 33%; color: #66757f;">
	Krishna Apra Gardens
      <hr>
      <br>
      <center>
        <form method="POST" action="../user/welcome.php" name="user_login">
          
          Username/ Email:
          <br>
          <input type="email" name="user_email" placeholder="Email-ID" style="height:20px; width: 170px; border-radius: 6px;" required />
          <br>
          Password: 
          <br>
          <input type="password" name="user_password" placeholder="*****" style="height:20px; width: 170px; border-radius: 6px;" required />
          <br>
          <input type="submit" value="Login" style="margin-top: 10px; width:70px; height: 30px; background-color: #55ACEE; border-radius: 6px;" required />
          
        </form>
        
      </center>
      <br>
      <br>
      <br>
      <br>
      <a href="registration.php">
        Register Here
      </a>
  </div>
  <div id="footer" style="opacity: 0.8; position:absolute; left:0px; bottom:0px; height:30px; width:100%; background-color: #000000;">
    <div id="footer_left" style="color: #ffffff; float: center; width: 70%; margin-left: 10%; font-family: 'Arimo', sans-serif;">
      <font size="2px">
        Copyright (c) 2014 Tanay Pant. All rights reserved.
      </font>
    </div>
  </div>
</body>



