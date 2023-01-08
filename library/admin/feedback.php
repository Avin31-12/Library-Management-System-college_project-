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
    <title> feedback for library</title>
    <style>
 body{
    
    background-image:url(image/1.png);
 background-size:cover;
 background-repeat:no-repeat;
 }
.wrapper{
    padding:10px;
    margin: 20px auto;
    width:676px;
    height:600px;
    background-color:#a3b0b0;
    opacity: 1.2;
    color:black;
}
#floatingTextarea2{
height: 107px; 
width: 397px;
border:2px solid black;
}
.scroll{
    width:100%;
    height:300px;
 overflow: auto;
}
 </style>
</head>
<body>
    <div class="wrapper">
        <h1>You can give any suggetion according to your openion</h1>
    <form action="" method="post">
    <div class="form-floating">
  <textarea class="form-control"  name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2"></label><br>
</div>
<button type="submit" class="btn btn-default" name="submit" style="font-size:1.5rem; width: 120px; height:40px; padding:4px"> Comment</button><br><br>
    </form>
<div class="scroll">
<?php
if(isset($_POST['submit']))
{
    $sql="INSERT INTO `comments` VALUES('','$_SESSION[login_user]','$_POST[comment]');";
    if(mysqli_query($db,$sql))
    {
        $q= "SELECT * FROM `comments`ORDER BY `commentS`.`id`DESC";
        $res=mysqli_query($db,$q);
     echo "<table class='table table-bordered '>";
     while($row=mysqli_fetch_assoc($res))
     {
      echo"<tr>";
      echo"<td>"; echo $row['username']; echo "</td>";
      echo"<td>"; echo $row['comment']; echo "</td>";
      echo "<tr>";      
    }
}

}
else
{
$q= "SELECT *FROM `comments` ORDER BY `comments`.`id`DESC";
$res=mysqli_query($db,$q);
echo "<table class='table table-bordered table-hover bg-color-red'>";
while($row=mysqli_fetch_assoc($res))
{
echo"<tr>";
echo"<td>"; echo $row['username']; echo "</td>";
echo"<td>"; echo $row['comment']; echo "</td>";
echo "<tr>";

  }
 }
 ?>
</div>
</div>
</body>
</html>
 