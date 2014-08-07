<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>
      Dashboard - KAG User
    </title>
    
    <link href="../extras/css/bootstrap.css" rel="stylesheet">
    
    <link href="../extras/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../extras/font-awesome/css/font-awesome.min.css">
    <script src="../extras/js/jquery-1.10.2.js">
    </script>
    <script src="../extras/jquery.min.js">
    </script>
    <script>
      $(document).ready(function(){
        $("#flip").click(function(){
          $("#panel").slideToggle("slow");
        }
                        );
      }
                       );
      
      $(document).ready(function(){
        $("#slip").click(function(){
          $("#sanel").slideToggle("slow");
        }
                        );
      }
                       );
    </script>
    <script type="text/javascript">
      function newPopup(url) {
        popupWindow = window.open(
          url,'popUpWindow','height=420,width=600,left=0,top=0,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
      }
    </script>
    <style>
      body {
        background: url(../extras/images/welcome-bg.png);
        background-repeat: repeat !important;
        background-attachment: fixed;
      }
    </style>
  </head>
  <?php
$user_email = $_POST['user_email'];
$user_password = MD5(htmlentities(strip_tags($_POST['user_password'])));

$con = mysqli_connect("localhost", "root", "", "cms");
$sql = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password' ";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if(!$num==1) {
echo "<center><h1>Incorrect Username/Password, please try to login <a href='http://127.0.0.1/'>again</a>.</center></h1>";
}
else {
while($obj = mysqli_fetch_assoc($result)) { 
if(function_exists('session_start'))
{
session_start();
}
else
{
echo "<center><h1>Incorrect Username/Password, please try to login <a href='http://127.0.0.1/'>again</a>.</center></h1>";
}

if(isset($_POST['user_email']) && isset($_POST['user_password']))
{ 
if($_POST['user_email']==$user_email && MD5(htmlentities(strip_tags($_POST['user_password'])))==$user_password)
{
$_SESSION['user_email']=$user_email;
$_SESSION['authenticated']=1;
}
}
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated']!==1)
{
echo "<center><h1>Incorrect Username/Password, please try to login <a href='http://127.0.0.1/'>again</a>.</center></h1>";
}
else
{
$_SESSION['authenticated']=1;
$_SESSION['address']=$obj['block']."-".$obj['flatnumber'];
$_SESSION['userinfo']=$obj['firstname']." ".$obj['lastname']." (".$obj['block']."-".$obj['flatnumber'].")";
?>
  
  <body>
    
    <div id="wrapper">
      
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
          <a class="navbar-brand" href="index.html">
            KAG - CMS
          </a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <div class="nav navbar-nav side-nav">
            <div id="panel-left" style="color: #ffffff; background-color: #000000; margin-top:50px; position: fixed; float: left; border:1px solid #000000; padding:10px; height: 100%; width: 250px; top:0; left:0; right:0; font-family: 'Arimo', sans-serif;">
              <center>
                
                
                <?php 
require("../user/core/control/conn.php");


$sql = "select * from users where email='$user_email'";
$result2 = mysql_query($sql) or die ("Could not access DB: " . mysql_error());

while ($row = mysql_fetch_assoc($result2))
{

if($row['filename']==null) {
echo "
<img src=\"../user/core/images/" . "default.JPG" . "\" alt=\"\" style=\"height: 160px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE;\" />
<br />
";
}
else {
echo "
<img src=\"../user/core/images/" . $row['filename'] . "\" alt=\"\" style=\"height: 150px; width: 160px; border-radius: 50%; border: 3px solid #55ACEE;\" />
<br />
";

}

}

?>
              </center>
              
              
              <hr color="#55ACEE">
              <?php
echo "
<i class='fa fa-user'>
</i>
<font color='#55ACEE'>
Name: 
</font>
{$obj['firstname']} {$obj['lastname']} 
<br>
<br>
";
echo "
<i class='fa fa-envelope'>
</i>
<font color='#55ACEE'>
Address: 
</font>
{$obj['block']}-{$obj['flatnumber']}, Krishna Apra Gardens.
<br>
<br>
";
echo "
<i class='fa fa-table'>
</i>
<font color='#55ACEE'>
Mobile: 
</font>
{$obj['mobile']}";
?>
              <br>
              <hr color="#55ACEE">
              
              
              
              
              <center>
                <button id="slip">
                  Edit Profile
                </button>
                <button id="flip">
                  Edit Picture
                </button>
              </center>
              <div id="sanel" style="display: none;">
                <iframe src="../user/core/control/profile_edit.php" style="height: 124px; width: 200px;">
                </iframe>
              </div>
              
              
              <div id="panel" style="display: none;">
                <font size="2">
                  Upload New Profile Picture:
                </font>
                <iframe src="../user/core/control/upload.php" style="height: 94px; width: 200px;">
                </iframe>
              </div>
              
            </div>
            
          </div>
          
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li>
              <a href="JavaScript:newPopup('../user/core/control/chat_main.php');">
                <i class="fa fa-comment">
                </i>
                Chat
              </a>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user">
                </i>
                
                <?php echo "{$obj['firstname']} {$obj['lastname']}"; ?>
                
                <b class="caret">
                </b>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-gear">
                      </i>
                      Settings
                    </a>
                  </li>
                  <li class="divider">
                  </li>
                  <li>
                    <a href="http://127.0.0.1/">
                      <i class="fa fa-power-off">
                      </i>
                      Log Out
                    </a>
                  </li>
                </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      
      <div id="page-wrapper">
        
        
        
        <div class="row">
          <div id="panel-center" style="position: relative; float: center; margin-left: 10%; font-family: 'Arimo', sans-serif;">
            <div class="col-lg-12">
              <div class="bs-example">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                  <li class="active">
                    <a href="#registercomplaint" data-toggle="tab">
                      Register Complaint
                    </a>
                  </li>
                  <li>
                    <a href="#viewcomplaint" data-toggle="tab">
                      View your Complaints
                    </a>
                  </li>
                  
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade active in" id="registercomplaint">
                    <iframe src="../user/core/control/register_complaint.php" style="height: 430px; width: 61%;">
                    </iframe>
                  </div>
                  <div class="tab-pane fade" id="viewcomplaint">
                    <iframe src="../user/core/control/viewcomplaint.php" style="height: 430px; width: 61%;">
                    </iframe>
                  </div>
                </div>
            </div>
            </div>
            
          </div>
          <!-- /.row -->
          
          
        </div>
        <!-- /#page-wrapper -->
        <div class="collapse navbar-collapse">
          <div class="nav navbar-nav side-nav">
            <div id="panel-right" style="background-color: #000000; color: #ffffff; top:0; right:0; margin-top:50px; position: fixed; float: right; border:1px solid #000000; padding:10px; height: 100%; width: 270px; font-family: 'Arimo', sans-serif; ">
              
              <strong>
                <center>
                  <font style="color: #ffffff;">
                    Bulletin Board
                  </font>
                </center>
              </strong>
              <hr color="#55ACEE">
              <iframe src="../user/core/control/bulletinboard.php" style="height: 470px; width: 250px;">
              </iframe>
              
              
            </div>
   </div>
        </div>
        
      </div>
      <!-- /#wrapper -->
      
      <!-- JavaScript -->
      <script src="../extras/js/jquery-1.10.2.js">
      </script>
      <script src="../extras/js/bootstrap.js">
      </script>
      
      <!-- Page Specific Plugins -->
      
      <script src="../extras/js/tablesorter/jquery.tablesorter.js">
      </script>
      <script src="../extras/js/tablesorter/tables.js">
      </script>
      
    </body>
    <?php
}
}
}
mysqli_close($con);
?>
  </html>
  