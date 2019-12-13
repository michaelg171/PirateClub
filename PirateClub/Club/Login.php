<!DOCTYPE html>
<html lang="en">
<head>
<link rel ="stylesheet" href="Login.css" type="text/css">
<script src = "Login.js" type="text/javascript"></script>

<meta charset="utf-8">
  <title> Login </title>

</head>
<body>
<?php

  $servername = "easel2.fulgentcorp.com";
  $username = "fpw305";
  $dbName = "fpw305";
  $password = "UdW5lEuv4GYgGMLEFSb7";
  // Create connection
  
  
$db = mysqli_connect($servername, $username, $password, $dbName);
 if(!$db){
     die('Could not connect: ' . mysqli_connect_error());
 }else{
     print "successful connect <br>";
 }
?>



<?php
  $PassWord=$_REQUEST['PassWord'];
  $UserName=$_REQUEST['UserName'];
  $err = "";
  $Button = $_REQUEST['Enter'];
  $Remember = $_REQUEST['RememberMe'];
  $decipher="";

  if(isset($Button)){
    if(!$PassWord or !$UserName){
            $err = "Error no password or username";
            unset($Button);
    }else{
        $sql = "SELECT UserName, PassWord, FirstName, LastName, RandomData, School FROM TableUsers";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                if($UserName == $row["UserName"]){
                    if($PassWord == $row['PassWord']){
                        echo "Firstname: " . $row["FirstName"]. 
                            "<br>LastName: " . $row["LastName"]. 
                            "<br>UserName:" . $row["UserName"]. 
                            "<br>School: " .$row["School"]. 
                            "<br>tagLine: " .$row["RandomData"].
                            "<br>";
                        }
                    }
                }
            }
        }
  
    if(isset($Remember)){
      $hour = time() + 3600 * 24 * 30;
      setcookie('UserName', $UserName, $hour);
      setcookie('PassWord', $PassWord, $hour);
    }
  }
 $Uval = $_COOKIE['UserName'];
 $Pval = $_COOKIE['PassWord'];
?>





<?php 
 print '<p id = "errMsg"> ' .$err. '</p>';
?>
 <div class='LogIn'>
 <form action="Login.php" method="post">
 
 <span class="Uname">UserName:</span>
<?php
     print '<input type="text" name="UserName" id="" value= "'.$Uval.'">'
 ?>
 <br>
 <span class= "pWord">Password:</span>
 <?php
     print '<input type="password" name="PassWord" onchange="cipher()" id="PassWord" value="'.$Pval.'">'
 ?>
 <br>
<span class="remember">Remember Me: </span>
<?php 
     print '<input type = "checkbox" name = "RememberMe">'
?>
<span class="Admin">Admin: </span>
<?php 
     print '<input type = "checkbox" name = "Admin">'
?>
<br>
 <input type="submit" name="Enter" id="Enter" value="Enter" onclick = submit>
 </form>
 </div>
</body>
</html>
