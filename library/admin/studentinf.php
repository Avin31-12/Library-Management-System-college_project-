
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
    <title>STUDENT_INFORMATION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .srch button{
        font-size:16px;
         border-radius: 12px;
         background-color:#977d74;
      }
      .srch input{
         font-size:16px;
         border-radius: 12px;
      }
    .srch  h2{
     font-family: sans-serif;
   
      }
      .sidenav {
  height: 100%;
  margin-top :85px;
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
      margin-left:20px;
    }  
    </style>
  </head>
  <body  style="margin:6px;font-size:1.5rem;">
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <div style="color:white;  margin-left:60px;font-size:24px;font-family:ui-sans-serif">
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
  <div class="h"><a href="expiredj.php">Expired Infromation</a></div>

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
   <!-- search bar -->
<div class="srch">
   <form class="navbar-form" method="post" name="form1">
   <input  class="form=control" type="text" name="search" placeholder="Search Username..." required="">
   <button type=" submit" name="submit" class="btn btn-dark">Search
   <span class="glyphicon glyphicon-search"></span>
   </button>
   </form>
   </div>
     <h2>List of Student</h2>
     <?php
  if(isset($_POST['submit'])){
      $q=mysqli_query($db,"SELECT first,last,username,roll,email,Contact FROM `student`
      WHERE username like'%$_POST[search]%' ");
  if(mysqli_num_rows($q)==0){
        echo"Sorry! No Student found with username.Try searching again.";
  }
  else {
    echo "<table class='table table-bordered table-hover table-striped'>";
    echo"<tr style='background-color: #4b9ffb'>";
    echo"<th>"; echo"FIRST Name"; echo "</th>";
    echo"<th>"; echo" Last Name"; echo "</th>";
    echo"<th>"; echo"Username"; echo "</th>";
    echo"<th>"; echo"Roll"; echo "</th>";
    echo"<th>"; echo"Email"; echo "</th>";
    echo"<th>"; echo"Contact"; echo "</th>";
    echo"</tr>";
     while($row=mysqli_fetch_assoc($q))
     {
        echo"<tr  style='background-color: #04f9e2'>";
     
        echo"<td>"; echo $row['first']; echo "</td>";
        echo"<td>"; echo $row['last']; echo "</td>";
        echo"<td>"; echo $row['username']; echo "</td>";
        echo"<td>"; echo $row['roll'];  echo "</td>";
        echo"<td>"; echo $row['email'];  echo "</td>";
        echo"<td>"; echo $row['Contact'];   echo "</td>";
          echo"</tr>";
    }
 echo "</table>";
  }
}
/**if button is not pressed  */
else{
     $res=mysqli_query($db,"SELECT first,last,username,roll,email,Contact FROM `student`;");
             echo "<table class='table table-bordered table-hover table-striped'>";
     echo"<tr style='background-color: #4b9ffb;'>";
     echo"<th>"; echo"FIRST Name"; echo "</th>";
     echo"<th>"; echo" Last Name"; echo "</th>";
     echo"<th>"; echo"Username"; echo "</th>";
     echo"<th>"; echo"Roll"; echo "</th>";
     echo"<th>"; echo"Email"; echo "</th>";
     echo"<th>"; echo"Contact"; echo "</th>";
      echo"</tr>";
      while($row=mysqli_fetch_assoc($res))
      {
         echo"<tr  style='background-color:#04f9e2;'>";
        echo"<td>"; echo $row['first']; echo "</td>";
        echo"<td>"; echo $row['last']; echo "</td>";
        echo"<td>"; echo $row['username']; echo "</td>";
        echo"<td>"; echo $row['roll'];  echo "</td>";
        echo"<td>"; echo $row['email'];  echo "</td>";
        echo"<td>"; echo $row['Contact'];   echo "</td>";
        echo"</tr>";
     }
  echo "</table>";
    }
?>
</div>
  </body>
  </html>