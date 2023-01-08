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
      .srch{
        padding-left:900px;
      }
      .srch button{
        font-size:16px;
         border-radius: 12px;
         background-color:
      }
      .srch input{
         font-size:16px;
         border-radius: 12px;
      }
    .srch  h2{
     font-family: sans-serif;
   
      }
      body {
  font-family: "Lato", sans-serif;
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
      margin-left:20px;
    }  
    .h:hover{
      color:white;
      width:300px;
      height:40px;
      background-color:#0c02f4;
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
  <div class="h"><a href="bookreq.php">Book Request</a></div>
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

 
   <!-- search bar -->
<div class="srch">
   <form class="navbar-form" method="post" name="form1">
   <input  class="form-control" type="text" name="search" placeholder="Search Books..." required="">
   <button type=" submit" name="submit" class="btn btn-dark">Search
   <span class="glyphicon glyphicon-search"></span>
   </button>
   </form>
   <!-- for requesting for book -->
   <form class="navbar-form" method="post" name="form1">
      <input  class="form-control" type="text" name="bookid" placeholder=" Enter Book ID..." required="">
          <button type=" submit" name="submit1" class="btn btn-dark"> Requesting
         </button>
   </form>
  
   </div>
     <h2>List of the books</h2>
     <?php
  if(isset($_POST['submit'])){
      $q=mysqli_query($db,"SELECT * FROM `books` WHERE Booksname like'%$_POST[search]%' ");
  if(mysqli_num_rows($q)==0){
        echo"Sorry! No Books found.Try searching again.";
  }
  else {
    echo "<table class='table table-bordered table-hover'>";
    echo"<tr style='background-color:red'>";
    echo"<th>"; echo"ID"; echo "</th>";
    echo"<th>"; echo" Book-Name"; echo "</th>";
    echo"<th>"; echo"Author-name"; echo "</th>";
    echo"<th>"; echo"Edition"; echo "</th>";
    echo"<th>"; echo"Status"; echo "</th>";
    echo"<th>"; echo"Quantity"; echo "</th>";
    echo"<th>"; echo"Department"; echo "</th>";
    echo"</tr>";
     while($row=mysqli_fetch_assoc($q))
     {
        echo"<tr style='background-color:yellow'>";
       echo"<td>"; echo $row['bookid']; echo "</td>";
       echo"<td>"; echo $row['Booksname']; echo "</td>";
       echo"<td>"; echo $row['Authorname']; echo "</td>";
       echo"<td>"; echo $row['Edition'];  echo "</td>";
       echo"<td>"; echo $row['status'];  echo "</td>";
       echo"<td>"; echo $row['quantity'];   echo "</td>";
       echo"<td>"; echo $row['Department']; echo "</td>";
       echo"</tr>";
    }
 echo "</table>";
  }
}
/**if button is not pressed  */
else{
     $res=mysqli_query($db,"SELECT * FROM `books` ORDER  BY `books` .`Booksname`ASC;");
             echo "<table class='table  table-hover table-bordered'>";
     echo"<tr style='background-color:red'>";
     echo"<th>"; echo"ID"; echo "</th>";
     echo"<th>"; echo" Book-Name"; echo "</th>";
     echo"<th>"; echo"Author-name"; echo "</th>";
     echo"<th>"; echo"Edition"; echo "</th>";
     echo"<th>"; echo"Status"; echo "</th>";
     echo"<th>"; echo"Quantity"; echo "</th>";
     echo"<th>"; echo"Department"; echo "</th>";
     echo"</tr>";
      while($row=mysqli_fetch_assoc($res))
      {
         echo"<tr  style='background-color:yellow'>";
        echo"<td>"; echo $row['bookid']; echo "</td>";
        echo"<td>"; echo $row['Booksname']; echo "</td>";
        echo"<td>"; echo $row['Authorname']; echo "</td>";
        echo"<td>"; echo $row['Edition'];  echo "</td>";
        echo"<td>"; echo $row['status'];  echo "</td>";
        echo"<td>"; echo $row['quantity'];   echo "</td>";
        echo"<td>"; echo $row['Department']; echo "</td>";
        echo"</tr>";
     }
  echo "</table>";
    }
    
  if(isset($_POST['submit1']))
  {
     if(isset($_SESSION['login_user']))
     {
      mysqli_query($db,"INSERT INTO issue_book VALUES('$_SESSION[login_user]','$_POST[bookid]','','','');");
      ?>
      <script type="text/javascript">
        window.location="bookreq.php"
        </script>
        <?php  
      }
      else
      {
        ?>
        <script type="text/javascript">
          alert("You must login  first to  request  the book ");
          </script>
          <?php
      }
   }
?>
  </body>
  </html>