


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
		<li><a href="index.php" class="active-menu">Back</a></li>

	</ul>
</nav>
</div>
</div>
</div>
</br>



<form action="#" method="post" enctype="multipart/form-data">

						
								
<input type="text" class="inputtext" placeholder="Enter UserName" required name="cname"></br></br>
<input type="text" class="inputtext" placeholder="Enter Password" name="pswd"></br></br>

<input type="file" class="inputtext" id="cphoto" name="cphoto"></br></br>

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


if((isset($_POST['cname']))&&($_POST['cname']!=""))
{
	if($filename=="")
	{
		$filename="";
	}
$cname=$_POST['cname'];
$pswd=$_POST['pswd'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO login (username,password,role,identity)
VALUES ('$cname','$pswd','user','$filename')";

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
?>

