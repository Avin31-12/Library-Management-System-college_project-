<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <style>

 nav{
    float: right;
    word-spacing: 30px;
    padding: 20px;
}
nav li{
  display:inline-block;
    margin-top: 39px;
    font-size: 1.0rem;
} 
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="l.avif"alt="">
                <h1>ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
            <?php
            if(isset($_SESSION['login_user']))
            {?>
                <nav>
                <ul>
                    <li><a href="index.php">HOME</li></a>
                    <li><a href="book.php">BOOKS</li></a>
                    <li><a href="logout.php">LOGOUT</li></a>
                    <li><a href="feedback.php">FEEDBACK</li></a>

                </ul>
            </nav>
            <?php
            }
            else
            {
                ?>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</li></a>
                    <li><a href="book.php">BOOKS</li></a>
                    <li><a href="login.php">LOGIN</li></a>
                    <li><a href="reg.php">SIGN_UP</li></a>
                    <li><a href="feedback.php">FEEDBACK</li></a>
                </ul>
            </nav>
            <?php
             }
            ?>
           </header>
        <section>
            <div class="box">
                <br><br>
                <div class="item">
                    <br><br><br>
                    <h1>Welcome to library</h1><br>
                    <h2>Opens at:09:00</h2><br>
                    <h2>Closes at 15:00</h2><br>
                </div>
            </div>
        </section>
        <footer>
        <p>
        <br>
         Our Website:- http://:WWW.Online.library@gmail.com
                <br> Mobileno:-0361-433233
            </p>
        </footer>
           </div>
</body>
</html>