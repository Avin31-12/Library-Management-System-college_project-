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
    <title> Edit Profile image</title>
    <style>
        .form-control{
            width: 250px;
            height:32px;
            border-radius:5px;
        }
        form{
            padding-left:560px;
        }
        h4{
            font-family:san-sarifs;
        }
        lebel{
            color:white;
        }
    </style>
  </head>
  <body style="background-color:#004528;">
  <h2 style="text-align:center; color:#fff;" > Edit Informatiom</h2>
  <?php
     $sql= "SELECT *  FROM `admin`  where username='$_SESSION[login_user]';";
     $result = mysqli_query($db ,$sql)  or die (mysql_error());
     while($row= mysqli_fetch_assoc($result))
     {
         $first= $row['first'];
         $last =$row['last'];
         $username =$row['username'];
         $password =$row['password'];
         $email =$row['email'];
         $Contact=$row['Contact'];
     }
    ?>
  <div class="profile_info" style="text-align:center;">
  <span style="text-align:center; color:white;"> Welcome</span>
  <h4 style="text-align:center; color:#fff;" ><?php echo $_SESSION['login_user'];?></h4>
      </div><br>
      <div class="form1">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file"  class="form-control ">
     <lebel><h4><b>First Name: </b> </h4></lebel>  
    <input type="text" name=" first" placeholder="First Name"  class="form-control" value="<?php echo  $first;?>">
    <lebel><h4><b>Last Name: </b> </h4></lebel>  
    <input type="text" name="last" placeholder=" LastName"  class="form-control "value="<?php echo $last;?>">
    
    <lebel><h4><b>Username: </b> </h4></lebel>  
    <input type="text" name="username" placeholder="username"  class="form-control "value="<?php echo  $username;?>">
    <lebel><h4><b>Password: </b> </h4></lebel>  
    <input type="text" name="password" placeholder= "password"  class="form-control "value="<?php echo  $password; ?>">
    <lebel><h4><b>Email: </b> </h4></lebel>  
    <input type="text" name="email" placeholder="email"  class="form-control "value="<?php echo $email; ?>">
    <lebel><h4><b>Contact: </b> </h4></lebel>  
    <input type="text" name="Contact" placeholder="Contact"  class="form-control "value="<?php echo $Contact;?>"><br>
    <button style="background-color:#818180;width: 250px;border-radius: 7px; height: 35px;" type="submit" class="btn btn-default" name="submit">SAVE</button>
    </form>
    </div>   
    <?php
     if(isset($_POST['submit']))
     {
        move_uploaded_file($_FILES['file']['tmp_name'],"image/".$_FILES['file']['name']);
        $first= $_POST['first'];
        $last =$_POST['last'];
         $username =$_POST['username'];
         $password = $_POST['password'];
         $email =$_POST['email'];
         $Contact=$_POST['Contact'];
         $pic=$_FILES['file']['name'];
         $sql1= "UPDATE admin SET pic='$pic', first ='$first',last='$last',username='$username',password='$password',email='$email',Contact='$Contact' WHERE username='".$_SESSION['login_user']."';";
            if(mysqli_query($db,$sql1))
            {
              ?>
                <script type="text/javascript">
                 alert("Edit Successfully")
                 window.location="profile.php"
                 </script>    
              <?php  
            }
      
      }
    ?>
  </body>
  </html>


