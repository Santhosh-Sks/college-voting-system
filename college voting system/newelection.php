


<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/gele.jpg');" lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
  <title>Online Election</title>
</head>
<body >
  
<header>
<div id="navigation">
<div class="arrows">
	<span class="ar-left"></span>
	<span class="ar-right"></span>
	<span class="ar-left2"></span>
	<span class="ar-right2"></span>
</div> 

<div class="dark-color">
<div class="light-color">
<a href="#" id="logo">ONLINE COLLEGE ELECTION PORTAL</a>
<nav>
	<ul>
		<li><a href="index.php" class="active-menu">Logout</a></li>

	</ul>
</nav>
</div>
</div>
</div>
</br>

<a href="newelection.php"  style="background:blue" class="btn" >New Election</a> 
<a href="viewelection.php" class="btn"  >View Election</a>
<a href="viewresult.php"  class="btn" >View Result</a>
<a href="addcandidate.php"  class="btn" >Add Candidate</a>
<a href="viewcandidatesadmin.php" class="btn" >View Candidate</a>
</br></br>

<center> <h2> Add Election Details</h2> </center>   
<center> <form action="#" method="post">
Election Title:
<input type="text" class="inputtext" style="margin-left:60px" placeholder="Enter Election Title" name="ename"></br></br>
Number of candidates:
<input type="text" class="inputtext"  placeholder="Enter Number of Candidate" name="cno"></br></br>
Date:<input type="text" class="inputtext" style="margin-left:125px" placeholder="Enter Date" name="date"></br></br>
Year:<input type="text" class="inputtext" placeholder="Enter Year" style="margin-left:125px" name="year"></br></br>
Edept:<input type="text" class="inputtext" placeholder="Enter Edept" style="margin-left:125px" name="area"></br></br>
 <input type="submit" class="button" value="Add" name="add">
    <input type="reset" class="button" value="Cancel" name="cancel"> </center></br></br>

</br></br>
<br/>
</form>
</header>
  
</body>
</html>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";

if(isset($_POST['ename']))
{
	
$ename=$_POST['ename'];
$cno=$_POST['cno'];
$date=$_POST['date'];
$year=$_POST['year'];
$area=$_POST['area'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO elections (ename,cno,date,area,year,status)
VALUES ('$ename','$cno','$date','$area','$year','1')";

if ($conn->query($sql) === TRUE) {
   
	echo '<script language="javascript">';
echo 'alert("Election Added successfully")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/newelection.php';  </script>";




} else {

echo '<script language="javascript">';
echo 'alert("Adding Election Failed")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/newelection.php';  </script>";

}

$conn->close();

}
?>
