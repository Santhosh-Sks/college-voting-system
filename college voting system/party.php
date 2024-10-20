
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";

	
$party=$_GET["party"];
$uname=$_GET["uname"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1="select username from result where username='$uname'";

$result = $conn->query($sql1);
if($result->num_rows <= 0)
{
$sql = "INSERT INTO result (party,username)
VALUES ('$party','$uname')";

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

//SELECT count( (party) ),party FROM result GROUP BY party
//SELECT (count( (party) )) as cnt,party FROM result GROUP BY party ORDER BY cnt LIMIT 1
//SELECT (count( (party) )) as cnt,party FROM result GROUP BY party ORDER BY cnt DESC LIMIT 1




?>
