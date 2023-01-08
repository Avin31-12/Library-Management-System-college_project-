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
         padding-left:1000px;
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
  background-color:#024629;
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
    .book{
        width:400px;
        margin:0px auto;
    }
    .form-control{
      background-color:black;
      color:white;
        
    }
    </style>
  </head>
  <body  style="font-size:1.5rem;">
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
                    </div><br><br>
                  
 <div class="h"> <a href="add.php"> Add book</a></div>
  <div class="h"><a href="bookrequest.php">Book Request</a></div>
  <div class="h"><a href="#">Issue Infromation</a></div>
</div>
<div id="main">
<span style="font-size:30px;cursor:pointer; color:black;" onclick="openNav()">&#9776; open</span>
<div class="conatiner" style=" text-align:center;">
    <h2 style="color:black; font-family:Lucida Console; text-align:center;"><b>Add New Book</b>
    </h2>
    <form class="book" action="" method="post">
    <input type="text" name="bookid" placeholder="Book ID "  class="form-control "required=""><br>
    <input type="text" name="Booksname" placeholder="Book Name"  class="form-control "required=""><br>
    <input type="text" name="Authorname" placeholder="Author Name"  class="form-control "required=""><br>
    <input type="text" name="Edition" placeholder="Edition"  class="form-control "required=""><br>
    <input type="text" name="status" placeholder="status"  class="form-control "required=""><br>
    <input type="text" name="quantity" placeholder="quantity"  class="form-control "required=""><br>
    <input type="text" name="Department" placeholder="Department"  class="form-control "required=""><br>
    <button style="  background-color:#818180;width: 400px;border-radius: 7px; height: 35px;" type="submit" class="btn btn-default" name="submit"> ADD BOOKS</button>
        
    </form>
</div>
<?php
if(isset($_POST['submit']))
{
        if(isset($_SESSION['login_user']))
        {
           mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bookid]','$_POST[Booksname]','$_POST[Authorname]','$_POST[Edition]','$_POST[status]','$_POST[quantity]','$_POST[Department]');") 
        ?>
         <script type="text/javascript">
        alert("The  book added successfully")
        </script>    

        <?php  
        }
        else{
            ?>
            <script type="text/javascript">
           alert("you need to login first")
           </script>    
   
           <?php
       }
 }
?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft="250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft="0";
  document.body.style.backgroundColor="#024629";

}
</script>
</body>
</html>