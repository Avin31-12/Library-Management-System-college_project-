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
  font-family:sans-serif;
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
      }
      .approve{
        margin-left:16px;
      }
      .container{
        height: 400px;
        width: 400px;
        background-color:black;
        color:white;
        opacity:0.8;
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
<div class="container">
   <h3 style="text-align:center;">Approve request</h3><br>
   <form  class="approve"action=" " method="post">
       <input type="text" name=" Approve" class="form-control" placeholder=" YES OR NO" required=""><br>
       <input type="text" name=" issue" class="form-control" placeholder="issue date yyyy-mm-dd.. " required=""><br>
       <input type="text" name="return" class="form-control" placeholder="return date yyyy-mm-dd" required=""><br>
       <button type="submit" class="btn btn-default" name="submit"> Approve</button>
    </form>
 <?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE `issue_book` SET `approve`='$_POST[Approve]',`issue`='$_POST[issue]',`return`='$_POST[return]'  WHERE username='$_SESSION[username]' AND bookid='$_SESSION[bookid]';");
    mysqli_query($db,"UPDATE books SET quantity=quantity-1 WHERE  bookid='$_SESSION[bookid]';");

    $res= mysqli_query($db,"SELECT quantity from books where bookid='$_SESSION[bookid]';");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='Not-available' WHERE bookid='$_SESSION[bookid]';");
      }
    }
    ?>
    <script type="text/javascript">
    alert("Updated Successfully");
    window.location="bookrequest.php"
    <?php
  }
 ?>
</div>
</body>
</html>