<!DOCTYPE HTML>
<head>
  <title>
    Complaint Management System - Registration
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
		
              
              <input type="text" name="user_email" placeholder="Email-ID" style="height:17px; width: 150px; border-radius: 6px;" required />
              
              <input type="password" name="user_password" placeholder="*****" style="height:17px; width: 150px; border-radius: 6px;" required />
              <input type="submit" value="Login" style="margin-top: 10px; width:70px; height: 25px; border-radius: 6px;" required />
              
          </form>
      </div>
  </div>
  
  <div id="user_login" style="opacity: 0.9; font-family: 'Arimo', sans-serif; background-color: #f5f8fa; margin-top: 90px; position: relative; box-shadow: 0px 0px 10px rgb(17, 17, 17);padding-top:100px; padding:10px; width: 450px; height: 455px; margin-left: 33%; color: #66757f;">
	Krishna Apra Gradens
      <hr>
      <br>
      <center>
        <form name="registration" id="registration" method="POST" action="registered.php">
          
          
          <input type="text" name="firstname" placeholder="First Name" style="height:25px; width: 190px; border-radius: 6px;" required />
          <input type="text" name="lastname" placeholder="Last Name" style="height:25px; width: 190px; border-radius: 6px;" required />
          <br>
          <br>
          <input type="email" name="email" placeholder="Your Email" style="height:25px; width: 385px; border-radius: 6px;" required />
          <br>
          <br>
          <select name="block" style="height:25px; width: 120px; border-radius: 6px;" required>
            
            <option value="">
              Block Name
            </option>
            <option value="A1">
              A1
            </option>
            <option value="A2">
              A2
            </option>
            <option value="A3">
              A3
            </option>
            <option value="A4">
              A4
            </option>
            <option value="B1">
              B1
            </option>
            <option value="B2">
              B2
            </option>
            <option value="B3">
              B3
            </option>
            <option value="B4">
              B4
            </option>
            <option value="B5">
              B5
            </option>
            <option value="B6">
              B6
            </option>
          </select>
          
          <input type="text" name="flatnumber" placeholder="Flat Number" style="height:25px; width: 265px; border-radius: 6px;" required />
          <br>
          <br>
          <input type="text" name="mobile" placeholder="Mobile Number" style="height:25px; width: 385px; border-radius: 6px;" required />
          <br>
          <br>
          <input type="password" name="password" placeholder="New Password" style="height:25px; width: 385px; border-radius: 6px;" required />
          <br>
          <br>
          
          
          <span style="color: grey; font-size: 10px;">
            By clicking Sign Up, you agree to our Terms and that you 
            <br>
            have read our Data Use Policy, including our Cookie Use.
          </span>
          <br>
          <br>
          
          <input type="submit" value="Sign Up" style="width:180px; height: 40px; background-color: #55ACEE; border-radius: 6px;" />
          
        </form>
        
      </center>
      <br>
      <a href="index.php">
        Go Back
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


