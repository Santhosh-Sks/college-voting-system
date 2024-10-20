

<?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";


$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/bg.jpg');" lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
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


<a href="newelection.php"  class="btn" >New Election</a>
<a href="viewelection.php" class="btn"  >View Election</a>
<a href="viewresult.php"  class="btn" >View Result</a>
<a href="addcandidate.php" style="background:red" class="btn" >Add Candidate</a>
<a href="viewcandidatesadmin.php" class="btn" >View Candidate</a>
</br></br>
<form action="#" method="post" enctype="multipart/form-data">

Student Name:<input type="text" class="inputtext" placeholder="Enter Candidate Name" required name="cname">
Age:<input type="text" class="inputtext" placeholder="Enter Candidate Age" name="cage">
dept:<input type="text" class="inputtext" placeholder="Enter Candidate dept" name="cdept">
Candidate Photo:<input type="file" class="inputtext" id="cphoto" name="cphoto"/>

Email:<input type="email" class="inputtext" id="email" placeholder="Enter email" name="email">
Id Photo:<input type="file" class="inputtext" id="pphoto"  name="pphoto"/>
Mobile:<input type="number" class="inputtext" id="mobile" placeholder="Enter Mobile" name="mobile">

Participating Election:</br> <select class="inputtext" name="ename">
    <option value="">Select Participating Election</option>
    <?php
	$result1 = $conn->query("SELECT ename FROM elections ") or die($conn->error);
    while ($row1 = mysqli_fetch_array($result1)) {
        echo "<option value='" . $row1['ename'] . "'>" . $row1['ename'] . "</option>";
    }
    ?>       
</select></br>

<input type="submit" class="btn" value="Add" name="add"></br></br>
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

	


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_FILES["cphoto"]) && $_FILES["cphoto"]["error"] == 0){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["cphoto"]["name"]);
		
        $filename = $_FILES["cphoto"]["name"];
    
     
          
                move_uploaded_file($_FILES["cphoto"]["tmp_name"], "uploads/" . $filename);
           
	echo '<script language="javascript">';
echo 'alert("Attachment Added successfully")';

echo '</script>';
           
        
    } 
	
	
	else{
       
	echo '<script language="javascript">';
echo 'alert("Attachment Failed")';

echo '</script>';
    }
	
	
	
	
	
	
	
	
	if(isset($_FILES["pphoto"]) && $_FILES["pphoto"]["error"] == 0){
       
        $filename1 = $_FILES["pphoto"]["name"];
    
     
          
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], "uploads/party/" . $filename1);
           
	echo '<script language="javascript">';
echo 'alert("Attachment Added successfully")';

echo '</script>';
           
        
    } 
	
	
	else{
       
	echo '<script language="javascript">';
echo 'alert("Attachment Failed")';

echo '</script>';
    }
	

	
}











if((isset($_POST['cname']))&&($_POST['cname']!=""))
{
	if($filename=="")
	{
		$filename="";
	}
$cname=$_POST['cname'];
$cage=$_POST['cage'];
$cdept=$_POST['cdept'];



$email=$_POST['email'];
$mobile=$_POST['mobile'];

$ename=$_POST['ename'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO candidates (cname,cage,cdept,cphoto,election,email,mobile,pphoto)
VALUES ('$cname','$cage','$cdept','$filename','$ename','$email','$mobile','$filename1')";

if ($conn->query($sql) === TRUE) {
   
	echo '<script language="javascript">';
echo 'alert("Candidate Added successfully")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/addcandidate.php';  </script>";




} else {

echo '<script language="javascript">';
echo 'alert("Adding Candidate Failed")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/addcandidate.php';  </script>";

}

$conn->close();

}
?>

