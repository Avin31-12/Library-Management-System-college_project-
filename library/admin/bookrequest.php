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
    <title> Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
  font-family: " sans-serif";
}
.sidenav {
  height: 100%;
  margin-top :45px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #000000bd;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    .img-circle {
      margin-left:16px;
    }  
    .h:hover{
      color:white;
      width:300px;
      height:40px;
      background-color:#0c02f4;
    }
    .srch{
         padding-left:1000px;
      }
      .form-control
      {
        width:350px;
        height:40px;
        background-color:black;
        color:white;
        border-radius:7px;
        font: size 19px;

      }
    </style>
 </head>
 <body  style="margin:6px;font-size:1.5rem;">
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div style="color:white;  margin-left:60px;font-size:24px;font-family:sans-serif">
                      <?php
                       if(isset($_SESSION['login_user']))
                       {
                       echo "<img class='img-circle profile_img' height=120 width=120 src='image/".$_SESSION['pic']."'>";
                         echo "</br>";
                       echo " Welcome ".$_SESSION['login_user']; 
                     }
                      ?>
                    </div>
  <div class="h"><a href="book.php">Books</a></div>
  <div class="h"><a href="bookrequest.php">Book Request</a></div>
  <div class="h"><a href="issueinfo.php">Issue Infromation</a></div>
</div>
<div id="main">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft="250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft="0";
  document.body.style.backgroundColor="white";

}
</script>

<div class="conatiner">
<div class="srch">
   <form class="navbar-form " method="post" name="form1">
   <input style=" text-align:center; font-size :16px;"class="form-control" type="text" name="username" placeholder="Enter your username..." required=""><br>
   <input style=" text-align:center; font-size :16px;" class="form-control" type="text" name="bookid" placeholder="Enter your Bookid" required=""><br>
   <button type=" submit" name=" submit" class="btn btn-dark"> SUBMIT NOW

   </button>
   </form>
</div>
  <h3 style="text-align:center; font-size :25px;"><u> Request  of Books</u></h3>
  <?php
  if(isset($_SESSION['login_user']))
  {
    $sql="SELECT student.username,roll,books.bookid,Booksname,Authorname,Edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bookid=books.bookid WHERE issue_book.approve=''";
    $res= mysqli_query($db,$sql);
    if(mysqli_num_rows($res)==0)
    {
      echo "<h1> <b>";
      echo  "There is no pending request.";
      echo "</h1></b>";
    }
    else
    {
      echo "<table class='table table-bordered table-hover'>";
      echo"<tr style='background-color:#19ff2c'>";
     echo"<th>"; echo"Username"; echo "</th>";
     echo"<th>"; echo"Roll-No"; echo "</th>";
      echo"<th>"; echo"Book-ID"; echo "</th>";
      echo "<th>"; echo" Book-Name"; echo "</th>";
      echo "<th>"; echo" Author-Name"; echo "</th>";
      echo "<th>"; echo" Edition"; echo "</th>";
      echo "<th>"; echo" Status"; echo "</th>";


      echo"</tr>";
    while($row=mysqli_fetch_assoc($res))
      {
       echo "<tr style='background-color:#b7f4e7'>";

       echo "<td>"; echo $row['username']; echo "</td>";
       echo "<td>"; echo $row['roll']; echo "</td>";
       echo "<td>"; echo $row['bookid'];  echo "</td>";
       echo "<td>"; echo $row['Booksname']; echo "</td>";
       echo "<td>"; echo $row['Authorname']; echo "</td>";
       echo "<td>"; echo $row['Edition']; echo "</td>";
       echo "<td>"; echo $row['status']; echo "</td>";


      echo "</tr>";
     }
     echo "</table>";
    }
  }
else
{
     ?>
     <br>
         <h4  style="text-align:center;">you need to login to see request.</h4>
         <?php
}
if(isset($_POST['submit']))
{
  $_SESSION['username']=$_POST['username'];
  $_SESSION['bookid']=$_POST['bookid'];
  ?>
         <script type="text/javascript">
        window.location="aprove.php"
        </script>
  <?php
 }
?>
</div>
</body>
</html>   
 