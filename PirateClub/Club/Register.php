<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Reg.css" title="" type="text/css">
        <script src = "Reg.js" type = "text/javascript">
            
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Registration</title>
    </head>
    <body>
        <?php
 $servername = "easel2.fulgentcorp.com";
 $username = "fpw305";
 $dbName = "fpw305";
 $password = "UdW5lEuv4GYgGMLEFSb7";

 $db = mysqli_connect($servername, $username, $password, $dbName);
if(!$db){
    die('Could not connect: ' . mysqli_connect_error());
    echo"COuldnt connect";
}else{
    print "successful connect";
}
?>



<?php 
 $PassWord=$_REQUEST['PassWord'];
 $FirstName=$_REQUEST['FirstName'];
 $LastName=$_REQUEST['LastName'];
 $UserName=$_REQUEST['UserName'];
 $School= $_REQUEST['School'];
 $RandomData=$_REQUEST['Skills'];
 $err = "";
$Button = $_REQUEST['Enter']; 

if(isset($Button)){
    $err = "";
     if(!$PassWord or !$UserName or !$FirstName or !$LastName or !$School or !$RandomData){
         $err = "Missing data please check";
         unset($Button);
     }else{
         $sql = "INSERT INTO TableUsers (FirstName, LastName, School, RandomData, IsAdmin, UserName, PassWord) VALUES ('$FirstName', '$LastName','$School', '$RandomData', 0, '$UserName', '$PassWord')";
         if(mysqli_query($db, $sql)){
             echo"New Record added";
         }else{
             echo "Error: " . $sql . "<br>" . mysqli_error($db);
         }
     }
}



?>
<?php 
print'<p id = "errMsg"> '. $err.'</p>';
?>
<div class='Log'>
<form action="Register.php" method="post">
    
<span>UserName:</span>
<?php 
    print '<input type="text" name="UserName" onchange="UName();" id="UserName" value="'.$UserName.'">'
?>
<br>
<span>Password:</span>
<?php 
    print '<input type="password" name="PassWord" id="PassWord" onchange="cipher();" value="'.$PassWord.'">'
?>
<br>
<span> First Name</span>
<?php
    print '<input type="text" name="FirstName" id="FirstName" onchange="nameEdit();" value="'.$FirstName.'">'
?>
<br>
<span>Last Name</span>
<?php
    print '<input type="text" name="LastName" id="LastName" onchange="LnameEdit()" value="'.$LastName.'">'
?>
<br>
<span>School</span>
<?php
    print '<input type="text" name="School" id="School" value="'.$School.'">'
?>
<br>
<span>Random</span>
<?php
    print '<input type="text" name="Skills" id="Random" value="'.$RandomData.'">'
?>
<br>
 <input type="radio" name="School" value="Science">Science <br>
 <input type="radio" name="School" value="Business">Business <br>
 <input type="radio" name="School" value="Architecture">Architecture <br>
 <input type="radio" name="School" value="Fine Arts">Fine Arts <br>
 <input type="radio" name="School" value="Engineering">Engineering <br>
 <input type="radio" name="School" value="Education">Education <br>
<input type="submit" name="Enter" id="" value="Enter" onclick = submit >
</form>
</div>
</body>
</html>
