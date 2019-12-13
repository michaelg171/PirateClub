<DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="club.css">
<script src= "PirateInput.js" type = "text/javascript">
    
</script>
  <meta charset="utf-8">
  <title>Pirates Cavern</title>
</head>
<body>
 
<?php
$servername = "easel2.fulgentcorp.com";
$username = "fpw305";
$dbName = "fpw305";
$password = "UdW5lEuv4GYgGMLEFSb7";
// Create connection
$db = mysqli_connect($servername,$username, $password, $dbName);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Connected successfully";
?>

<?php
$SC=0;
$FA=0;
$ARCH=0;
$BUSI=0;
$ENG=0;
$EDU=0;

$sql = "SELECT School FROM TableUsers";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0){

    while($row=mysqli_fetch_assoc($result)){
        if($row['School']=='Science')
            $SC++;
        if($row['School']=="Fine Arts")
            $FA+=1;
        if($row['School']=="Business")
            $BUSI+=1;
        if($row['School']=='Architecture')
            $ARCH+=1;
        if($row['School']=='Engineering')
            $ENG+=1;
        if($row['School']=="Education")
            $EDU+=1;

    }
}


?>


<div class = "one">
<h1>Welcome to the Pirates Cavern <br>
<ul>
    <li> <a href="">HOME</a></li>
    <li><a href="">About Us</a></li>
    <li><a href="">Contact Us</a></li>
    <li><a href="">Current News Letter</a></li>
    <li><a href="">Tip Info</a></li>
    <li><a href="">Captain's Contact</a></li>
</ul>
</h1> 
<h2>Where we steal, plunder, and pillage our way into the hearts of the world</h2>

        <img src="piratesit2.jpg", id="pir2">
        <img src="piratesite1.jpg", id="pir1">
        <img src="piratesite3.jpg", id="pir3"><br>
             
        <span class="text3">Get rich quick (results may vary) through the plunder of gold!</span>
        <span class="text2">Expierence High octane adrenaline rushes through consistant combatives</span>
        <span class="text1">Travel the world through the seas and oceans!</span><br>
                 
        <a href="https://www.google.com" subject="HTML line">capt.galindo0517@Myship.com</a>
</div>
    

<div class ="Reg">
<button class = "Register" onclick="window.location.href = 'Register.php';">Register</button>
<button class = "Login" onclick="window.location.href = 'Login.php';">Login</button>
<div/>



<div class="bragging">
                 We here at Pirates Cavern are very well aware of the fact that there are other Pirates out and about. as     well as those who claim to be able to stop us. like the "Royal British Empire" or the "Grande Armada de la Espanola". However, they   have yet to stop us nor could they. We have the best of the best when it comes to evasion tactics and blackmail as well as   theft and trickery. Not to mention an arsenal of the fastest ships and latest weaponary. So if you  are looking to be part   of the best piracy group the world has ever known or if you are wanting your name to go down in history as a legend of the   sea. Join the Pirates Cavern where we never stop raiding, fighting, and stealing our way into immortality! yo ho yo ho a     pirates life for me!

</div>

<div class= 'Dates'>
  <?php
 $year = $_REQUEST["year"];
 $mon = $_REQUEST["month"];
 $day = $_REQUEST["day"];
 $err = "";
 $yearly = [0,31,28,31,30,31,30,31,31,30,31,30,31];
 
  if($year and ($year>=2100 or $year<=1900)){
      $err = "Invalid Year: ". $year . ", must be between 1901 and 2099";
 }
 if($mon and ($mon>=13 or $mon < 1)){
     print '<p> Error months out of range</p>';
 }
 if( $mon and $year and !$day){
     print '<p>Error a Day must be entered</p>';
 }
 
 
 for($i = 1; $i<=count($yearly); $i++){
     if($mon==2){
         if($year%4!==0){
             if($day>28){
                 print '<p>Invalid Entry " '. $year .' " is not a leap year</p>';
                 break;
             }
 
         }else if($day>29){
            print '<p>Invalid Entry too many days entered for amount in month</p>';
             break;
         }
     }
     if($i == $mon){
         if($day>$yearly[$i]){
             print '<p>Invalid entry too many days entered for amount in month</p>';
             break;
         }
     }
 }
 
 if($year>0 or $mon>0 or $day>0){
     print "<p>previous M/D/Y = ". $mon ."/" . $day . "/". $year;
 }
 ?>
 
 <?php
 print '<p id = "errMsg" class = "err">'. $err .'</p>';
 ?>
 

<form action="Main.php" method="post">
 <table cellpadding = "20"><tr>
     <td><b>Choose a Month</b>
     <table border>
 <?php
     print"<tr>\n";
 radio(1,"January");
 radio(5, "May");
 radio(9, "September");
 print "<tr>\n";
 radio(2, "Febuary");
 radio(6, "june");
 radio(10, "October");
 print "<tr>\n";
 radio(3, "March");
 radio(7, "July");
 radio(11, "Novemebr");
 print"<tr>\n";
 radio(4, "April");
 radio(8, "August");
 radio(12, "December");
 ?>
 
 
 </table>
    <td align = "center">

 <b>Select a Day:</b>
 <br/><select name="day", id = "day">
 <option value = '0'>none</option>

 <?php
 for($i = 1; $i<=31; $i++){
     $sel = "";
     if($i == $day)
         $sel = "selected";

     print"<option value='".$i."'". $sel .">". $i ."</option>\n";
 }
 ?>

 </select>
 <td><b>Enter a Year:</b></td>
 <?php print '<br/> <input onchange = "CheckDate()" type="text" name="year" id="year" value="'. $year. '"/>';
 ?>

 <td><input disabled id="submit" type="submit"/>

 </table>
 </form>

</div>

<div class = "barchart">
<td><b>Schools In Our Club</b></td><br>    
 <canvas id = "Bars", width = "600", height = "400"></canvas>
 <script type="text/javascript">
    var SC= <?php echo $SC ?>; 
    var ENG=<?php echo $ENG ?>;
    var ARC=<?php echo $ARCH ?>;
    var EDU=<?php echo $EDU ?>;
    var BUSI=<?php echo $BUSI?>;
    var FA=<?php echo $FA ?>;
      barData = [{lbl: "Eng", val: ENG*0.01}, {lbl:"Arch", val: ARC*0.01}, {lbl:"FA", val: FA*0.01}, {lbl: "SC", val: SC* 0.01}, {lbl: "EDU", val: EDU* .01},{lbl: "BUSI", val: BUSI*.01}];
     GraphIt("Bars", barData);

</script>
</div>

</body>
</html>

<?php function radio($number, $name){
     global $mon;
     $chk = "";
     if($number == $mon) $chk = "checked";
     print '<td><input type="radio" name="month" id="month" value="' . $number .'"'. $chk .'/>'. $name ."\n";
 
 
 } ?>

