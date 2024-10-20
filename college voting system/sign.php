


<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/rg.jpg');" lang="en-US">
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
		<li><a href="index.php" class="active-menu">Back</a></li>

	</ul>
</nav>
</div>
</div>
</div>
</br>



<form action="#" method="post" enctype="multipart/form-data">

						
								
Name:<input type="text" class="inputtext" placeholder="Enter Name" required name="name"></br>
Dept:<input type="text" class="inputtext" placeholder="Enter Dept" name="dept"></br>
Mobile:<input type="number" class="inputtext" placeholder="Enter Mobile" name="mobile"></br>
Regno:<input type="text" class="inputtext" autocomplete="off" placeholder="Enter Regno" required name="aadhar"></br>

Id Image:<input type="file" class="inputtext" id="cphoto" name="cphoto"><span>Please Upload Id Card</span></br></br>

<input type="submit" class="btn" value="Add" name="add">
<input type="reset" class="btn" value="cancel" name="cancel">

						Already Registered	<a href="vlogin.php">Click Here</a>


</br></br></br>

								
								
								
								
								
</form>
</header>
  
</body>
</html>




<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";

	if(isset($_POST["aadhar"]))
	{
		$uname=$_POST["aadhar"];
		$sql1="select username from login where username='$uname'";
$conn1 = new mysqli($servername, $username, $password, $dbname);
$result = $conn1->query($sql1);
if($result->num_rows <= 0)
{
	

$target_dir = "uploads/user/";
$target_file = $target_dir . basename($_FILES["cphoto"]["name"]);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_FILES["cphoto"]) && $_FILES["cphoto"]["error"] == 0){
       
        $filename = $_FILES["cphoto"]["name"];
    
     
          
                move_uploaded_file($_FILES["cphoto"]["tmp_name"], "uploads/user/" . $filename);
           
	echo '<script language="javascript">';
echo 'alert("Identity Added successfully")';

echo '</script>';
           
        
    } else{
       
	echo '<script language="javascript">';
echo 'alert("Attachment Failed")';

echo '</script>';
    }
}


if((isset($_POST['name']))&&($_POST['name']!=""))
{
	if($filename=="")
	{
		$filename="";
	}

$pswd=$_POST['pswd'];

$aadhar=$_POST['aadhar'];
$name=$_POST['name'];
$email=$_POST['dept'];
$mobile=$_POST['mobile'];



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO login (username,password,role,identity,name,dept,mobile)
VALUES ('$aadhar','$pswd','user','$filename','$name','$dept','$mobile')";

if ($conn->query($sql) === TRUE) {
   
	echo '<script language="javascript">';
echo 'alert("User Added successfully")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/';  </script>";




} else {

echo '<script language="javascript">';
echo 'alert("Adding Candidate Failed")';

echo '</script>';
echo "<script> window.location = 'http://localhost/election/addcandidate.php';  </script>";

}

$conn->close();

}
}
	else
	{
		
		echo '<script language="javascript">';
echo 'alert("User Already Registered.. Please Login to Vote")';

echo '</script>';
	}		
	}
?>

