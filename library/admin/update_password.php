
<?php
include "connection.php";
include "navbar.php";
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <style type="text/css">
  body{
    /* width:100%; */
    height:100vh;
    background-color:blue;
    background:url(image/th\ \(1\).webp);
    background-repeat:no-repeat;
    background-size:cover; 
  }
  .wrapper{
    background-color:black ;
    width: 360px;
    height:360px;
    margin:130px auto;
    opacity:1.6;
    color:white;
    padding:27px;
    border-radius:12px;
  }
    </style>
</h`ead>
<body>
    <div class="wrapper"> 
        <div style="text-align:center;">
    <h1 style="text-align:center; font-size:23px; font-family:san-sarif;color:white;">Change your password</h1>
        </div>
        <div style="padding-left: 23px;">
                <form action=" " method="post">
       <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
       <input type="text" name="email" class="form-control" placeholder=" Enter your Email.. " required=""><br>
       <input type="text" name="Password" class="form-control" placeholder="New passsword" required=""><br>
       <button type="submit" class="btn btn-default" name="submit"> Update your password</button>
    </form>
    </div>
    </div>
    <?php
  if(isset($_POST['submit']))
  {
    if($sql=mysqli_query($db,"UPDATE `admin` SET password='$_POST[Password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
    {
      ?>
      <script type="text/javascript"> 
      alert("The  password Updated Succesfully");
      </script>
      <?php
    }
  }
    ?>
</body>
</html>