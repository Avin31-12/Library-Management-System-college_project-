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
        <div class="regimg">
            <div class="avin3">
                <h1 class="avi">Library Management System</h1>
                <h1 class="avi">User Regustration form</h1>
                <form  class="avinash"name="login" action="" method="post">
                        <div class="avin2">
                            <input type="text" name="first" placeholder="First Name" required="">
                            <input type="text" name="last" placeholder="Last Name" required="">
                        <input type="text" name="username" placeholder="Username" required="">
                        <input type="password" name="Password" placeholder="Password" required="">
                        <input type="email" name="email" placeholder="email" required="">
                        <input type="text" name="Contact" placeholder="Phone No" required=""><br>

                        <button class="vani" name="submit"> Submit</button>
                </div>
                    </form>
            </div>
        </div>
    </section>
<?php
    if(isset($_POST['submit'])){

        $count=0;
        $sql="SELECT username from  `admin`";
        $result=mysqli_query($db,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['username']==$_POST['username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {mysqli_query($db, "INSERT INTO `admin` VALUES('','$_POST[first]','$_POST[last]','$_POST[username]','$_POST[Password]','$_POST[email]','$_POST[Contact]','user.png');");       
                 
       ?>
              <script type="text/javascript">
               window.location="../login.php"
              </script>
              <?php 
    }
}
else{
    ?>
    <script type="text/javascript">
        alert("registration page will be ready wait for a minute")
        </script>
    <?php
}
?>

</body>
</html>