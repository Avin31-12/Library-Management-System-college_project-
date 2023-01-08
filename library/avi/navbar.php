<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/avi.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    
    <style>
.navbar-inverse{
  width:100%;
  font-size:19px;
}
.navbar-inverse li a{
  margin-top:9px;
}
.navbar-brand{
  font-size:19px;
  margin-top:9px;

}
.glyphicon{
  top:-1px;
}
    </style>
</head>
<body>

	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="book.php">BOOK</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>
             <ul class="nav navbar-nav">
                  <li><a href="profile.php">PROFILE</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="">
                    <div style="color:white; font-size:20px;font-family:ui-sans-serif">
                      <?php
                          echo "<img class='img-circle profile_img' height=50 width=50 src='image/".$_SESSION['pic']."'>";
                          echo " " .$_SESSION['login_user'];   
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                <li><a href="reg.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
                <?php
            }
          ?>
      </div>
    </nav>
</body>
</html>