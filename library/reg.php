<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_LOGIN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <style>
        .avin4{
    height:250px;
    width: 450px;
    background-color:rgb(22 17 17 / 74%);
    margin:70px auto;
    opacity: 0.7rem;
    margin-top: 100px;
    color:white;
    padding: 20px;
    border-radius: 7px;   
}

    </style>
</head>

<body>
    <!-- <header> -->
        <!-- <div class="logo">
            <h4>ONLINE LIBRARY MANAGEMENT SYSTEM</h4>
        </div>
    <nav>
            <ul>
            <li><a href="index.php">HOME</li></a>
                    <li><a href="book.php">BOOKS</li></a>
                    <li><a href="student.php">STUDENT_LOGIN</li></a>
                    <li><a href="reg.php">REGISTRATION</li></a>
                    <li><a href="feedback.php">FEEDBACK</li></a>

            </ul>
        </nav>
    </header> -->
    <section>
    <form  class="avinash"name="login" action="" method="post">
        <div class="regimg">
            <div class="avin4">
                <h1 class="avi">Library Management System</h1>
                 <h1 class="avi">User Regustration form</h1>
                <form name="login" action="" method="post">
                         <b><p style="padding-left:50px;font-size:15px;font-weight:400;"> Login as:</p></b>
                         <input style="margin-left :10px; width:18px;" type="radio" name="user" id="admin" value="admin">
                          <lebel for="admin">ADMIN_SIGN-UP</lebel>
                         <input  style="margin-left :20px; width:18px;" type="radio" name="user" id="student" value="student">
                         <lebel for="student">STUDENT_SIGN-UP</lebel> &nbsp &nbsp
                        <button class="btn btn-default" name="submit1" type="sbmit"> OK</button>
               </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit1']))
        {
            if( $_POST['user']=='admin')
            {
              ?>
                <script type="text/javascript">
                    window.location="admin/reg.php"
                    </script>
             <?php    
            }
            else
            {
                ?>
              <script type="text/javascript">
               window.location="avi/reg.php"
              </script>
              <?php  
            }
        }
        ?>
    </section>
</body>
</html>