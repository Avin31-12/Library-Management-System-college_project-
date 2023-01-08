
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
    <title>STUDENT_LOGIN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css"> 
    <!-- <style>
nav{
   float: right;
   word-spacing: 30px;
   padding: 20px;
}
nav li{
   display:inline-block;
   margin-top: 39px;
   font-size: 1.0rem;
}   -->
</style>

</head>

<body>
    <!-- <header>
    <div class="logo">
            <h4>ONLINE LIBRARY MANAGEMENT SYSTEM</h4>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">HOME</li></a>
                <li><a href="book.php">BOOKS</li></a>
                <li><a href="student.php">STUDENT_LOGIN</li></a>
                <li><a href="reg.php">REGISTRATION</li></a>
                <li><a href="feedback.php">FEEDBACK</li></a>s
            </ul>
        </nav> -->

    </header>
    <section>
        <div class="loginimg">
            <br><br><br>
            <div class="avin">
                <h1 class="avi">Library Management System</h1>
                <h1 class="avi">User Login form</h1>
                <form name="login" action="" method="post">
                         <b><p style="padding-left:50px;font-size:15px;font-weight:400;"> Login as:</p></b>
                         <input style="margin-left :50px; width:18px;" type="radio" name="user" id="admin" value="admin">
                          <lebel for="admin">ADMIN</lebel>
                         <input  style="margin-left :50px; width:18px;" type="radio" name="user" id="student" value="student">
                         <lebel for="student">STUDENT_LOGIN</lebel>
                        <div class="avin1">
                        <input type="text" name="username" placeholder="Username" required=""><br><br>
                        <input type="password" name="Password" placeholder="Password" required=""><br>
                        <br>
                        <button class="vani" name="submit">Login</button>
                       </div>
                </form>
                    <p>
                      <br>
                        <a  style="color:yellow;text-decoration:none;"href="update.php">forgot Password?</a>
                         <a style="color:yellow;text-decoration:none;" href="reg.php">Sign UP</a><br>
                        &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp New to this Website?
                        <br>
                    </p>
            </div>
        </div>
    </section>

    <?php
    if(isset($_POST['submit']))
    {
        if($_POST['user']=='admin')
        {
            $count=0;
            $res=mysqli_query($db," SELECT *FROM `admin` WHERE username='$_POST[username]' &&  Password='$_POST[Password]';");
            
            $row=mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
            if($count==0)
            {
           ?>
           <script type="text/javascript">
               alert("The  Username and Password does not match")
               </script>    
         <?php
            }
            else{
               /*-----if username and passwors matches====*/
                       $_SESSION['login_user']=$_POST['username'];
                       $_SESSION['pic']=$row['pic'];
               ?>
               <script type="text/javascript">
                   window.location="admin/profile.php"
                   </script>
                     <?php    
            }
        }   
        else
        {
        $count=0;
        $res=mysqli_query($db," SELECT *FROM `student` WHERE username='$_POST[username]' &&  Password='$_POST[Password]';");
    

      $row=mysqli_fetch_assoc($res);
     $count=mysqli_num_rows($res);
     if($count==0)
     {
      ?>
     <script type="text/javascript">
        alert("The  Username and Password does not match")
        </script>    
      <?php
     }
     else{
        $_SESSION['login_user']=$_POST['username'];
        $_SESSION['pic']=$row['pic'];
        ?>
        <script type="text/javascript">
            window.location="avi/profile.php"
            </script>
              <?php    
      }
     }
   }
    ?>
</body>
</html>