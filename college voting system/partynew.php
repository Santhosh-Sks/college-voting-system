
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";

	
 $cname=$_POST["cname"];
 $cage=$_POST["cage"];
 $caddress=$_POST["caddress"];
 $election=$_POST["election"];
 $area=$_POST["area"];
 $year=$_POST["year"];
 $date=$_POST["date"];
 $cphoto=$_POST["cphoto"];
 $party=$_POST["party"];
 $uname=$_POST["uname"];
 
 
 
 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1="select * from result where username='$uname' and election='$election'";

$result = $conn->query($sql1);
if($result->num_rows <= 0)
{
$sql = "INSERT INTO result (cname,cage,caddress,election,area,year,date,party,username,cphoto)
VALUES ('$cname','$cage','$caddress','$election','$area','$year','$date','$party','$uname','$cphoto')";

if ($conn->query($sql) === TRUE) {
   
	echo '<script language="javascript">';
	echo 'alert("Voted successfully")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/viewcandidates.php';  </script>";




} else {

echo '<script language="javascript">';
echo 'alert("Voting Failed")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/viewcandidates.php';  </script>";
}
}
else
{
	echo '<script language="javascript">';
echo 'alert("User Already Voted")';

echo '</script>';
	echo "<script> window.location = 'http://localhost/election/viewcandidates.php';  </script>";
}

$conn->close();
 
 
 
?>
